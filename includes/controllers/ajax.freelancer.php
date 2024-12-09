<?php
// Load the header files first
header("Expires: 0");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("cache-control: no-store, no-cache, must-revalidate");
header("Pragma: no-cache");

// Load necessary files then...
require_once('../initialize.php');

$action = $_REQUEST['action'];

switch($action) {

    case "addRating":
        $record                 = freelancer::find_by_id($_REQUEST['idValue']);
        $record->admin_rating   = $_REQUEST['admin_rating'];

        $db->begin();
        if ($record->save()):$db->commit();
            $message = "Admin rating for Freelancer '" . $record->first_name . "' added successfully!";
            echo json_encode(array("action" => "success", "message" => $message));
            log_action($message, 1, 4);
        else: $db->rollback();
            echo json_encode(array("action" => "notice", "message" => $GLOBALS['basic']['noChanges']));
        endif;
    break;

}