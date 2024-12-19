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
        List of clients
    </h3>
    <div class="my-msg"></div>
    <div class="example-box">
        <div class="example-code">
            <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
                <thead>
                <tr>
                    <th style="display:none;"></th>
                    <th class="text-center">S.No.</th>
                    <th class="text-center">Client Name</th>
                    <th>Created Job</th>
                    <th>Rating</th>
                    <th class="text-center"><?php echo $GLOBALS['basic']['action']; ?></th>
                </tr>
                </thead>

                <tbody>
                <?php $records = client::find_all();
                foreach ($records as $key => $record): ?>
                    <tr id="<?php echo $record->id; ?>">
                        <td style="display:none;"><?php echo $key + 1; ?></td>
                        <td class="text-center"><?php echo $key + 1; ?></td>
                        <td>
                            <a href="javascript:void(0);" title="" class="user-ico clearfix"
                               onclick="editRecord(<?php echo $record->id; ?>);">
                                <span><?php echo $record->first_name . ' ' . $record->middle_name . ' ' . $record->last_name; ?></span>
                            </a>
                        </td>

                        <td class="text-center">
                            <a class="primary-bg medium btn loadingbar-demo" title=""
                               onClick="viewjobslist(<?php echo $record->id; ?>);" href="javascript:void(0);">
                        <span class="button-content">
                            <span class="badge bg-orange radius-all-4 mrg5R" title=""
                                  data-original-title="Badge with tooltip"><?php echo $countImages = jobs::getTotalSub($record->id); ?></span>
                            <span class="text-transform-upr font-bold font-size-11">View Lists</span>
                        </span>
                            </a>
                        </td>
                        <td><?php echo $record->rating; ?></td>
                        <td class="text-center">
                            <?php
                            $statusImage = ($record->status == 1) ? "bg-green" : "bg-red";
                            $statusText = ($record->status == 1) ? $GLOBALS['basic']['clickUnpub'] : $GLOBALS['basic']['clickPub'];
                            ?>
                            <!--<a href="javascript:void(0);"
                               class="btn small <?php echo $statusImage; ?> tooltip-button statusToggler"
                               data-placement="top" title="<?php echo $statusText; ?>"
                               status="<?php echo $record->status; ?>" id="imgHolder_<?php echo $record->id; ?>"
                               moduleId="<?php echo $record->id; ?>">
                                <i class="glyph-icon icon-flag"></i>
                            </a>-->

                            <a href="javascript:void(0);" class="loadingbar-demo btn small bg-blue-alt tooltip-button"
                               data-placement="top" title="Edit" onclick="editRecord(<?php echo $record->id; ?>);">
                                <span class="button-content"> View Detail </span>
                            </a>
                            <!--<a href="javascript:void(0);" class="loadingbar-demo btn small bg-blue-alt tooltip-button"
                               data-placement="top" title="Edit" onclick="addRating(<?php echo $record->id; ?>);">
                                <span class="button-content"> Add Rating </span>
                            </a>-->
                            <!--<a href="javascript:void(0);" class="btn small bg-red tooltip-button" data-placement="top"
                               title="Remove" onclick="recordDelete(<?php echo $record->id; ?>);">
                                <i class="glyph-icon icon-remove"></i>
                            </a>-->
                            <input name="sortId" type="hidden" value="<?php echo $record->id; ?>">
                        </td>
                    </tr>
                <?php endforeach; ?>
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
    <span class="glyph-icon icon-separator float-right">
      <i class="glyph-icon icon-cog"></i>
    </span>
            <span class="button-content"> Click </span>
        </a>-->
    </div>

<?php elseif (isset($_GET['mode']) && $_GET['mode'] == "addEdit"):
    if (isset($_GET['id']) && !empty($_GET['id'])):
        $clientId   = addslashes($_REQUEST['id']);
        $clientInfo = client::find_by_id($clientId);
        $status     = ($clientInfo->status == 1) ? "checked" : " ";
        $unstatus   = ($clientInfo->status == 0) ? "checked" : " ";
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
                    <th class="text-center">First Name</th>
                    <td><?php echo $clientInfo->first_name; ?></td>
                </tr>

                <tr>
                    <th class="text-center">Middle Name</th>
                    <td><?php echo $clientInfo->middle_name; ?></td>
                </tr>
                <tr>
                    <th class="text-center">Last Name</th>
                    <td><?php echo $clientInfo->last_name; ?></td>
                </tr>
                <tr>
                    <th class="text-center">Username</th>
                    <td><?php echo $clientInfo->username; ?></td>
                </tr>
                <tr>
                    <th class="text-center">Email</th>
                    <td><?php echo $clientInfo->email; ?></td>
                </tr>
                <tr>
                    <th class="text-center">Mobile no</th>
                    <td><?php echo $clientInfo->mobile_no; ?></td>
                </tr>
                <!--<tr>
                    <th class="text-center">Location</th>
                    <td><?php echo $clientInfo->location; ?></td>
                </tr>-->
                <tr>
                    <th class="text-center">Profile Picture</th>
                    <td><a href="<?php echo IMAGE_PATH . 'client/profile/' . $clientInfo->profile_pictiure; ?>"
                           target="_blank"><?php echo $clientInfo->profile_pictiure; ?></a></td>
                </tr>
                <!--<tr>
                    <th class="text-center">Phone No</th>
                    <td><?php echo $clientInfo->phone_no; ?></td>
                </tr>-->
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
                    <td><a href="<?php echo $clientInfo->linkdin_profile; ?>" target="_blank"><?php echo $clientInfo->linkdin_profile; ?></a></td>
                </tr>
                <tr>
                    <th class="text-center">Facebook Profile</th>
                    <td><a href="<?php echo $clientInfo->facebook_profile; ?>" target="_blank"><?php echo $clientInfo->facebook_profile; ?></a></td>
                </tr>
                <!--<tr>
                    <th class="text-center">Category ID</th>
                    <td><?php echo $clientInfo->category_id; ?></td>
                </tr>-->
                </tbody>
            </table>
        </div>
    </div>

<?php elseif (isset($_GET['mode']) && $_GET['mode'] == "addRating"):
    if (isset($_GET['id']) && !empty($_GET['id'])):
        $clientId   = addslashes($_REQUEST['id']);
        $clientInfo = client::find_by_id($clientId);
    endif;
    ?>

    <h3>
        Add Rating for ['<?= $clientInfo->first_name ?> <?= $clientInfo->last_name ?>']
        <a class="loadingbar-demo btn medium bg-blue-alt float-right" href="javascript:void(0);"
           onClick="viewclientlist();">
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
                        <select name="admin_rating" id="admin_rating" class="validate[required] col-md-1">
                            <?php
                            for ($i = 0; $i < 4; $i++) {
                                $sel = ($clientInfo->admin_rating == $i) ? 'selected' : '';
                                echo '<option value="' . $i . '" ' . $sel . '>' . $i . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <button btn-action='0' type="submit" name="submit" id="btn-submit" title="Save"
                        class="btn-submit btn large primary-bg text-transform-upr font-bold font-size-11 radius-all-4">
                <span class="button-content">Save</span>
                </button>

                <input myaction='0' type="hidden" name="idValue" id="idValue"
                       value="<?php echo !empty($clientInfo->id) ? $clientInfo->id : 0; ?>"/>
            </form>
        </div>
    </div>

<?php endif;
include("jobs.php");
?>