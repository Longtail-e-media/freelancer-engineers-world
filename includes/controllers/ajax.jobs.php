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
			$record->project_status	= 1;			
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
            $sqlids     = '';
            $job        = jobs::find_by_id($_REQUEST['jobid']);
            $job->project_status = 2;

            $clientdata= client::find_by_id($job->client_id);
            $clientuserdata= User::find_by_id($clientdata->user_id);

            $jobid      = $_REQUEST['jobid'];
            $bidderIds  = implode(',', array_map('intval', $_REQUEST['bidder']));
            $freelancers = explode(',', $bidderIds);

            $db->begin();
            if ($job->save()):
                $sql        = 'update tbl_bids set project_status=2 where job_id=' . $jobid . ' and freelancer_id in (' . $bidderIds . ')';
                $db->query($sql);
                $sql1       = 'update tbl_bids set project_status=4 where job_id=' . $jobid . ' and freelancer_id NOT in (' . $bidderIds . ')';
                $db->query($sql1);
                $db->commit();

                $message    = "Jobs bid in " . $job->title;
                echo json_encode(array("action" => "success", "message" => "Freelancer has been short listed!"));
            else: $db->rollback();
                echo json_encode(array("action" => "error", "message" => "Job Bid unsuccessfully !"));
            endif;

            $shortListedFreelancers = '';

            if(!empty($freelancers)){
                foreach($freelancers as $freelancer){
                    $freelancerdata= freelancer::find_by_id($freelancer);
                    $freeuserdata= User::find_by_id($freelancerdata->user_id);
                    $mailcheck= $freeuserdata->email;

                    // pr($mailcheck);
                    if ($mailcheck):

                        $row    = User::find_by_mail($mailcheck);

                        /* Mail Format */
                        $siteName   = Config::getField('sitename', true);
                        $AdminEmail = User::get_UseremailAddress_byId(1);
                        $fullName   = $freeuserdata->username;

                        $shortListedFreelancers .= $fullName . '<br>';

                        $msgbody    = '<div>                
                            <div>
                            <font face="Trebuchet MS">Dear ' . $fullName . ' !</font> <br />
                            <h3>you have been shortlisted for - ' . $job->title . '</h3> <br>
                            Please <a href="' . BASE_URL . 'login">click here to login and check details.</a> <br><br>
                            <p>Thanks,<br>
                            ' . $siteName . '
                            </p>
                            </div>
                            </div>';

                        $mail = new PHPMailer();

                        $mail->SetFrom($AdminEmail, $siteName, 0);
                        $mail->AddReplyTo($AdminEmail, $siteName);
                        $mail->AddAddress($mailcheck, $fullName);
                        $mail->Subject = "You have been short listed - " . $siteName;
                        $mail->MsgHTML($msgbody);

                        if (!$mail->Send()):
                            $message = "Not valid User email address";
                            echo json_encode(array('action' => 'unsuccess', 'message' => $message));
                        endif;
                    else:
                        $message = "Not valid User email address";
                        echo json_encode(array('action' => 'unsuccess', 'message' => $message));
                    endif;

                }
            }

            $clientmailcheck= $clientuserdata->email;
            if ($clientmailcheck):

                $row    = User::find_by_mail($clientmailcheck);

                /* Mail Format */
                $siteName   = Config::getField('sitename', true);
                $AdminEmail = User::get_UseremailAddress_byId(1);
                $fullName   = $clientdata->first_name.' '.$clientdata->middle_name.''. $clientdata->last_name;

                $msgbody    = '<div>                
                    <div>
                    <font face="Trebuchet MS">Dear ' . $fullName . ' !</font> <br />
                    <h3>You have shortlisted the following freelancers for ' . $job->title . '</h3>:<br>
                    '.$shortListedFreelancers.'<br>
                    <p>Thanks,<br>
                    ' . $siteName . '
                    </p>
                    </div>
                    </div>';

                $mail = new PHPMailer();

                $mail->SetFrom($AdminEmail, $siteName, 0);
                $mail->AddReplyTo($AdminEmail, $siteName);
                $mail->AddAddress($clientmailcheck, $fullName);
                $mail->Subject = "Short listed - " . $siteName;
                $mail->MsgHTML($msgbody);

                if (!$mail->Send()):
                    $message = "Not valid User email address";
                    echo json_encode(array('action' => 'unsuccess', 'message' => $message));
                endif;
            else:
                $message = "Not valid User email address";
                echo json_encode(array('action' => 'unsuccess', 'message' => $message));
            endif;

            $siteReg				= user::find_by_id(1);

            $clientmailcheck = $clientuserdata->email;
            if ((!empty($mailcheck) && !empty($clientmailcheck) && !empty($siteReg->email))):
                /* Mail Format */
                $siteName   = Config::getField('sitename', true);
                $AdminEmail = User::get_UseremailAddress_byId(1);
                $clientname = $clientdata->first_name.' '.$clientdata->middle_name.''. $clientdata->last_name;
                $fullName   = $siteReg->first_name .' '. $siteReg->middle_name .' '.$siteReg->last_name;

                $msgbody    = '<div>
                    <h3> ' . $job->title . ' Update : </h3><br />
                    Shortlisted freelancers : <br>
                    '.$shortListedFreelancers.'<br>                
                    <div>
                    <p>Thanks,<br>
                    ' . $clientname . '
                    </p>
                    </div>
                    </div>';

                $mail = new PHPMailer();

                $mail->SetFrom($clientmailcheck, $clientname, 0);
                $mail->AddReplyTo($clientmailcheck, $clientname);
                $mail->AddAddress($AdminEmail, $siteName);
                $mail->Subject = "Short listed for " . $job->title . " - " . $siteName;
                $mail->MsgHTML($msgbody);

                if (!$mail->Send()):
                    $message = "Not valid User email address";
                    echo json_encode(array('action' => 'unsuccess', 'message' => $message));
                endif;
            else:
                $message = "Not valid User email address";
                echo json_encode(array('action' => 'unsuccess', 'message' => $message));
            endif;
        break;

        case "selectshortlist":
            $sqlids     = '';
            $job        = jobs::find_by_id($_REQUEST['jobid']);
            $job->project_status = 3;

            $clientdata= client::find_by_id($job->client_id);
            $clientuserdata= User::find_by_id($clientdata->user_id);
            $jobid      = $_REQUEST['jobid'];
            $bidderIds = implode(',', array_map('intval', $_REQUEST['bidder']));
            $freelancers = explode(',',$bidderIds);

            $db->begin();
            if ($job->save()):
                $sql        = 'update tbl_bids set project_status=3 where job_id=' . $jobid . ' and freelancer_id in (' . $bidderIds . ')';
                $db->query($sql);
                $sql1       = 'update tbl_bids set project_status=4 where job_id=' . $jobid . ' and freelancer_id NOT in (' . $bidderIds . ')';
                $db->query($sql1);
                $db->commit();
                $message    = "Jobs bid in " . $job->title;
                echo json_encode(array("action" => "success", "message" => "Freelancer has been Awarded!"));
            else: $db->rollback();
                echo json_encode(array("action" => "error", "message" => "Job Bid unsuccessfully !"));
            endif;

            $shortListedFreelancers = '';
            if(!empty($freelancers)){
                foreach($freelancers as $freelancer){
                    $freelancerdata= freelancer::find_by_id($freelancer);
                    $freeuserdata= User::find_by_id($freelancerdata->user_id);
                    $mailcheck= $freeuserdata->email;

                    // pr($mailcheck);
                    if ($mailcheck):

                        $row    = User::find_by_mail($mailcheck);

                        /* Mail Format */
                        $siteName   = Config::getField('sitename', true);
                        $AdminEmail = User::get_UseremailAddress_byId(1);
                        $fullName   = $freeuserdata->username;

                        $shortListedFreelancers .= $fullName . '<br>';

                        $msgbody    = '<div>                
                            <div>
                            <font face="Trebuchet MS">Dear ' . $fullName . ' !</font> <br />
                            <h3>You have been awarded for - ' . $job->title . '</h3><br>
                            Please <a href="' . BASE_URL . 'login">click here to login and check details.</a> <br><br>
                            <p>Thanks,<br>
                            ' . $siteName . '
                            </p>
                            </div>
                            </div>';

                        $mail = new PHPMailer();

                        $mail->SetFrom($AdminEmail, $siteName, 0);
                        $mail->AddReplyTo($AdminEmail, $siteName);
                        $mail->AddAddress($mailcheck, $fullName);
                        $mail->Subject = "You have been Awarded - " . $siteName;
                        $mail->MsgHTML($msgbody);

                        if (!$mail->Send()):
                            $message = "Not valid User email address";
                            echo json_encode(array('action' => 'unsuccess', 'message' => $message));
                        endif;
                    else:
                        $message = "Not valid User email address";
                        echo json_encode(array('action' => 'unsuccess', 'message' => $message));
                    endif;

                }
            }

            $clientmailcheck= $clientuserdata->email;
            if ($clientmailcheck):

                $row    = User::find_by_mail($clientmailcheck);

                /* Mail Format */
                $siteName   = Config::getField('sitename', true);
                $AdminEmail = User::get_UseremailAddress_byId(1);
                $fullName   = $clientdata->username;

                $msgbody    = '<div>                
                    <div>
                    <font face="Trebuchet MS">Dear ' . $fullName . ' !</font> <br />
                    <h3>You have awarded the following freelancers for ' . $job->title . '</h3>:<br>
                    '.$shortListedFreelancers.'<br>
                    <p>Thanks,<br>
                    ' . $siteName . '
                    </p>
                    </div>
                    </div>';

                $mail = new PHPMailer();

                $mail->SetFrom($AdminEmail, $siteName, 0);
                $mail->AddReplyTo($AdminEmail, $siteName);
                $mail->AddAddress($clientmailcheck, $fullName);
                $mail->Subject = "Awarded - " . $siteName;
                $mail->MsgHTML($msgbody);

                if (!$mail->Send()):
                    $message = "Not valid User email address";
                    echo json_encode(array('action' => 'unsuccess', 'message' => $message));
                endif;
            else:
                $message = "Not valid User email address";
                echo json_encode(array('action' => 'unsuccess', 'message' => $message));
            endif;

            $siteReg				= user::find_by_id(1);

            $clientmailcheck= $clientuserdata->email;
            if ((!empty($mailcheck) && !empty($clientmailcheck) && !empty($siteReg->email))):
                /* Mail Format */
                $siteName   = Config::getField('sitename', true);
                $AdminEmail = User::get_UseremailAddress_byId(1);
                $clientname = $clientdata->first_name.' '.$clientdata->middle_name.''. $clientdata->last_name;
                $fullName   = $siteReg->first_name .' '. $siteReg->middle_name .' '.$siteReg->last_name;

                $msgbody    = '<div>
                    <h3> ' . $job->title . ' Update : </h3><br />
                    Awarded freelancers : <br>
                    '.$shortListedFreelancers.'<br>                
                    <div>
                    <p>Thanks,<br>
                    ' . $clientname . '
                    </p>
                    </div>
                    </div>';

                $mail = new PHPMailer();

                $mail->SetFrom($AdminEmail, $siteName, 0);
                $mail->AddReplyTo($AdminEmail, $fullName);
                $mail->AddAddress($AdminEmail, $fullName);
                $mail->Subject = "Awarded for " . $job->title . " - " . $siteName;
                $mail->MsgHTML($msgbody);

                if (!$mail->Send()):
                    $message = "Not valid User email address";
                    echo json_encode(array('action' => 'unsuccess', 'message' => $message));
                endif;
            else:
                $message = "Not valid User email address";
                echo json_encode(array('action' => 'unsuccess', 'message' => $message));
            endif;

        break;

        case "forwop":
            $sqlids     = '';
            $job        = jobs::find_by_id($_REQUEST['jobid']);
            $job->project_status = 5;

            $db->begin();
            if ($job->save()):
                $jobid=$_REQUEST['jobid'];
                // $bidderIds = implode(',', array_map('intval', $_REQUEST['bidder']));
                $sql='update tbl_bids set project_status=6 where job_id='.$jobid.' and project_status=3';
                $db->query($sql);
                $db->commit();
                // $message = "Jobs bid in " . $job->title;
                echo json_encode(array("action" => "success", "message" => "The Work is on Progress!"));
            else: $db->rollback();
                echo json_encode(array("action" => "error", "message" => "Work on Progress unsuccessfully !"));
            endif;
        break;

        case "forcomplete":
            $sqlids     = '';
            $job        = jobs::find_by_id($_REQUEST['jobid']);
            $job->project_status = 6;
            
            $db->begin();
            if ($job->save()):
                $jobid=$_REQUEST['jobid'];
                $sql='update tbl_bids set project_status=5 where job_id='.$jobid.' and project_status=6';
                // pr($sql);
                $db->query($sql);
                $db->commit();
                // $message = "Jobs bid in " . $job->title;
                echo json_encode(array("action" => "success", "message" => "The Work is Completed!"));
            else: $db->rollback();
                echo json_encode(array("action" => "error", "message" => "Job Bid unsuccessfully !"));
            endif;
        break;


        case "forclientreview":
          
            // pr($_POST);
            // $sqlids     = '';
            $bids        = Bids::find_by_all_id($_REQUEST['clientid'], $_REQUEST['freelancerid'], $_REQUEST['jobid']);
            // pr($bids);
            $bids->client_rating = !empty($_REQUEST['rating']) ? $_REQUEST['rating'] : 0;
            $bids->reviewed_client = 1;

            $db->begin();
            if ($bids->save()):
                $db->commit();
                // update overall rating for client
                calculate_rating_for_client($bids->id);
                echo json_encode(array("action" => "success", "message" => "Review submitted!"));
            else: $db->rollback();
                echo json_encode(array("action" => "error", "message" => "Review not submitted!"));
            endif;
        break;

        case "forfreelancerreview":

            $ratings = $_REQUEST['rating'];

            foreach($ratings as $key => $rating){
                $bids = Bids::find_by_all_id($_REQUEST['clientid'], $key, $_REQUEST['jobid']);
                $bids->freelancer_rating = $rating;
                $bids->reviewed_freelancer = 1;
                $save=$bids->save();

                // update overall rating for freelancer
                calculate_rating_for_freelancer($bids->id);
            }
            $db->begin();
            if ($save):
                $db->commit();
                echo json_encode(array("action" => "success", "message" => "Review submitted!"));
            else: $db->rollback();
                echo json_encode(array("action" => "error", "message" => "Review not submitted!"));
            endif;
            
        break;
			
	}
?>