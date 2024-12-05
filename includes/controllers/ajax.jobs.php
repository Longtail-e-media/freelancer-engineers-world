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
			
			
	}
?>