<?php 
	// Load the header files first
	header("Expires: 0"); 
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
	header("cache-control: no-store, no-cache, must-revalidate"); 
	header("Pragma: no-cache");

	// Load necessary files then...
	require_once('../initialize.php');
	
	$action = $_REQUEST['action'];
	
	switch($action) 
	{			
		case "addjob":	
			$record = new jobs();		
			
			$record->slug 		= create_slug($_REQUEST['title']);	
			$record->title 		= $_REQUEST['title'];
			$record->client_id 	= $_REQUEST['client_id'];		
			$record->deadline_date 		= $_REQUEST['deadline_date'];
			$record->budget_type 		= $_REQUEST['budget_type'];
			$record->budget_range_low 		= $_REQUEST['budget_range_low'];
			$record->budget_range_high 		= $_REQUEST['budget_range_high'];
			$record->exact_budget 		= $_REQUEST['exact_budget'];
			$record->content	= $_REQUEST['content'];			
			$record->job_type	= $_REQUEST['job_type'];			
			$record->currency	= $_REQUEST['currency'];			
			$record->status		= 1;
			$record->sortorder	= jobs::find_maximum();		
			$db->begin();
			if($record->save()): $db->commit();
			    $message  = sprintf($GLOBALS['basic']['addedSuccess_'], "jobs '".$record->title."'");
                log_action($message,1,3);
			echo json_encode(array("action"=>"success","message"=>$message));
			else: $db->rollback();
				echo json_encode(array("action"=>"error","message"=>$GLOBALS['basic']['unableToSave']));
			endif;
		break;
			
		
			
		case "delete":
			$id = $_REQUEST['id'];
			$record = jobs::find_by_id($id);
			$db->begin();
			$res = $db->query("DELETE FROM tbl_jobs WHERE id='{$id}'");
			if($res)$db->commit();else $db->rollback();
			reOrder("tbl_jobs", "sortorder");
			
			$message  = sprintf($GLOBALS['basic']['deletedSuccess_'], "jobs '".$record->title."'");
			echo json_encode(array("action"=>"success","message"=>$message));					
			log_action("jobs  [".$record->title."]".$GLOBALS['basic']['deletedSuccess'],1,6);
		break;
		
		// Module Setting Sections  >> <<
		case "toggleStatus":
			$id = $_REQUEST['id'];
			$record = jobs::find_by_id($id);
			$record->status = ($record->status == 1) ? 0 : 1 ;
			$record->save();
			echo "";
		break;

        case "jobBid":
            $record         = new Bids();

            // finding client id and freelancer id
            $jobRec         = jobs::find_by_id($_REQUEST['jobId']);
            $clientId       = $jobRec->client_id;
            $freelancerId   = freelancer::find_id_by_login_id($_REQUEST['userId']);

            // removing number and email from message
            // Pattern to match email addresses
            $email_pattern = '/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/';

            // Pattern to match phone numbers (varies based on format, here's a generic one)
            $phone_pattern = '/\b(\+?\d{1,3}[-.\s]?)?(\(?\d{1,4}\)?[-.\s]?)?\d{1,4}[-.\s]?\d{1,4}([-.\s]?\d{1,9})?\b/';

            // Remove email addresses
            $message = preg_replace($email_pattern, '', $_REQUEST['message']);

            // Remove phone numbers
            $message = preg_replace($phone_pattern, '', $message);

            $record->job_id         = $_REQUEST['jobId'];
            $record->client_id      = $clientId;
            $record->freelancer_id  = $freelancerId;
            $record->bid_amount     = $_REQUEST['bid_amount'];
            $record->delivery       = $_REQUEST['delivery'];
            $record->message        = $message;

            $record->project_status = 1;
            $record->added_date     = registered();
            $record->sortorder      = Bids::find_maximum();
            $record->status         = 1;

            $db->begin();
            if($record->save()):
                $db->commit();
                $message = "Jobs bid in " . $jobRec->title;
                echo json_encode(array("action" => "success", "message" => "Job Bid successfully !"));
                log_action($message, 1, 3);
            else: $db->rollback();
                echo json_encode(array("action" => "error", "message" =>"Job Bid unsuccessfully !"));
            endif;

            break;


			case "selectfreelancer":
				$sqlids='';
				$job = jobs::find_by_id($_REQUEST['jobid']);
				$job->project_status = 2;
	
				$db->begin();
				if($job->save()):
					$jobid=$_REQUEST['jobid'];
					$bidderIds = implode(',', array_map('intval', $_REQUEST['bidder']));
					$sql='update tbl_bids set project_status=2 where job_id='.$jobid.' and freelancer_id in ('.$bidderIds.')';
					$db->query($sql);
					$db->commit();
					$message = "Jobs bid in " . $job->title;
					echo json_encode(array("action" => "success", "message" => "Freelancer has been Selected!"));
				else: $db->rollback();
					echo json_encode(array("action" => "error", "message" =>"Job Bid unsuccessfully !"));
				endif;
	
				break;

				case "selectshortlist":
					$sqlids='';
					$job = jobs::find_by_id($_REQUEST['jobid']);
					$job->project_status = 3;
		
					$db->begin();
					if($job->save()):
						$jobid=$_REQUEST['jobid'];
						$bidderIds = implode(',', array_map('intval', $_REQUEST['bidder']));
						$sql='update tbl_bids set project_status=3 where job_id='.$jobid.' and freelancer_id in ('.$bidderIds.')';
						$db->query($sql);
						$db->commit();
						$message = "Jobs bid in " . $job->title;
						echo json_encode(array("action" => "success", "message" => "Freelancer has been Rewarded!"));
					else: $db->rollback();
						echo json_encode(array("action" => "error", "message" =>"Job Bid unsuccessfully !"));
					endif;
		
					break;
			
	}
?>