<?php
$moduleTablename = "tbl_freelancer"; // Database table name
$moduleId = 32;              // module id >>>>> tbl_modules
$moduleFoldername = "";     // Image folder name
if (isset($_GET['page']) && $_GET['page'] == "client" && isset($_GET['mode']) && $_GET['mode'] == "freelancerlist"):
    $id = intval(addslashes($_GET['id']));
    $job = jobs::find_by_id($id);
    // pr($job,1);
    ?>
    <a class="loadingbar-demo btn medium bg-blue-alt float-right mrg5R" href="javascript:void(0);"
       onClick="viewjobslist(<?php echo $job->client_id ?>);">
    <span class="glyph-icon icon-separator">
        <i class="glyph-icon icon-arrow-circle-left"></i>
    </span>
        <span class="button-content"> Back </span>
    </a>
    <h3>List of Freelancers for ["<?= $job->title; ?>"]</h3>

    <div class="my-msg"></div>
    <div class="example-box">
        <div class="example-code">
            <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
                <thead>
                <tr>
                    <th style="display:none;"></th>
                    <th class="text-center">S.No.</th>
                    <th>Name</th>
                    <!--<th class="text-center">Address</th>-->
                    <th class="text-center">Engineering License No</th>
                    <th class="text-center">Status</th>
                    <th class="text-center"><?php echo $GLOBALS['basic']['action']; ?></th>
                </tr>
                </thead>
                <tbody>
                <?php
                /**  DO NOT DELETE OLD CODE TO ONLY SHOW FREELANCERS ACCORDING TO THEIR STATUS
                 * $jobdata = jobs::find_by_id($id);
                 * $fjobstatus='';
                 * if ($jobdata->project_status == 5) {
                 * $fjobstatus = '6';
                 * } elseif ($jobdata->project_status == 6) {
                 * $fjobstatus = '5';
                 * } else {
                 * $fjobstatus = $jobdata->project_status;
                 * }
                 * $sql = "SELECT f.* FROM tbl_freelancer as f
                 * INNER JOIN tbl_bids as b ON f.id = b.freelancer_id
                 * INNER JOIN tbl_jobs as j ON b.job_id = j.id
                 * WHERE (b.job_id=" . $id . " ) AND
                 * (j.project_status=" . $jobdata->project_status . " AND b.project_status=" . $fjobstatus . ")
                 * ORDER BY f.sortorder DESC";
                 */

                $sql = "SELECT f.*, b.project_status, b.id as b_id FROM tbl_freelancer as f 
                        INNER JOIN tbl_bids as b ON f.id = b.freelancer_id
                     WHERE b.job_id=" . $id . " 
                     ORDER BY f.sortorder ASC ";
                $query = $db->query($sql);
                $numRows = $db->num_rows($query);
                $counter = 1;
                if ($numRows > 0) {
                    while ($record = $db->fetch_object($query)) {
                ?>
                <tr id="<?php echo $record->id; ?>">
                    <td style="display:none;"><?php echo $record->sortorder; ?></td>
                    <td class="text-center"><?php echo ($counter); $counter=$counter+1;?></td>
                    <td><?php echo $record->first_name; ?></td>
                    <!-- <td><?php echo $record->current_address; ?></td>-->
                    <td class="text-center"><?php echo $record->engineering_license_no; ?></td>
                    <td class="text-center">
                        <?php
                        switch ($record->project_status):
                            case '1':
                                echo "Bid On Progress";
                                break;
                            case '2':
                                echo "Short Listed";
                                break;
                            case '3':
                                echo "Awarded";
                                break;
                            case '4':
                                echo "Declined";
                                break;
                            case '5':
                                echo "Completed";
                                break;
                            case '6':
                                echo "Work On Progress";
                                break;
                        endswitch;
                        ?>
                    </td>
                    <td class="text-center">
                        <a href="javascript:void(0);" class="loadingbar-demo btn small bg-blue-alt tooltip-button"
                           data-placement="top" title="View detail"
                           onclick="editfreelancer(<?php echo $record->b_id; ?>,<?php echo $record->id; ?>);">
                            <span class="button-content"> View Detail </span>
                        </a>
                        <?php
                        $bidRecs = bids::find_by_sql("SELECT * FROM tbl_bids WHERE freelancer_id='$record->id' AND job_id='$id' LIMIT 1");
                        $bidRec = $bidRecs[0];
                        if ($bidRec->project_status == '5') { ?>
                            <a href="javascript:void(0);" class="loadingbar-demo btn small bg-blue-alt tooltip-button"
                               data-placement="top" title="Edit"
                               onclick="addRatingFreelancer(<?= $bidRec->id ?>,<?php echo $record->id; ?>);">
                                <span class="button-content"> Add Rating </span>
                            </a>
                        <?php } ?>
                        <a href="javascript:void(0);" class="btn small bg-red tooltip-button" data-placement="top"
                           title="Remove" onclick="bidRecordDelete(<?php echo $record->b_id; ?>);">
                            <i class="glyph-icon icon-remove"></i>
                        </a>
                    </td>
                <?php
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
        <!--<div class="pad0L col-md-2">
            <select name="dropdown" id="groupTaskField" class="custom-select">
                <option value="0"><?php echo $GLOBALS['basic']['choseAction']; ?></option>
                <option value="delete"><?php echo $GLOBALS['basic']['delete']; ?></option>
            </select>
        </div>
        <a class="btn medium primary-bg" href="javascript:void(0);" id="applySelected_btn">
            <span class="glyph-icon icon-separator float-right"><i class="glyph-icon icon-cog"></i></span>
            <span class="button-content"> Submit </span>
        </a>-->
    </div>

<?php elseif (isset($_GET['mode']) && $_GET['mode'] == "addEditfreelancer"):
    if (isset($_GET['id']) && !empty($_GET['id'])):
        $appId = addslashes($_REQUEST['id']);
        if (isset($_GET['subid']) and !empty($_GET['subid'])):
            $jobsId = addslashes($_REQUEST['subid']);
            $appInfo = freelancer::find_by_id($jobsId);
            $bidInfo = bids::find_by_id($appId);
            $jobInfo = jobs::find_by_id($bidInfo->job_id);

            $status = ($appInfo->status == 1) ? "checked" : " ";
            $unstatus = ($appInfo->status == 0) ? "checked" : " ";
        endif;

    endif;
    ?>
    <h3>
        Freelancer Bid Detail
        <a class="loadingbar-demo btn medium bg-blue-alt float-right" href="javascript:void(0);"
           onClick="viewfreelancerlist(<?php echo $appId ?>);">
            <span class="glyph-icon icon-separator"><i class="glyph-icon icon-arrow-circle-left"></i></span>
            <span class="button-content"> Back </span>
        </a>
    </h3>
    <div class="my-msg"></div>

    <table cellpadding="0" cellspacing="0" border="0" class="table">
        <thead>
        <tr>
            <th style="display:none;"></th>
        </tr>
        </thead>
        <tbody>
        <?php $record = freelancer::find_by_sql("SELECT * FROM " . $moduleTablename . " ORDER BY sortorder DESC ");
        ?>
        <td style="display:none;"><?php echo $appInfo->sortorder; ?></td>
        <tr>
            <th>Bid Amount</th>
            <td><?php echo $jobInfo->currency . ' ' . $bidInfo->bid_amount; ?></td>
        </tr>
        <tr>
            <th>Delivery days</th>
            <td><?php echo $bidInfo->delivery; ?></td>
        </tr>
        <tr>
            <th>Message</th>
            <td><?php echo $bidInfo->message; ?></td>
        </tr>
        </tbody>
    </table>

    <h3>Freelancer Personal Detail</h3>
    <table cellpadding="0" cellspacing="0" border="0" class="table">
        <thead>
        <tr>
            <th style="display:none;"></th>
        </tr>
        </thead>
        <tbody>
        <?php $record = freelancer::find_by_sql("SELECT * FROM " . $moduleTablename . " ORDER BY sortorder DESC ");
        ?>
        <td style="display:none;"><?php echo $appInfo->sortorder; ?></td>
        <tr>
            <th>Bid Amount</th>
            <td><?php echo $jobInfo->currency . ' ' . $bidInfo->bid_amount; ?></td>
        </tr>
        <tr>
            <th>Delivery days</th>
            <td><?php echo $bidInfo->delivery; ?></td>
        </tr>
        <tr>
            <th>Message</th>
            <td><?php echo $bidInfo->message; ?></td>
        </tr>

        <tr>
            <th>Name</th>
            <td><?php $fullname = $appInfo->first_name . ' ' . $appInfo->middle_name . ' ' . $appInfo->last_name;
                echo $fullname; ?></td>
        </tr>
        <tr>
            <th class="text-center">Username</th>
            <td><?php echo $appInfo->username; ?></td>
        </tr>
        <tr>
            <th class="text-center">Email</th>
            <td><?php echo $appInfo->email; ?></td>
        </tr>
        <tr>
            <th class="text-center">Engineering License No</th>
            <td><?php echo $appInfo->engineering_license_no; ?></td>
        </tr>
        <tr>
            <th class="text-center">Engineering Field</th>
            <td><?php echo $appInfo->engineering_field; ?></td>
        </tr>
        <tr>
            <th class="text-center">Mobile No</th>
            <td><?php echo $appInfo->mobile_no; ?></td>
        </tr>
        <tr>
            <th class="text-center">Phone No</th>
            <td><?php echo $appInfo->phone_no; ?></td>
        </tr>
        <tr>
            <th class="text-center">Education Level</th>
            <td><?php echo $appInfo->education_lvl; ?></td>
        </tr>
        <tr>
            <th class="text-center">Current Address</th>
            <td><?php echo $appInfo->current_address; ?></td>
        </tr>
        <tr>
            <th class="text-center">Permanent Address</th>
            <td><?php echo $appInfo->permanent_address; ?></td>
        </tr>
        <tr>
            <th class="text-center">PAN No</th>
            <td><?php echo $appInfo->pan_no; ?></td>
        </tr>
        <tr>
            <th class="text-center">Upload Certificate</th>
            <td>
                <a href="<?php echo IMAGE_PATH . 'freelancer/engineeringCertificate/' . $appInfo->upload_certificate; ?>" target="_blank">
                    <?php echo $appInfo->upload_certificate; ?>
                </a>
            </td>
        </tr>
        <tr>
            <th class="text-center">Upload CV</th>
            <td>
                <a href="<?php echo IMAGE_PATH . 'freelancer/cv/' . $appInfo->upload_cv; ?>" target="_blank">
                    <?php echo $appInfo->upload_cv; ?>
                </a>
            </td>
        </tr>
        <!--<tr>
            <th class="text-center">Portfolio Website</th>
            <td><a href="<?php echo $appInfo->portfolio_website; ?>" target="_blank"><?php echo $appInfo->portfolio_website; ?></a></td>
        </tr>-->
        <tr>
            <th class="text-center">Facebook Profile</th>
            <td><a href="<?php echo $appInfo->facebook_profile; ?>" target="_blank"><?php echo $appInfo->facebook_profile; ?></a></td>
        </tr>
        <tr>
            <th class="text-center">LinkedIn Profile</th>
            <td><a href="<?php echo $appInfo->linkedIn_profile; ?>" target="_blank"><?php echo $appInfo->linkedIn_profile; ?></a></td>
        </tr>
        <tr>
            <th class="text-center">Profile Picture</th>
            <td>
                <a href="<?php echo IMAGE_PATH . 'freelancer/profile/' . $appInfo->profile_picture; ?>" target="_blank">
                    <?php echo $appInfo->profile_picture; ?>
                </a>
            </td>
        </tr>

        </tbody>
    </table>


<?php elseif (isset($_GET['mode']) && $_GET['mode'] == "addRatingFreelancer"):
    if (isset($_GET['id']) && !empty($_GET['id'])):
        $bidID   = addslashes($_REQUEST['id']);
        $bidInfo = bids::find_by_id($bidID);
        $jobTitle = jobs::field_by_id($bidInfo->job_id,'title');
    endif;
    ?>

    <h3>
        Add Rating for ['<?= $jobTitle ?>']
        <a class="loadingbar-demo btn medium bg-blue-alt float-right" href="javascript:void(0);"
           onClick="history.back();">
            <span class="glyph-icon icon-separator"><i class="glyph-icon icon-arrow-circle-left"></i></span>
            <span class="button-content"> Back </span>
        </a>
    </h3>

    <div class="my-msg"></div>
    <div class="example-box">
        <div class="example-code">
            <form action="" class="col-md-12 center-margin" id="add_rating_freelancr_frm">

                <div class="form-row">
                    <div class="form-label col-md-2">
                        <label for="">
                            Rating :
                        </label>
                    </div>
                    <div class="form-input col-md-20">
                        <?php $disable = (!empty($bidInfo) and $bidInfo->reviewed_admin == 1) ? 'disabled' : ''; ?>
                        <select name="admin_rating" id="admin_rating" class="validate[required] col-md-1" <?= $disable ?> >
                            <?php
                            for ($i = 0; $i < 3; $i++) {
                                $sel = ($bidInfo->admin_rating == $i) ? 'selected' : '';
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
                       value="<?php echo !empty($bidInfo->id) ? $bidInfo->id : 0; ?>"/>
            </form>
        </div>
    </div>

<?php endif; ?>