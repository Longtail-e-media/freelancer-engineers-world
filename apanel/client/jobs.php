<?php
$jobsTablename = "tbl_jobs"; // Database table name
$moduleId = 23;                // module id >>>>> tbl_modules
// pr('asdasdasdasd',1);
if (isset($_GET['page']) && $_GET['page'] == "client" && isset($_GET['mode']) && $_GET['mode'] == "jobslist"):
    $id = intval(addslashes($_GET['id']));
    // SerclearImages($jobsTablename, "jobs");
    // SerclearImages($jobsTablename, "jobs/thumbnails");

    // clearImages($jobsTablename, "jobs/image", "image2");
    // clearImages($jobsTablename, "jobs/image/thumbnails", "image2");

    // clearImages("tbl_jobs_images", "package/galleryimages");
    // clearImages("tbl_jobs_images", "package/galleryimages/thumbnails");
    ?>
    <h3>
        Listed Jobs from ["<?php echo client::getclientName($id); ?>"]
        <a class="loadingbar-demo btn medium bg-blue-alt float-right" href="javascript:void(0);"
           onClick="AddNewjobs(<?php echo $id; ?>);">
    <span class="glyph-icon icon-separator">
    	<i class="glyph-icon icon-plus-square"></i>
    </span>
            <span class="button-content"> Add New </span>
        </a>
        <a class="loadingbar-demo btn medium bg-blue-alt float-right mrg5R" href="javascript:void(0);"
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
            <table cellpadding="0" cellspacing="0" border="0" class="table" id="subexample">
                <thead>
                <tr>
                    <th style="display:none;"></th>
                    <th class="text-center"><input class="check-all" type="checkbox"/></th>
                    <th>Job Name</th>
                    <th class="text-center">Freelancer</th>
                    <th class="text-center"><?php echo $GLOBALS['basic']['action']; ?></th>
                </tr>
                </thead>

                <tbody>
                <?php $records = jobs::find_by_sql("SELECT * FROM " . $jobsTablename . " WHERE client_id=" . $id . " ORDER BY sortorder DESC ");
                foreach ($records as $key => $record): ?>
                    <tr id="<?php echo $record->id; ?>">
                        <td style="display:none;"><?php echo $key + 1; ?></td>
                        <td><input type="checkbox" class="bulkCheckbox" bulkId="<?php echo $record->id; ?>"/></td>
                        <td>
                            <div class="col-md-7">
                                <a href="javascript:void(0);"
                                   onClick="editjobs(<?php echo $record->client_id; ?>,<?php echo $record->id; ?>);"
                                   class="loadingbar-demo"
                                   title="<?php echo $record->job_title; ?>"><?php echo $record->job_title; ?></a>
                            </div>
                        </td>
                        <td>
                            <a class="primary-bg medium btn loadingbar-demo" title=""
                               onClick="viewfreelancerlist(<?php echo $record->id; ?>);" href="javascript:void(0);">
                        <span class="button-content">
                            <span class="badge bg-orange radius-all-4 mrg5R" title=""
                                  data-original-title="Badge with tooltip"><?php echo $countImages = jobs::getTotalSub($record->id);
                                //var_dump($countImages);die();?></span>

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
                               class="btn small <?php echo $statusImage; ?> tooltip-button statusSubToggler"
                               data-placement="top" title="<?php echo $statusText; ?>"
                               status="<?php echo $record->status; ?>" id="imgHolder_<?php echo $record->id; ?>"
                               moduleId="<?php echo $record->id; ?>">
                                <i class="glyph-icon icon-flag"></i>
                            </a>
                            <a href="javascript:void(0);" class="loadingbar-demo btn small bg-blue-alt tooltip-button"
                               data-placement="top" title="Edit"
                               onclick="editjobs(<?php echo $record->client_id; ?>,<?php echo $record->id; ?>);">
                                <i class="glyph-icon icon-edit"></i>
                            </a>
                            <a href="javascript:void(0);" class="btn small bg-red tooltip-button" data-placement="top"
                               title="Remove" onclick="subrecordDelete(<?php echo $record->id; ?>);">
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
                <option value="subdelete"><?php echo $GLOBALS['basic']['delete']; ?></option>
                <option value="subtoggleStatus"><?php echo $GLOBALS['basic']['toggleStatus']; ?></option>
            </select>
        </div>
        <a class="btn medium primary-bg" href="javascript:void(0);" id="applySelected_btn">
    <span class="glyph-icon icon-separator float-right">
      <i class="glyph-icon icon-cog"></i>
    </span>
            <span class="button-content"> Submit </span>
        </a>
    </div>

<?php elseif (isset($_GET['mode']) && $_GET['mode'] == "addEditjobs"):
    $pid = addslashes($_REQUEST['id']);
    if (isset($_GET['subid']) and !empty($_GET['subid'])):
        $jobsId = addslashes($_REQUEST['subid']);
        $jobsInfo = jobs::find_by_id($jobsId);
        $status = ($jobsInfo->status == 1) ? "checked" : " ";
        $unstatus = ($jobsInfo->status == 0) ? "checked" : " ";
    endif;
    ?>
    <h3>
        <?php echo (isset($_GET['subid'])) ? 'Edit Jobs' : 'Add Jobs'; ?>
        <a class="loadingbar-demo btn medium bg-blue-alt float-right" href="javascript:void(0);"
           onClick="viewjobslist(<?php echo $pid; ?>);">
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
        <tr>
    <th class="text-center">ID</th>
    <td><?php echo $jobsInfo->id; ?></td>
</tr>
<tr>
    <th class="text-center">Client ID</th>
    <td><?php echo $jobsInfo->client_id; ?></td>
</tr>
<tr>
    <th class="text-center">Job Title</th>
    <td><?php echo $jobsInfo->job_title; ?></td>
</tr>
<tr>
    <th class="text-center">Budget Type</th>
    <td><?php echo $jobsInfo->budget_type; ?></td>
</tr>
<tr>
    <th class="text-center">Exact Budget</th>
    <td><?php echo $jobsInfo->exact_budget; ?></td>
</tr>
<tr>
    <th class="text-center">Budget Range High</th>
    <td><?php echo $jobsInfo->budget_range_high; ?></td>
</tr>
<tr>
    <th class="text-center">Budget Range Low</th>
    <td><?php echo $jobsInfo->budget_range_low; ?></td>
</tr>
<tr>
    <th class="text-center">Deadline Date</th>
    <td><?php echo $jobsInfo->deadline_date; ?></td>
</tr>
<tr>
    <th class="text-center">Content</th>
    <td><?php echo $jobsInfo->content; ?></td>
</tr>
<tr>
    <th class="text-center">Archive Date</th>
    <td><?php echo $jobsInfo->archive_date; ?></td>
</tr>
<tr>
    <th class="text-center">Status</th>
    <td><?php echo $jobsInfo->status; ?></td>
</tr>

        </tbody>
        </table>

        </div>
    </div>

    <link href="<?php echo ASSETS_PATH; ?>uploadify/uploadify.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="<?php echo ASSETS_PATH; ?>uploadify/jquery.uploadify.min.js"></script>
    <script type="text/javascript">
        // <![CDATA[
        // $(document).ready(function () {
        //     $('#jobs_upload').uploadify({
        //         'swf': '<?php echo ASSETS_PATH;?>uploadify/uploadify.swf',
        //         'uploader': '<?php echo ASSETS_PATH;?>uploadify/uploadify.php',
        //         'formData': {
        //             PROJECT: '<?php echo SITE_FOLDER;?>',
        //             targetFolder: 'images/jobs/',
        //             thumb_width: 380,
        //             thumb_height: 478
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
        //             $.post('<?php echo BASE_URL;?>apanel/package/uploaded_image_sub.php', {imagefile: filename}, function (msg) {
        //                 $('#preview_Image').append(msg).show();
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

        //     $('#image_upload').uploadify({
        //         'swf': '<?php echo ASSETS_PATH;?>uploadify/uploadify.swf',
        //         'uploader': '<?php echo ASSETS_PATH;?>uploadify/uploadify.php',
        //         'formData': {
        //             PROJECT: '<?php echo SITE_FOLDER;?>',
        //             targetFolder: 'images/jobs/image/',
        //             thumb_width: 380,
        //             thumb_height: 478
        //         },
        //         'method': 'post',
        //         'cancelImg': '<?php echo BASE_URL;?>uploadify/cancel.png',
        //         'auto': true,
        //         'multi': false,
        //         'hideButton': false,
        //         'buttonText': 'Upload Image',
        //         'width': 125,
        //         'height': 21,
        //         'removeCompleted': true,
        //         'progressData': 'speed',
        //         'uploadLimit': 100,
        //         'fileTypeExts': '*.gif; *.jpg; *.jpeg;  *.png;  *.GIF; *.JPG; *.JPEG; *.PNG;',
        //         'buttonClass': 'button formButtons',
        //         /* 'checkExisting' : '/uploadify/check-exists.php',*/
        //         'onUploadSuccess': function (file, data, response) {
        //             $('#uploadedImageName').val('1');
        //             var filename = data;
        //             $.post('<?php echo BASE_URL;?>apanel/package/uploaded_image_sub2.php', {imagefile: filename}, function (msg) {
        //                 $('#preview_Image2').html(msg).show();
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

        //     $('#menu_upload').uploadify({
        //         'swf': '<?php echo ASSETS_PATH;?>uploadify/uploadify.swf',
        //         'uploader': '<?php echo ASSETS_PATH;?>uploadify/uploadify.php',
        //         'formData': {
        //             PROJECT: '<?php echo SITE_FOLDER;?>',
        //             targetFolder: 'images/jobs/menuimg/',
        //             thumb_width: 380,
        //             thumb_height: 478
        //         },
        //         'method': 'post',
        //         'cancelImg': '<?php echo BASE_URL;?>uploadify/cancel.png',
        //         'auto': true,
        //         'multi': false,
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
        //             $.post('<?php echo BASE_URL;?>apanel/package/uploaded_image_sub3.php', {imagefile: filename}, function (msg) {
        //                 $('#preview_Image3').html(msg).show();
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
        //             targetFolder: 'images/jobs/imgheader/',
        //             thumb_width: 200,
        //             thumb_height: 200
        //         },
        //         'method': 'post',
        //         'cancelImg': '<?php echo BASE_URL;?>uploadify/cancel.png',
        //         'auto': true,
        //         'multi': false,
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
        //             $.post('<?php echo BASE_URL;?>apanel/package/header_image2.php', {imagefile: filename}, function (msg) {
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
        //     $('#companyDoc').uploadify({
        //     'swf': '<?php echo ASSETS_PATH;?>uploadify/uploadify.swf',
        //     'uploader': '<?php echo ASSETS_PATH;?>uploadify/uploadify.php',
        //     'formData': {
        //         PROJECT: '<?php echo SITE_FOLDER;?>',
        //         targetFolder: 'images/hotelusercompanydoc/',
        //         thumb_width: 200,
        //         thumb_height: 200
        //     },
        //     'method': 'post',
        //     'cancelImg': '<?php echo BASE_URL;?>assets/uploadify/cancel.png',
        //     'auto': true,
        //     'multi': true,
        //     'hideButton': false,
        //     'buttonText': 'Upload Document',
        //     'width': 125,
        //     'height': 27,
        //     'removeCompleted': true,
        //     'progressData': 'speed',
        //     'uploadLimit': 100,
        //     'fileTypeExts': '*.gif; *.jpg; *.jpeg;  *.png; *.pdf; *.GIF; *.JPG; *.JPEG; *.PNG; *.PDF;',
        //     'buttonClass': 'button formButtons',
        //     /* 'checkExisting' : '/uploadify/check-exists.php',*/
        //     'onUploadSuccess': function (file, data, response) {
        //         var filename = data;
        //         $.post('<?php echo BASE_URL;?>apanel/package/uploaded_user_company_doc.php', {imagefile: filename}, function (msg) {
        //             $('#preview_Company_Doc').html(msg).show();
        //         });

        //     },
        //     'onDialogOpen': function (event, ID, fileObj) {
        //     },
        //     'onUploadError': function (file, errorCode, errorMsg, errorString) {
        //         alert(errorMsg);
        //     },
        //     'onUploadComplete': function (file) {
        //         //alert('The file ' + file.name + ' was successfully uploaded');
        //     },
        // });
        // });
        
        // ]]>
    </script>
<?php endif;
include("freelancer.php");
 ?>