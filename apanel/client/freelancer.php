<?php
$moduleTablename = "tbl_freelancer"; // Database table name
$moduleId = 32;              // module id >>>>> tbl_modules
$moduleFoldername = "";     // Image folder name
if (isset($_GET['page']) && $_GET['page'] == "client" && isset($_GET['mode']) && $_GET['mode'] == "freelancerlist"):
    $id = intval(addslashes($_GET['id']));
    ?>
     <a class="loadingbar-demo btn medium bg-blue-alt float-right mrg5R" href="javascript:void(0);"
           onClick="viewjobslist(<?php echo $id?>);">
    <span class="glyph-icon icon-separator">
        <i class="glyph-icon icon-arrow-circle-left"></i>
    </span>
            <span class="button-content"> Back </span>
        </a>
    <h3>List of Freelancer</h3>
    
    <div class="my-msg"></div>
    <div class="example-box">
        <div class="example-code">
            <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
                <thead>
                <tr>
                    <th style="display:none;"></th>
                    <th class="text-center"><input class="check-all" type="checkbox"/></th>
                    <th>Name</th>
                    <!--<th class="text-center">Address</th>-->
                    <th class="text-center">Phone</th>
                    <th class="text-center">engineering_license_no</th>
                    <th class="text-center"><?php echo $GLOBALS['basic']['action']; ?></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $records = freelancer::find_by_sql("SELECT * FROM tbl_freelancer WHERE job_id=" . $id . "  ORDER BY sortorder DESC");
                foreach ($records as $record):
                ?>
                <tr id="<?php echo $record->id; ?>">
                    <td style="display:none;"><?php echo $record->sortorder; ?></td>
                    <td><input type="checkbox" class="bulkCheckbox" bulkId="<?php echo $record->id; ?>"/></td>
                    <td><?php echo $record->first_name; ?></td>
                   <!-- <td><?php echo $record->current_address; ?></td>-->
                    <td><?php echo $record->phone_no; ?></td>
                    <td><?php echo $record->engineering_license_no; ?></td>
                    <td class="text-center">
                        <a href="javascript:void(0);" class="loadingbar-demo btn small bg-blue-alt tooltip-button" data-placement="top" title="View detail"
                           onclick="editfreelancer(<?php echo $record->job_id; ?>,<?php echo $record->id; ?>);">
                            <span class="button-content"> View Detail </span>
                        </a>
                        <a href="javascript:void(0);" class="btn small bg-red tooltip-button" data-placement="top" title="Remove"
                           onclick="recordApplicationDelete(<?php echo $record->id; ?>);">
                            <i class="glyph-icon icon-remove"></i>
                        </a>
                    </td>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="pad0L col-md-2">
            <select name="dropdown" id="groupTaskField" class="custom-select">
                <option value="0"><?php echo $GLOBALS['basic']['choseAction']; ?></option>
                <option value="delete"><?php echo $GLOBALS['basic']['delete']; ?></option>
            </select>
        </div>
        <a class="btn medium primary-bg" href="javascript:void(0);" id="applySelected_btn">
            <span class="glyph-icon icon-separator float-right"><i class="glyph-icon icon-cog"></i></span>
            <span class="button-content"> Submit </span>
        </a>
    </div>
<?php elseif (isset($_GET['mode']) && $_GET['mode'] == "addEditfreelancer"):
    if (isset($_GET['id']) && !empty($_GET['id'])):
        $appId = addslashes($_REQUEST['id']);
        if (isset($_GET['subid']) and !empty($_GET['subid'])):
            $jobsId = addslashes($_REQUEST['subid']);
            $appInfo = freelancer::find_by_id($jobsId);
            $status = ($appInfo->status == 1) ? "checked" : " ";
            $unstatus = ($appInfo->status == 0) ? "checked" : " ";
        endif;
        
    endif;
    ?>
    <h3>
        <?php echo (isset($_GET['id'])) ? 'View freelancer' : 'View freelancer'; ?>
        <a class="loadingbar-demo btn medium bg-blue-alt float-right" href="javascript:void(0);" onClick="viewfreelancerlist(<?php echo $appId?>);">
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
            <th>Name</th>
            <td><?php $fullname= $appInfo->first_name .' '. $appInfo->middle_name .' '. $appInfo->last_name;  echo $fullname; ?></td>
        </tr>
        <tr>
    <th class="text-center">Username</th>
    <td><?php echo $appInfo->username; ?></td>
</tr>
<tr>
    <th class="text-center">Password</th>
    <td><?php echo $appInfo->password; ?></td>
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
    <td><?php echo $appInfo->upload_certificate; ?></td>
</tr>
<tr>
    <th class="text-center">Upload CV</th>
    <td><?php echo $appInfo->upload_cv; ?></td>
</tr>
<tr>
    <th class="text-center">Portfolio Website</th>
    <td><?php echo $appInfo->portfolio_website; ?></td>
</tr>
<tr>
    <th class="text-center">Facebook Profile</th>
    <td><?php echo $appInfo->facebook_profile; ?></td>
</tr>
<tr>
    <th class="text-center">LinkedIn Profile</th>
    <td><?php echo $appInfo->linkedIn_profile; ?></td>
</tr>
<tr>
    <th class="text-center">Profile Picture</th>
    <td><?php echo $appInfo->profile_picture; ?></td>
</tr>
       
        </tbody>
    </table>
<?php endif; ?>