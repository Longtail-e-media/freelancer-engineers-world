<link href="<?php echo ASSETS_PATH; ?>uploadify/uploadify.css" rel="stylesheet" type="text/css"/>
<?php
$moduleTablename = "tbl_client"; // Database table name
$moduleId = 23;                // module id >>>>> tbl_modules
$moduleFoldername = "";        // Image folder name

if (isset($_GET['page']) && $_GET['page'] == "client" && isset($_GET['mode']) && $_GET['mode'] == "list"):
    // clearImages($moduleTablename, "client");
    // clearImages($moduleTablename, "client/thumbnails");

    // SerclearImages($moduleTablename, "client/banner", "banner_image");
    // SerclearImages($moduleTablename, "client/banner/thumbnails", "banner_image");
    ?>
    <h3>
        List clients
        <a class="loadingbar-demo btn medium bg-blue-alt float-right" href="javascript:void(0);"
           onClick="AddNewclient();">
    <span class="glyph-icon icon-separator">
    	<i class="glyph-icon icon-plus-square"></i>
    </span>
            <span class="button-content"> Add New </span>
        </a>
    </h3>
    <div class="my-msg"></div>
    <div class="example-box">
        <div class="example-code">
            <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
                <thead>
                <tr>
                    <th style="display:none;"></th>
                    <th class="text-center"><input class="check-all" type="checkbox"/></th>
                    <th class="text-center">Client Name</th>
                    <th>Freelancer</th>
                    <th class="text-center"><?php echo $GLOBALS['basic']['action']; ?></th>
                </tr>
                </thead>

                <tbody>
                <?php $records = client::find_all();
                foreach ($records as $key => $record): ?>
                    <tr id="<?php echo $record->id; ?>">
                        <td style="display:none;"><?php echo $key + 1; ?></td>
                        <td><input type="checkbox" class="bulkCheckbox" bulkId="<?php echo $record->id; ?>"/></td>
                        <td>
                            <a href="javascript:void(0);" title="" class="user-ico clearfix"
                               onclick="editRecord(<?php echo $record->id; ?>);">
                                <span><?php echo $record->client_name; ?></span>
                            </a>
                        </td>
                        <td>
                            <a class="primary-bg medium btn loadingbar-demo" title=""
                               onClick="viewjobslist(<?php echo $record->id; ?>);" href="javascript:void(0);">
                        <span class="button-content">
                            <span class="badge bg-orange radius-all-4 mrg5R" title=""
                                  data-original-title="Badge with tooltip"><?php echo $countImages = jobs::getTotalSub($record->id); ?></span>
                            <span class="text-transform-upr font-bold font-size-11">View Lists</span>
                        </span>
                            </a>
                        </td>
                        <td class="text-center">
                            <?php
                            $statusImage = ($record->status == 1) ? "bg-green" : "bg-red";
                            $statusText = ($record->status == 1) ? $GLOBALS['basic']['clickUnpub'] : $GLOBALS['basic']['clickPub'];
                            ?>
                            <a href="javascript:void(0);"
                               class="btn small <?php echo $statusImage; ?> tooltip-button statusToggler"
                               data-placement="top" title="<?php echo $statusText; ?>"
                               status="<?php echo $record->status; ?>" id="imgHolder_<?php echo $record->id; ?>"
                               moduleId="<?php echo $record->id; ?>">
                                <i class="glyph-icon icon-flag"></i>
                            </a>
                            
                            <a href="javascript:void(0);" class="loadingbar-demo btn small bg-blue-alt tooltip-button"
                               data-placement="top" title="Edit" onclick="editRecord(<?php echo $record->id; ?>);">
                               <span class="button-content"> View Detail </span>
                            </a>
                            <a href="javascript:void(0);" class="btn small bg-red tooltip-button" data-placement="top"
                               title="Remove" onclick="recordDelete(<?php echo $record->id; ?>);">
                                <i class="glyph-icon icon-remove"></i>
                            </a>
                            <input name="sortId" type="hidden" value="<?php echo $record->id; ?>">
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="pad0L col-md-2">
            <select name="dropdown" id="groupTaskField" class="custom-select">
                <option value="0"><?php echo $GLOBALS['basic']['choseAction']; ?></option>
                <option value="delete"><?php echo $GLOBALS['basic']['delete']; ?></option>
                <option value="toggleStatus"><?php echo $GLOBALS['basic']['toggleStatus']; ?></option>
            </select>
        </div>
        <a class="btn medium primary-bg" href="javascript:void(0);" id="applySelected_btn">
    <span class="glyph-icon icon-separator float-right">
      <i class="glyph-icon icon-cog"></i>
    </span>
            <span class="button-content"> Click </span>
        </a>
    </div>

<?php elseif (isset($_GET['mode']) && $_GET['mode'] == "addEdit"):
    if (isset($_GET['id']) && !empty($_GET['id'])):
        $clientId = addslashes($_REQUEST['id']);
        $clientInfo = client::find_by_id($clientId);
        $status = ($clientInfo->status == 1) ? "checked" : " ";
        $unstatus = ($clientInfo->status == 0) ? "checked" : " ";
        // $masrom = ($clientInfo->type == 1) ? "checked" : " ";
        // $unmasrom = ($clientInfo->type == 0) ? "checked" : " ";
    endif;
    ?>
    <h3>
        <?php echo (isset($_GET['id'])) ? 'Edit client' : 'Add client'; ?>
        <a class="loadingbar-demo btn medium bg-blue-alt float-right" href="javascript:void(0);"
           onClick="viewclientlist();">
    <span class="glyph-icon icon-separator">
        <i class="glyph-icon icon-arrow-circle-left"></i>
    </span>
            <span class="button-content"> Back </span>
        </a>
    </h3>

    <div class="my-msg"></div>
    <div class="example-box">
        <div class="example-code">
        <table cellpadding="0" cellspacing="0" border="0" class="table">
        <thead>
        <tr>
            <th style="display:none;"></th>
        </tr>
        </thead>
        <tbody>
        <?php $record = freelancer::find_by_sql("SELECT * FROM " . $moduleTablename . " ORDER BY sortorder DESC ");
        ?>
        <td style="display:none;"><?php echo $clientInfo->sortorder; ?></td>
            <tr>
    <th class="text-center">Client Name</th>
    <td><?php echo $clientInfo->client_name; ?></td>
</tr>
<tr>
    <th class="text-center">Location</th>
    <td><?php echo $clientInfo->location; ?></td>
</tr>
<tr>
    <th class="text-center">Profile Picture</th>
    <td><?php echo $clientInfo->profile_picture; ?></td>
</tr>
<tr>
    <th class="text-center">Phone No</th>
    <td><?php echo $clientInfo->phone_no; ?></td>
</tr>
<tr>
    <th class="text-center">Current Address</th>
    <td><?php echo $clientInfo->current_address; ?></td>
</tr>
<tr>
    <th class="text-center">Permanent Address</th>
    <td><?php echo $clientInfo->permanent_address; ?></td>
</tr>
<tr>
    <th class="text-center">PAN No</th>
    <td><?php echo $clientInfo->pan_no; ?></td>
</tr>
<tr>
    <th class="text-center">LinkedIn Profile</th>
    <td><?php echo $clientInfo->linkdin_profile; ?></td>
</tr>
<tr>
    <th class="text-center">Facebook Profile</th>
    <td><?php echo $clientInfo->facebook_profile; ?></td>
</tr>
<tr>
    <th class="text-center">Category ID</th>
    <td><?php echo $clientInfo->category_id; ?></td>
</tr>
</tbody>
</table>
        </div>
    </div>
   

    <script>
        var base_url = "<?php echo ASSETS_PATH; ?>";
        var editor_arr = ["content"];
        create_editor(base_url, editor_arr);
    </script>
    <script type="text/javascript" src="<?php echo ASSETS_PATH; ?>uploadify/jquery.uploadify.min.js"></script>
    <script type="text/javascript">
        // <![CDATA[
        // $(document).ready(function () {
        //     $('#client_upload').uploadify({
        //         'swf': '<?php echo ASSETS_PATH;?>uploadify/uploadify.swf',
        //         'uploader': '<?php echo ASSETS_PATH;?>uploadify/uploadify.php',
        //         'formData': {
        //             PROJECT: '<?php echo SITE_FOLDER;?>',
        //             targetFolder: 'images/client/',
        //             thumb_width: 200,
        //             thumb_height: 200
        //         },
        //         'method': 'post',
        //         'cancelImg': '<?php echo BASE_URL;?>uploadify/cancel.png',
        //         'auto': true,
        //         'multi': true,
        //         'hideButton': false,
        //         'buttonText': 'Upload Image',
        //         'width': 125,
        //         'height': 21,
        //         'removeCompleted': true,
        //         'progressData': 'speed',
        //         'uploadLimit': 100,
        //         'fileTypeExts': '*.gif; *.jpg; *.jpeg;  *.png; *.GIF; *.JPG; *.JPEG; *.PNG;',
        //         'buttonClass': 'button formButtons',
        //         /* 'checkExisting' : '/uploadify/check-exists.php',*/
        //         'onUploadSuccess': function (file, data, response) {
        //             $('#uploadedImageName').val('1');
        //             var filename = data;
        //             $.post('<?php echo BASE_URL;?>apanel/client/uploaded_image.php', {imagefile: filename}, function (msg) {
        //                 $('#preview_Image').html(msg).show();
        //             });

        //         },
        //         'onDialogOpen': function (event, ID, fileObj) {
        //         },
        //         'onUploadError': function (file, errorCode, errorMsg, errorString) {
        //             alert(errorMsg);
        //         },
        //         'onUploadComplete': function (file) {
        //             //alert('The file ' + file.name + ' was successfully uploaded');
        //         }
        //     });

        //     $('#banner_upload').uploadify({
        //         'swf': '<?php echo ASSETS_PATH;?>uploadify/uploadify.swf',
        //         'uploader': '<?php echo ASSETS_PATH;?>uploadify/uploadify.php',
        //         'formData': {
        //             PROJECT: '<?php echo SITE_FOLDER;?>',
        //             targetFolder: 'images/client/banner/',
        //             thumb_width: 200,
        //             thumb_height: 200
        //         },
        //         'method': 'post',
        //         'cancelImg': '<?php echo BASE_URL;?>uploadify/cancel.png',
        //         'auto': true,
        //         'multi': true,
        //         'hideButton': false,
        //         'buttonText': 'Upload Image',
        //         'width': 125,
        //         'height': 21,
        //         'removeCompleted': true,
        //         'progressData': 'speed',
        //         'uploadLimit': 100,
        //         'fileTypeExts': '*.gif; *.jpg; *.jpeg;  *.png; *.GIF; *.JPG; *.JPEG; *.PNG;',
        //         'buttonClass': 'button formButtons',
        //         /* 'checkExisting' : '/uploadify/check-exists.php',*/
        //         'onUploadSuccess': function (file, data, response) {
        //             $('#uploadedImageName').val('1');
        //             var filename = data;
        //             $.post('<?php echo BASE_URL;?>apanel/client/banner_image.php', {imagefile: filename}, function (msg) {
        //                 $('#preview_banner').append(msg).show();
        //             });

        //         },
        //         'onDialogOpen': function (event, ID, fileObj) {
        //         },
        //         'onUploadError': function (file, errorCode, errorMsg, errorString) {
        //             alert(errorMsg);
        //         },
        //         'onUploadComplete': function (file) {
        //             //alert('The file ' + file.name + ' was successfully uploaded');
        //         }
        //     });

        //     $('#header_upload').uploadify({
        //         'swf': '<?php echo ASSETS_PATH;?>uploadify/uploadify.swf',
        //         'uploader': '<?php echo ASSETS_PATH;?>uploadify/uploadify.php',
        //         'formData': {
        //             PROJECT: '<?php echo SITE_FOLDER;?>',
        //             targetFolder: 'images/client/imgheader/',
        //             thumb_width: 200,
        //             thumb_height: 200
        //         },
        //         'method': 'post',
        //         'cancelImg': '<?php echo BASE_URL;?>uploadify/cancel.png',
        //         'auto': true,
        //         'multi': true,
        //         'hideButton': false,
        //         'buttonText': 'Upload Image',
        //         'width': 125,
        //         'height': 21,
        //         'removeCompleted': true,
        //         'progressData': 'speed',
        //         'uploadLimit': 100,
        //         'fileTypeExts': '*.gif; *.jpg; *.jpeg;  *.png; *.GIF; *.JPG; *.JPEG; *.PNG;',
        //         'buttonClass': 'button formButtons',
        //         /* 'checkExisting' : '/uploadify/check-exists.php',*/
        //         'onUploadSuccess': function (file, data, response) {
        //             var filename = data;
        //             $.post('<?php echo BASE_URL;?>apanel/client/header_image.php', {imagefile: filename}, function (msg) {
        //                 $('#preview_himage').html(msg).show();
        //             });
        //         },
        //         'onDialogOpen': function (event, ID, fileObj) {
        //         },
        //         'onUploadError': function (file, errorCode, errorMsg, errorString) {
        //             alert(errorMsg);
        //         },
        //         'onUploadComplete': function (file) {
        //             //alert('The file ' + file.name + ' was successfully uploaded');
        //         }
        //     });
        // });
        // ]]>
    </script>

<?php endif;
include("jobs.php"); 
?>