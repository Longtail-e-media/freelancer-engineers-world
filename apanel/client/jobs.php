<?php
$jobsTablename = "tbl_jobs"; // Database table name
$moduleId = 23;                // module id >>>>> tbl_modules

if (isset($_GET['page']) && $_GET['page'] == "client" && isset($_GET['mode']) && $_GET['mode'] == "jobslist"):
    $id = intval(addslashes($_GET['id']));
    ?>
    <h3>
        Listed Jobs from ["<?php echo client::getclientName($id); ?>"]
        <a class="loadingbar-demo btn medium bg-blue-alt float-right mrg5R" href="javascript:void(0);"
           onClick="viewclientlist();">
            <span class="glyph-icon icon-separator"><i class="glyph-icon icon-arrow-circle-left"></i></span>
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
                    <th>Job status</th>
                    <th class="text-center"><?php echo $GLOBALS['basic']['action']; ?></th>
                </tr>
                </thead>

                <tbody>
                <?php $records = jobs::find_by_sql("SELECT * FROM " . $jobsTablename . " WHERE client_id=" . $id . " ORDER BY sortorder DESC ");

                foreach ($records as $key => $record):
                    $countImages = bids::find_total_bids($record->id);
                    switch ($record->project_status) {
                        case 1:
                            $countImages = bids::find_total_bids($record->id);
                            $jobstatus = 'Bid On Progress';
                            break;
                        case 2:
                            $countImages = bids::find_total_shortlisted($record->id);
                            $jobstatus = 'Short Listed';
                            break;
                        case 3:
                            $countImages = bids::find_total_awarded($record->id);
                            $jobstatus = 'Awarded';
                            break;
                        case 4:
                            $countImages = bids::find_total_bids($record->id);
                            $jobstatus = 'Timeout';
                            break;
                        case 5:
                            $countImages = bids::find_total_wop($record->id);
                            $jobstatus = 'Work On Progress ';
                            break;
                        case 6:
                            $countImages = bids::find_total_comp($record->id);
                            $jobstatus = 'Completed';
                            break;
                    } ?>
                    <tr id="<?php echo $record->id; ?>">
                        <td style="display:none;"><?php echo $key + 1; ?></td>
                        <td><input type="checkbox" class="bulkCheckbox" bulkId="<?php echo $record->id; ?>"/></td>
                        <td>
                            <div class="col-md-7">
                                <a href="javascript:void(0);"
                                   onClick="editjobs(<?php echo $record->client_id; ?>,<?php echo $record->id; ?>);"
                                   class="loadingbar-demo"
                                   title="<?php echo $record->title; ?>"><?php echo $record->title; ?></a>
                            </div>
                        </td>
                        <td>
                            <a class="primary-bg medium btn loadingbar-demo" title=""
                               onClick="viewfreelancerlist(<?php echo $record->id; ?>);" href="javascript:void(0);">
                                <span class="button-content">
                                    <span class="badge bg-orange radius-all-4 mrg5R" title=""
                                          data-original-title="Badge with tooltip"><?php echo $countImages;?></span>
                                    <span class="text-transform-upr font-bold font-size-11">View Lists</span>
                                </span>
                            </a>
                        </td>
                        <td><?php echo $jobstatus; ?></td>
                        <td class="text-center">
                            <?php
                            $statusImage = ($record->status == 1) ? "bg-green" : "bg-red";
                            $statusText = ($record->status == 1) ? $GLOBALS['basic']['clickUnpub'] : $GLOBALS['basic']['clickPub'];
                            ?>
                            <a href="javascript:void(0);"
                               class="btn small <?php echo $statusImage; ?> tooltip-button statusJobToggler"
                               data-placement="top" title="<?php echo $statusText; ?>"
                               status="<?php echo $record->status; ?>" id="imgHolder_<?php echo $record->id; ?>"
                               moduleId="<?php echo $record->id; ?>">
                                <i class="glyph-icon icon-flag"></i>
                            </a>
                            <a href="javascript:void(0);" class="loadingbar-demo btn small bg-blue-alt tooltip-button"
                               data-placement="top" title="Edit"
                               onclick="editjobs(<?php echo $record->client_id; ?>,<?php echo $record->id; ?>);">
                                <span class="button-content"> View Detail </span>
                            </a>
                            <!--<a href="javascript:void(0);" class="btn small bg-red tooltip-button" data-placement="top"
                               title="Remove" onclick="subrecordDelete(<?php echo $record->id; ?>);">
                                <i class="glyph-icon icon-remove"></i>
                            </a>-->
                            <?php if ($record->project_status == '6') { ?>
                                <a href="javascript:void(0);" data-placement="top" title="Edit"
                                   class="loadingbar-demo btn small bg-blue-alt tooltip-button"
                                   onclick="addRatingClient(<?php echo $record->id; ?>);">
                                    <span class="button-content"> Add Rating </span>
                                </a>
                            <?php } ?>
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
        <?php //echo (isset($_GET['subid'])) ? 'Edit Job' : 'Add Jobs';
        ?>
        <?php echo 'Edit Job' . ' ' . $jobsInfo->title; ?>
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
                    <th class="text-center">Job Title</th>
                    <td><?php echo $jobsInfo->title; ?></td>
                </tr>

                <tr>
                    <th class="text-center">Job Category</th>
                    <td><?php $jobcate = jobtitle::find_by_id($jobsInfo->job_type);
                        echo $jobcate->title; ?></td>
                </tr>

                <tr>
                    <th class="text-center">currency</th>
                    <td><?php echo $jobsInfo->currency; ?></td>
                </tr>

                <tr>
                    <th class="text-center">Budget Type</th>
                    <td><?php $statusbudget = ($jobsInfo->budget_type == 1) ? "Exact" : "Range";
                        echo $statusbudget; ?></td>
                </tr>
                <?php if ($jobsInfo->budget_type == 0) { ?>

                    <tr>
                        <th class="text-center">Budget Range High</th>
                        <td><?php echo $jobsInfo->budget_range_high; ?></td>
                    </tr>
                    <tr>
                        <th class="text-center">Budget Range Low</th>
                        <td><?php echo $jobsInfo->budget_range_low; ?></td>
                    </tr>
                <?php } elseif ($jobsInfo->budget_type == 1) {
                    ?>
                    <tr>
                        <th class="text-center">Exact Budget</th>
                        <td><?php echo $jobsInfo->exact_budget; ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <th class="text-center">Deadline Date</th>
                    <td><?php echo $jobsInfo->deadline_date; ?></td>
                </tr>
                <tr>
                    <th class="text-center">Content</th>
                    <td><?php echo $jobsInfo->content; ?></td>
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

<?php elseif (isset($_GET['mode']) && $_GET['mode'] == "addRatingClient"):
    if (isset($_GET['id']) && !empty($_GET['id'])):
        $jobID   = addslashes($_REQUEST['id']);
        $jobInfo = jobs::find_by_id($jobID);
    endif;
    ?>

    <h3>
        Add Rating for ['<?= $jobInfo->title ?>']
        <a class="loadingbar-demo btn medium bg-blue-alt float-right" href="javascript:void(0);"
           onClick="history.back();">
            <span class="glyph-icon icon-separator"><i class="glyph-icon icon-arrow-circle-left"></i></span>
            <span class="button-content"> Back </span>
        </a>
    </h3>

    <div class="my-msg"></div>
    <div class="example-box">
        <div class="example-code">
            <form action="" class="col-md-12 center-margin" id="add_rating_frm">

                <div class="form-row">
                    <div class="form-label col-md-2">
                        <label for="">
                            Rating :
                        </label>
                    </div>
                    <div class="form-input col-md-20">
                        <?php $disable = (!empty($jobInfo) and $jobInfo->reviewed_admin == 1) ? 'disabled' : ''; ?>
                        <select name="admin_rating" id="admin_rating" class="validate[required] col-md-1" <?= $disable ?> >
                            <?php
                            for ($i = 0; $i < 4; $i++) {
                                $sel = ($jobInfo->admin_rating == $i) ? 'selected' : '';
                                echo '<option value="' . $i . '" ' . $sel . '>' . $i . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <button btn-action='0' type="submit" name="submit" id="btn-submit" title="Save" <?= $disable ?>
                        class="btn-submit btn large primary-bg text-transform-upr font-bold font-size-11 radius-all-4">
                    <span class="button-content">Save</span>
                </button>

                <input myaction='0' type="hidden" name="idValue" id="idValue"
                       value="<?php echo !empty($jobInfo->id) ? $jobInfo->id : 0; ?>"/>
            </form>
        </div>
    </div>

<?php endif;
include("freelancer.php");
?>