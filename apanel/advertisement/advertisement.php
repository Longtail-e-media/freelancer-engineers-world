<link href="<?php echo ASSETS_PATH; ?>uploadify/uploadify.css" rel="stylesheet" type="text/css"/>
<?php
$moduleTablename = "tbl_advertisement"; // Database table name
$moduleId = 8;                // module id >>>>> tbl_modules
$moduleFoldername = "";        // Image folder name

$advArr = array(1 => 'Left', 2 => 'Top', 3 => 'Right', 4 => 'Bottom');

if (isset($_GET['page']) && $_GET['page'] == "advertisement" && isset($_GET['mode']) && $_GET['mode'] == "list"):
    clearImages($moduleTablename, "advertisement");
    clearImages($moduleTablename, "advertisement/thumbnails");
    ?>
    <h3>
        List Advertisement
        <a class="loadingbar-demo btn medium bg-blue-alt float-right" href="javascript:void(0);" onClick="AddNewAdvertisement();">
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
                    <th class="text-center" width="5%"><input class="check-all" type="checkbox"/></th>
                    <th class="text-left" width="40%">Title</th>
                    <th class="text-left">Link</th>
                    <th class="text-center" width="10%"><?php echo $GLOBALS['basic']['action']; ?></th>
                </tr>
                </thead>

                <tbody>
                <?php $records = Advertisement::find_by_sql("SELECT * FROM " . $moduleTablename . " ORDER BY sortorder DESC ");
                foreach ($records as $key => $record): ?>
                    <tr id="<?php echo $record->id; ?>">
                        <td style="display:none;"><?php echo $key + 1; ?></td>
                        <td><input type="checkbox" class="bulkCheckbox" bulkId="<?php echo $record->id; ?>"/></td>
                        <td>
                            <div class="top-icon-bar dropdown">
                                <a href="javascript:void(0);" title="" class="user-ico clearfix" data-toggle="dropdown">
                                    <span><?php echo $record->title; ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="infobox info-bg mrg0B">
                                            <img src="<?php echo IMAGE_PATH . 'advertisement/thumbnails/' . $record->image; ?>" style="width:100%"/>
                                            <span><?php echo $record->title; ?></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </td>
                        <td class="text-left"><?php echo set_na($record->linksrc); ?></td>
                        <td class="text-center">
                            <?php
                            $statusImage = ($record->status == 1) ? "bg-green" : "bg-red";
                            $statusText = ($record->status == 1) ? $GLOBALS['basic']['clickUnpub'] : $GLOBALS['basic']['clickPub'];
                            ?>
                            <a href="javascript:void(0);" class="btn small <?php echo $statusImage; ?> tooltip-button statusToggler"
                               data-placement="top" title="<?php echo $statusText; ?>" status="<?php echo $record->status; ?>"
                               id="imgHolder_<?php echo $record->id; ?>" moduleId="<?php echo $record->id; ?>">
                                <i class="glyph-icon icon-flag"></i>
                            </a>
                            <a href="javascript:void(0);" class="loadingbar-demo btn small bg-blue-alt tooltip-button" data-placement="top"
                               title="Edit" onclick="editRecord(<?php echo $record->id; ?>);">
                                <i class="glyph-icon icon-edit"></i>
                            </a>
                            <a href="javascript:void(0);" class="btn small bg-red tooltip-button" data-placement="top" title="Remove"
                               onclick="recordDelete(<?php echo $record->id; ?>);">
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
        $advId = addslashes($_REQUEST['id']);
        $advInfo = Advertisement::find_by_id($advId);

        $external = ($advInfo->linktype == 1) ? "checked" : "";
        $internal = ($advInfo->linktype == 0) ? "checked" : "";

        $status = ($advInfo->status == 1) ? "checked" : " ";
        $unstatus = ($advInfo->status == 0) ? "checked" : " ";

        $advertisement = ($advInfo->advertisement == 1) ? "checked" : " ";
        $unadvertisement = ($advInfo->advertisement == 0) ? "checked" : " ";
    endif;
    ?>
    <h3>
        AddEdit Advertisement
        <a class="loadingbar-demo btn medium bg-blue-alt float-right" href="javascript:void(0);" onClick="viewadvertisementlist();">
            <span class="glyph-icon icon-separator">
                <i class="glyph-icon icon-arrow-circle-left"></i>
            </span>
            <span class="button-content"> Back </span>
        </a>
    </h3>
    <div class="my-msg"></div>
    <div class="example-box">
        <div class="example-code">
            <form action="" class="col-md-12 center-margin" id="advertisment_frm">
                <div class="form-row">
                    <div class="form-label col-md-2">
                        <label for="">
                            Title :
                        </label>
                    </div>
                    <div class="form-input col-md-8">
                        <input placeholder="Advertisment Title" class="col-md-6 validate[required,length[0,50]]" type="text" name="title" id="title"
                               value="<?php echo !empty($advInfo->title) ? $advInfo->title : ""; ?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-label col-md-2">
                        <label for="">
                            Link Type :
                        </label>
                    </div>
                    <div class="form-checkbox-radio col-md-9">
                        <input id="" class="custom-radio" type="radio" name="linktype" value="0"
                               onClick="linkTypeSelect(0);" <?php echo !empty($internal) ? $internal : "checked"; ?>>
                        <label for="">Internal Link</label>
                        <input id="" class="custom-radio" type="radio" name="linktype" value="1"
                               onClick="linkTypeSelect(1);" <?php echo !empty($external) ? $external : ""; ?>>
                        <label for="">External Link</label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-label col-md-2">
                        <label for="">
                            Link :
                        </label>
                    </div>
                    <div class="form-input col-md-8">
                        <div class="col-md-4" style="padding-left:0px !important;">
                            <input placeholder="Link" class="validate[length[0,150]]" type="text" name="linksrc" id="linksrc"
                                   value="<?php echo !empty($advInfo->linksrc) ? $advInfo->linksrc : ""; ?>">
                        </div>
                        <div class="col-md-6" style="padding-left:0px !important;">
                            <select data-placeholder="Select Link Page" class="col-md-4 chosen-select" id="linkPage">
                                <option value=""></option>
                                <?php
                                $Lpageview = !empty($advInfo->linksrc) ? $advInfo->linksrc : "";
                                $LinkTypeview = !empty($advInfo->linktype) ? $advInfo->linktype : "";
                                // Page Page Link
                                echo Article::get_internal_link($Lpageview, $LinkTypeview);
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-label col-md-2">
                        <label for="">
                            Image :
                        </label>
                    </div>

                    <?php if (!empty($advInfo->image)): ?>
                        <div class="col-md-3" id="removeSavedimg<?php echo $advInfo->id; ?>">
                            <div class="infobox info-bg">
                                <div class="button-group" data-toggle="buttons">
                                    <span class="float-left">
                                        <?php
                                        if (file_exists(SITE_ROOT . "images/advertisement/" . $advInfo->image)):
                                            $filesize = filesize(SITE_ROOT . "images/advertisement/" . $advInfo->image);
                                            echo 'Size : ' . getFileFormattedSize($filesize);
                                        endif;
                                        ?>
                                    </span>
                                    <a class="btn small float-right" href="javascript:void(0);"
                                       onclick="deleteSavedAdvertisementimage(<?php echo $advInfo->id; ?>);">
                                        <i class="glyph-icon icon-trash-o"></i>
                                    </a>
                                </div>
                                <img src="<?php echo IMAGE_PATH . 'advertisement/thumbnails/' . $advInfo->image; ?>" style="width:100%"/>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="form-input col-md-10 uploader <?php echo !empty($advInfo->image) ? "hide" : ""; ?>">
                        <input type="file" name="gallery_upload" id="gallery_upload" class="transparent no-shadow">
                        <label>
                            <small>Recommended Image Dimension Left (720 px X 900 px)</small>
                        </label>
                    </div>
                    <!-- Upload user image preview -->
                    <div id="preview_Image"><input type="hidden" name="imageArrayname"
                                                   value="<?php echo !empty($advInfo->image) ? $advInfo->image : ""; ?>" class=""/></div>
                </div>

                <div class="form-row hide">
                    <div class="form-label col-md-2">
                        <label for="">
                            Advertisement Type :
                        </label>
                    </div>
                    <div class="form-checkbox-radio col-md-9">
                        <input type="radio" class="custom-radio" name="advertisement" id="check1"
                               value="1" <?php echo !empty($advertisement) ? $advertisement : "checked"; ?>>
                        <label for="">Main Advertisement</label>
                        <input type="radio" class="custom-radio" name="advertisement" id="check0"
                               value="0" <?php echo !empty($unadvertisement) ? $unadvertisement : ""; ?>>
                        <label for="">Secondary Advertisement</label>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-label col-md-2">
                        <label for="">
                            Status :
                        </label>
                    </div>
                    <div class="form-checkbox-radio col-md-9">
                        <input type="radio" class="custom-radio" name="status" id="check1"
                               value="1" <?php echo !empty($status) ? $status : "checked"; ?>>
                        <label for="">Published</label>
                        <input type="radio" class="custom-radio" name="status" id="check0"
                               value="0" <?php echo !empty($unstatus) ? $unstatus : ""; ?>>
                        <label for="">Un-Published</label>
                    </div>
                </div>

                <button type="submit" name="submit" class="btn large primary-bg text-transform-upr font-bold font-size-11 radius-all-4"
                        id="btn-submit" title="Save">
                    <span class="button-content">
                        Save
                    </span>
                </button>
                <input type="hidden" name="idValue" id="idValue" value="<?php echo !empty($advInfo->id) ? $advInfo->id : 0; ?>"/>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo ASSETS_PATH; ?>uploadify/jquery.uploadify.min.js"></script>
    <script type="text/javascript">
        // <![CDATA[
        $(document).ready(function () {
            $('#gallery_upload').uploadify({
                'swf': '<?php echo ASSETS_PATH;?>uploadify/uploadify.swf',
                'uploader': '<?php echo ASSETS_PATH;?>uploadify/uploadify.php',
                'formData': {PROJECT: '<?php echo SITE_FOLDER;?>', targetFolder: 'images/advertisement/', thumb_width: 200, thumb_height: 200},
                'method': 'post',
                'cancelImg': '<?php echo BASE_URL;?>uploadify/cancel.png',
                'auto': true,
                'multi': false,
                'hideButton': false,
                'buttonText': 'Upload Image',
                'width': 125,
                'height': 21,
                'removeCompleted': true,
                'progressData': 'speed',
                'uploadLimit': 100,
                'fileTypeExts': '*.gif; *.jpg; *.jpeg;  *.png; *.GIF; *.JPG; *.JPEG; *.PNG;',
                'buttonClass': 'button formButtons',
                /* 'checkExisting' : '/uploadify/check-exists.php',*/
                'onUploadSuccess': function (file, data, response) {
                    $('#uploadedImageName').val('1');
                    var filename = data;
                    $.post('<?php echo BASE_URL;?>apanel/advertisement/uploaded_image.php', {imagefile: filename}, function (msg) {
                        $('#preview_Image').html(msg).show();
                    });

                },
                'onDialogOpen': function (event, ID, fileObj) {
                },
                'onUploadError': function (file, errorCode, errorMsg, errorString) {
                    alert(errorMsg);
                },
                'onUploadComplete': function (file) {
                    //alert('The file ' + file.name + ' was successfully uploaded');
                }
            });
        });
        // ]]>
    </script>
    <script>
        $(document).ready(function () {
            /************************************ Editor for message *****************************************/
            var base_url = "<?php echo ASSETS_PATH; ?>";
            /*
            CKEDITOR.replace('content', {
                toolbar:
                    [
                        {name: 'document', items: ['Source', '-', 'Save', 'NewPage', 'DocProps', 'Preview', 'Print', '-', 'Templates']},
                        {name: 'styles', items: ['Styles', 'Format', 'Font', 'FontSize']}, '/',
                        {name: 'colors', items: ['TextColor', 'BGColor']},
                        {name: 'tools', items: ['Maximize', 'ShowBlocks', '-', 'About']}
                    ]
            });
            */
        });
    </script>
<?php endif; ?>