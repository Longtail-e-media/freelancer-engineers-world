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

    case "jobToggleStatus":
        $id     = $_REQUEST['id'];
        $record = jobs::find_by_id($id);
        $record->status = ($record->status == 1) ? 0 : 1 ;
        $db->begin();
        $res   =  $record->save();
        if ($res): $db->commit(); else: $db->rollback(); endif;
        echo "";
        break;

}