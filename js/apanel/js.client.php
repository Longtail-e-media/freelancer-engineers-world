<script language="javascript">

    function getLocation() {
        return '<?php echo BASE_URL;?>includes/controllers/ajax.client.php';
    }

    function getTableId() {
        return 'table_dnd';
    }

    $(document).ready(function () {
        oTable = $('#example').dataTable({
            "bJQueryUI": true,
            "sPaginationType": "full_numbers"
        })
    });

    $(document).ready(function () {
        oTable = $('#subexample').dataTable({
            "bJQueryUI": true,
            "sPaginationType": "full_numbers"
        })
    });


    $(document).ready(function () {
        $('.btn-submit').on('click', function () {
            var actVal = $(this).attr('btn-action');
            $('#idValue').attr('myaction', actVal);
        })
        // form submisstion actions
        jQuery('#client_frm').validationEngine({
            autoHidePrompt: true,
            promptPosition: "bottomLeft",
            scroll: true,
            onValidationComplete: function (form, status) {
                if (status == true) {
                    $('.btn-submit').attr('disabled', 'true');
                    var action = ($('#idValue').val() == 0) ? "action=add&" : "action=edit&";
                    for (instance in CKEDITOR.instances)
                        CKEDITOR.instances[instance].updateElement();
                    var data = $('#client_frm').serialize();
                    queryString = action + data;
                    $.ajax({
                        type: "POST",
                        dataType: "JSON",
                        url: getLocation(),
                        data: queryString,
                        success: function (data) {
                            var msg = eval(data);
                            if (msg.action == 'warning') {
                                showMessage(msg.action, msg.message);
                                setTimeout(function () {
                                    $('.my-msg').html('');
                                }, 3000);
                                $('.btn-submit').removeAttr('disabled');
                                $('.formButtons').show();
                                return false
                            }
                            if (msg.action == 'success') {
                                showMessage(msg.action, msg.message);
                                var actionId = $('#idValue').attr('myaction');
                                if (actionId == 2)
                                    setTimeout(function () {
                                        window.location.href = "<?php echo ADMIN_URL?>client/list";
                                    }, 3000);
                                if (actionId == 1)
                                    setTimeout(function () {
                                        window.location.href = "<?php echo ADMIN_URL?>client/addEdit";
                                    }, 3000);
                                if (actionId == '0')
                                    setTimeout(function () {
                                        window.location.href = "";
                                    }, 3000);
                            }
                            if (msg.action == 'notice') {
                                showMessage(msg.action, msg.message);
                                setTimeout(function () {
                                    window.location.href = window.location.href;
                                }, 3000);
                            }
                            if (msg.action == 'error') {
                                showMessage(msg.action, msg.message);
                                $('#buttonsP img').remove();
                                $('.formButtons').show();
                                return false;
                            }
                        }
                    });
                    return false;
                }
            }
        })
        /***************************************** View Sub client Lists *******************************************/
        jQuery('#subclient_frm').validationEngine({
            prettySelect: true,
            autoHidePrompt: true,
            useSuffix: "_chosen",
            promptPosition: "bottomLeft",
            scroll: true,
            onValidationComplete: function (form, status) {
                if (status == true) {
                    var Re = $("#type").val();
                    $('.btn-submit').attr('disabled', 'true');
                    var action = ($('#idValue').val() == 0) ? "action=addSubclient&" : "action=editSubclient&";
                    for (instance in CKEDITOR.instances)
                        CKEDITOR.instances[instance].updateElement();

                    var data = $('#subclient_frm').serialize();
                    queryString = action + data;
                    $.ajax({
                        type: "POST",
                        dataType: "JSON",
                        url: getLocation(),
                        data: queryString,
                        success: function (data) {
                            var msg = eval(data);
                            if (msg.action == 'warning') {
                                showMessage(msg.action, msg.message);
                                $('.btn-submit').removeAttr('disabled');
                                $('.formButtons').show();
                                return false
                            }
                            if (msg.action == 'success') {
                                showMessage(msg.action, msg.message);
                                var actionId = $('#idValue').attr('myaction');
                                if (actionId == 2)
                                    setTimeout(function () {
                                        window.location.href = "<?php echo ADMIN_URL?>client/subclientlist/" + Re;
                                    }, 3000);
                                if (actionId == 1)
                                    setTimeout(function () {
                                        window.location.href = "<?php echo ADMIN_URL?>client/addEditsubclient/" + Re;
                                    }, 3000);
                                if (actionId == 0)
                                    setTimeout(function () {
                                        window.location.href = "<?php echo ADMIN_URL?>client/subclientlist/" + Re;
                                    }, 3000);
                            }
                            if (msg.action == 'notice') {
                                showMessage(msg.action, msg.message);
                                setTimeout(function () {
                                    window.location.href = window.location.href;
                                }, 3000);
                            }
                            if (msg.action == 'error') {
                                showMessage(msg.action, msg.message);
                                $('#buttonsP img').remove();
                                $('.formButtons').show();
                                return false;
                            }
                        }
                    });
                    return false;
                }
            }
        })
        jQuery('#subgallery_frm').validationEngine({
            autoHidePrompt: true,
            scroll: false,
            onValidationComplete: function (form, status) {
                if (status == true) {
                    $('#btn-submit').attr('disabled', 'true');
                    var action = "action=addSubclientImage&";
                    var data = $('#subgallery_frm').serialize();
                    queryString = action + data;
                    $.ajax({
                        type: "POST",
                        dataType: "JSON",
                        url: getLocation(),
                        data: queryString,
                        success: function (data) {
                            var msg = eval(data);
                            if (msg.action == 'warning') {
                                showMessage(msg.action, msg.message);
                                $('#btn-submit').removeAttr('disabled');
                                $('.formButtons').show();
                                return false
                            }
                            if (msg.action == 'success') {
                                showMessage(msg.action, msg.message);
                                setTimeout(function () {
                                    window.location.href = window.location.href;
                                }, 3000);
                            }
                            if (msg.action == 'notice') {
                                showMessage(msg.action, msg.message);
                                setTimeout(function () {
                                    window.location.href = window.location.href;
                                }, 3000);
                            }
                            if (msg.action == 'error') {
                                showMessage(msg.action, msg.message);
                                $('#buttonsP img').remove();
                                $('.formButtons').show();
                                return false;
                            }
                        }
                    });
                    return false;
                }
            }
        })

        jQuery('#add_rating_frm').validationEngine({
            autoHidePrompt: true,
            promptPosition: "bottomLeft",
            scroll: true,
            onValidationComplete: function (form, status) {
                if (status == true) {
                    $('.btn-submit').attr('disabled', 'true');
                    var action = ($('#idValue').val() == 0) ? "action=addRating&" : "action=addRating&";
                    var data = $('#add_rating_frm').serialize();
                    queryString = action + data;
                    $.ajax({
                        type: "POST",
                        dataType: "JSON",
                        url: getLocation(),
                        data: queryString,
                        success: function (data) {
                            var msg = eval(data);
                            if (msg.action == 'warning') {
                                showMessage(msg.action, msg.message);
                                setTimeout(function () {
                                    $('.my-msg').html('');
                                }, 3000);
                                $('.btn-submit').removeAttr('disabled');
                                $('.formButtons').show();
                                return false
                            }
                            if (msg.action == 'success') {
                                showMessage(msg.action, msg.message);
                                setTimeout(function () {
                                    window.location.href = "";
                                }, 3000);
                            }
                            if (msg.action == 'notice') {
                                showMessage(msg.action, msg.message);
                                setTimeout(function () {
                                    window.location.href = window.location.href;
                                }, 3000);
                            }
                            if (msg.action == 'error') {
                                showMessage(msg.action, msg.message);
                                $('#buttonsP img').remove();
                                $('.formButtons').show();
                                return false;
                            }
                        }
                    });
                    return false;
                }
            }
        })

        jQuery('#add_rating_freelancr_frm').validationEngine({
            autoHidePrompt: true,
            promptPosition: "bottomLeft",
            scroll: true,
            onValidationComplete: function (form, status) {
                if (status == true) {
                    $('.btn-submit').attr('disabled', 'true');
                    var action = ($('#idValue').val() == 0) ? "action=addRatingFreelancer&" : "action=addRatingFreelancer&";
                    var data = $('#add_rating_freelancr_frm').serialize();
                    queryString = action + data;
                    $.ajax({
                        type: "POST",
                        dataType: "JSON",
                        url: getLocation(),
                        data: queryString,
                        success: function (data) {
                            var msg = eval(data);
                            if (msg.action == 'warning') {
                                showMessage(msg.action, msg.message);
                                setTimeout(function () {
                                    $('.my-msg').html('');
                                }, 3000);
                                $('.btn-submit').removeAttr('disabled');
                                $('.formButtons').show();
                                return false
                            }
                            if (msg.action == 'success') {
                                showMessage(msg.action, msg.message);
                                setTimeout(function () {
                                    window.location.href = "";
                                }, 3000);
                            }
                            if (msg.action == 'notice') {
                                showMessage(msg.action, msg.message);
                                setTimeout(function () {
                                    window.location.href = window.location.href;
                                }, 3000);
                            }
                            if (msg.action == 'error') {
                                showMessage(msg.action, msg.message);
                                $('#buttonsP img').remove();
                                $('.formButtons').show();
                                return false;
                            }
                        }
                    });
                    return false;
                }
            }
        })

    });
    /*************************** Shorting Sub Image Gallery Postion *******************************/
    $(document).ready(function () {
        $(function () {
            $(".subImagegallery-sort").sortable({
                //connectWith: ".video-sort",
                start: function (event, ui) {
                    var start_pos = ui.item.index();
                    ui.item.data('start_pos', start_pos);
                },
                update: function (event, ui) {
                    var mySel = "";
                    $('div.oldsort').each(function (i) {
                        mySel = mySel + ';' + $(this).attr('csort');
                    });
                    //var start_pos = ui.item.data('start_pos');
                    var id = ui.item.context.id;
                    var end_pos = ui.item.index();
                    $.ajax({
                        type: "POST",
                        dataType: "JSON",
                        url: getLocation(),
                        data: "action=sortSubGalley&id=" + id + "&toPosition=" + end_pos + "&sortIds=" + mySel,
                        success: function (data) {
                            var msg = eval(data);
                            showMessage(msg.action, msg.message);
                        }
                    });
                }
            });
        });
    });


    /***************************************** Add New Row *******************************************/
    function addRowss() {
        var rowNum = Math.floor((Math.random() * 999) + 1);
        var newRow = '<div class="form-row my-style" id="NewRow' + rowNum + '">';
        newRow += '<div class="form-label col-md-2"></div>';
        newRow += '<div class="form-input col-md-12">';
        newRow += '<div class="col-md-4">';
        newRow += '<input placeholder="Facility Title" type="text" name="facilityOption[]" id="facilityOption" class="validate[required]">';
        newRow += '</div>';
        newRow += '<div>';
        newRow += '<a href="javascript:void(0);" class="btn medium bg-blue tooltip-button" data-placement="right" title="Add" onclick="addRowss(this);">';
        newRow += '<i class="glyph-icon icon-plus-square"></i>';
        newRow += '</a>';
        newRow += '<a href="javascript:void(0);" class="btn medium bg-red tooltip-button" data-placement="right" title="Delete" onclick="deletenewRow(' + rowNum + ');">';
        newRow += '<i class="glyph-icon icon-minus-square"></i>';
        newRow += '</a>';
        newRow += '</div>';
        newRow += '</div>';
        newRow += '</div>';

        $('#option-field').append(newRow);
    }

    /***************************************** Delete Add Row *******************************************/
    function deletenewRow(rnum) {
        /*var x = confirm("Are you sure you want to delete?");
        if (x){*/
        $('#NewRow' + rnum).remove();
        /*}else{
        return false;
       }*/
    }

    // Deleting Record
    function recordDelete(Re) {
        $('.MsgTitle').html('<?php echo sprintf($GLOBALS['basic']['deleteRecord_'], "client")?>');
        $('.pText').html('Click on yes button to delete this client permanently.!!');
        $('.divMessageBox').fadeIn();
        $('.MessageBoxContainer').fadeIn(1000);

        $(".botTempo").on("click", function () {
            var popAct = $(this).attr("id");
            if (popAct == 'yes') {
                $.ajax({
                    type: "POST",
                    dataType: "JSON",
                    url: getLocation(),
                    data: 'action=delete&id=' + Re,
                    success: function (data) {
                        var msg = eval(data);
                        showMessage(msg.action, msg.message);
                        $('#' + Re).remove();
                        reStructureList(getTableId());
                    }
                });
            } else {
                Re = null;
            }
            $('.divMessageBox').fadeOut();
            $('.MessageBoxContainer').fadeOut(1000);
        });
    }

    $(function () {
        /*************************************** USer Image Status Toggler ******************************************/
        $('.imageStatusToggle').on('click', function () {
            var Re = $(this).attr('rowId');
            var status = $(this).attr('status');
            newStatus = (status == 1) ? 0 : 1;
            $.ajax({
                type: "POST",
                url: getLocation(),
                data: "action=SubitoggleStatus&id=" + Re,
                success: function (msg) {
                }
            });
            $(this).attr({'status': newStatus});
            if (status == 1) {
                $('#toggleImg' + Re).removeClass("icon-check-circle-o");
                $('#toggleImg' + Re).addClass("icon-clock-os-circle-o");
            } else {
                $('#toggleImg' + Re).removeClass("icon-clock-os-circle-o");
                $('#toggleImg' + Re).addClass("icon-check-circle-o");
            }
        });

        $('.statusJobToggler').on('click', function () {
            var id      = $(this).attr('moduleId');
            var status  = $(this).attr('status');
            newStatus   = (status == 1) ? 0 : 1;
            $.ajax({
                type: "POST",
                url: getLocation(),
                data: "action=jobToggleStatus&id=" + id,
                success: function (msg) {}
            });
            $(this).attr({'status': newStatus});
            if (status == 1) {
                $('#imgHolder_' + id).removeClass("bg-green");
                $('#imgHolder_' + id).addClass("bg-red");
                $(this).attr("data-original-title", "Click to Publish");
            } else {
                $('#imgHolder_' + id).removeClass("bg-red");
                $('#imgHolder_' + id).addClass("bg-green");
                $(this).attr("data-original-title", "Click to Un-publish");
            }
        });
    });


    // Deleting Record
    function subrecordDelete(Re) {
        $('.MsgTitle').html('<?php echo sprintf($GLOBALS['basic']['deleteRecord_'], "client")?>');
        $('.pText').html('Click on yes button to delete this client permanently.!!');
        $('.divMessageBox').fadeIn();
        $('.MessageBoxContainer').fadeIn(1000);

        $(".botTempo").on("click", function () {
            var popAct = $(this).attr("id");
            if (popAct == 'yes') {
                $.ajax({
                    type: "POST",
                    dataType: "JSON",
                    url: getLocation(),
                    data: 'action=deletesubclient&id=' + Re,
                    success: function (data) {
                        var msg = eval(data);
                        showMessage(msg.action, msg.message);
                        $('#' + Re).remove();
                        reStructureList(getTableId());
                    }
                });
            } else {
                Re = null;
            }
            $('.divMessageBox').fadeOut();
            $('.MessageBoxContainer').fadeOut(1000);
        });
    }

    function bidRecordDelete(Re) {
        $('.MsgTitle').html('<?php echo sprintf($GLOBALS['basic']['deleteRecord_'], "bid")?>');
        $('.pText').html('Click on yes button to delete this bid permanently.!!');
        $('.divMessageBox').fadeIn();
        $('.MessageBoxContainer').fadeIn(1000);

        $(".botTempo").on("click", function () {
            var popAct = $(this).attr("id");
            if (popAct == 'yes') {
                $.ajax({
                    type: "POST",
                    dataType: "JSON",
                    url: getLocation(),
                    data: 'action=deleteBid&id=' + Re,
                    success: function (data) {
                        var msg = eval(data);
                        if (msg.action == 'success') {
                            $('#' + Re).remove();
                            reStructureList(getTableId());
                        }
                        setTimeout(function () {
                            window.location.href = window.location.href;
                        }, 1000);
                    }
                });
            } else {
                Re = '';
            }
            $('.divMessageBox').fadeOut();
            $('.MessageBoxContainer').fadeOut(1000);
        });
    }


    /*************************************** Toggle Meta tags********************************************/
    function toggleMetadata() {
        $(".metadata").slideToggle("slow", function () {
        });
    }

    /***************************************** View client Lists *******************************************/
    function viewclientlist() {
        window.location.href = "<?php echo ADMIN_URL?>client/list";
    }

    /***************************************** Add New client *******************************************/
    function AddNewclient() {
        window.location.href = "<?php echo ADMIN_URL?>client/addEdit";
    }

    /***************************************** Edit records *****************************************/
    function editRecord(Re) {
        window.location.href = "<?php echo ADMIN_URL?>client/addEdit/" + Re;
    }

    function addRating(Re) {
        window.location.href = "<?php echo ADMIN_URL?>client/addRating/" + Re;
    }

    function addRatingClient(Re) {
        window.location.href = "<?php echo ADMIN_URL?>client/addRatingClient/" + Re;
    }

    function addRatingFreelancer(Re) {
        window.location.href = "<?php echo ADMIN_URL?>client/addRatingFreelancer/" + Re;
    }


    /***************************************** Add New Subclient *******************************************/
    function AddNewSubclient(Re) {
        window.location.href = "<?php echo ADMIN_URL?>client/addEditsubclient/" + Re;
    }

    /***************************************** View Subclient Lists *******************************************/
    function viewjobslist(Re) {
        window.location.href = "<?php echo ADMIN_URL?>client/jobslist/" + Re;
    }

    /***************************************** Edit Subclient records *****************************************/
    function editjobs(Pid, Re) {
        window.location.href = "<?php echo ADMIN_URL?>client/addEditjobs/" + Pid + "/" + Re;
    }

    /***************************************** View Subclient Lists *******************************************/
    function viewfreelancerlist(Re) {
        window.location.href = "<?php echo ADMIN_URL?>client/freelancerlist/" + Re;
    }

    /***************************************** Edit Subclient records *****************************************/
    function editfreelancer(Pid, Re) {
        window.location.href = "<?php echo ADMIN_URL?>client/addEditfreelancer/" + Pid + "/" + Re;
    }

    /******************************** Remove temp upload image ********************************/
    function deleteTempimage(Re) {
        $('#previewRoomsimage' + Re).fadeOut(1000, function () {
            $('#previewRoomsimage' + Re).remove();
        });
    }

    function viewsubimagelist(Re) {
        window.location.href = "<?php echo ADMIN_URL?>freelancer/subclientImageList/" + Re;
    }

    function viewSubImageslist(Re) {
        window.location.href = "<?php echo ADMIN_URL?>client&mode=subclientImageList/" + Re;
    }

    /******************************** Remove User saved Sub client images ********************************/
    function deleteSavedimage(Re) {
        $('.MsgTitle').html('<?php echo sprintf($GLOBALS['basic']['deleteRecord_'], "image")?>');
        $('.pText').html('Click on yes button to delete this image permanently.!!');
        $('.divMessageBox').fadeIn();
        $('.MessageBoxContainer').fadeIn(1000);

        $(".botTempo").on("click", function () {
            var popAct = $(this).attr("id");
            if (popAct == 'yes') {
                $.ajax({
                    type: "POST",
                    dataType: "JSON",
                    url: getLocation(),
                    data: 'action=deleteSubimage&id=' + Re,
                    success: function (data) {
                        var msg = eval(data);
                        if (msg.action == 'success') {
                            $('.removeSavedimg' + Re).fadeOut(1000, function () {
                                $('.removeSavedimg' + Re).remove();
                            });
                        }
                    }
                });
            } else {
                Re = '';
            }
            $('.divMessageBox').fadeOut();
            $('.MessageBoxContainer').fadeOut(1000);
        });
    }

    function deleteSavedCompanyDoc(Re) {
        $('.MsgTitle').html('<?php echo sprintf($GLOBALS['basic']['deleteRecord_'], "pdf")?>');
        $('.pText').html('Click on yes button to delete this pdf permanently.!!');
        $('.divMessageBox').fadeIn();
        $('.MessageBoxContainer').fadeIn(1000);

        $(".botTempo").on("click", function () {
            var popAct = $(this).attr("id");
            if (popAct == 'yes') {
                $('.removeSavedCompanyDoc' + Re).fadeOut(1000, function () {
                    $('.removeSavedCompanyDoc' + Re).remove();
                });
            } else {
                Re = '';
            }
            $('.divMessageBox').fadeOut();
            $('.MessageBoxContainer').fadeOut(1000);
        });
    }

    /******************************** Remove User saved client images ********************************/
    function deleteSavedclientimage(Re) {
        $('.MsgTitle').html('<?php echo sprintf($GLOBALS['basic']['deleteRecord_'], "image")?>');
        $('.pText').html('Click on yes button to delete this image permanently.!!');
        $('.divMessageBox').fadeIn();
        $('.MessageBoxContainer').fadeIn(1000);

        $(".botTempo").on("click", function () {
            var popAct = $(this).attr("id");
            if (popAct == 'yes') {
                $('#removeSavedimg' + Re).fadeOut(1000, function () {
                    $('#removeSavedimg' + Re).remove();
                    $('.uploader').fadeIn(500);
                });
            } else {
                Re = '';
            }
            $('.divMessageBox').fadeOut();
            $('.MessageBoxContainer').fadeOut(1000);
        });
    }

    /***************************************** Add New Row *******************************************/
    function addnewRow() {
        var rowNum = Math.floor((Math.random() * 999) + 1);
        var newRow = '<div class="form-row my-style" id="NewRow' + rowNum + '">';
        newRow += '<div class="form-label col-md-2"></div>';
        newRow += '<div class="form-input col-md-12">';
        newRow += '<div class="col-md-4">';
        newRow += '<input placeholder="Facility Name" type="text" name="facility[]" id="facility" class="validate[length[0,50]]">';
        newRow += '</div>';
        newRow += '<div>';
        newRow += '<a href="javascript:void(0);" class="btn medium bg-blue tooltip-button" data-placement="right" title="Add" onclick="addnewRow(this);">';
        newRow += '<i class="glyph-icon icon-plus-square"></i>';
        newRow += '</a>';
        newRow += '<a href="javascript:void(0);" class="btn medium bg-red tooltip-button" data-placement="right" title="Delete" onclick="deletenewRow(' + rowNum + ');">';
        newRow += '<i class="glyph-icon icon-minus-square"></i>';
        newRow += '</a>';
        newRow += '</div>';
        newRow += '</div>';
        newRow += '</div>';

        $('#option-field').append(newRow);
    }

    /********* On change max no of guest ***********/
    $(document).ready(function () {

        $('.maxppl').on('change', function () {
            var selVal = $(this).val();
            if (selVal == 1) {
                $('.rmovprice1').removeClass('hide');
                $('.rmovprice2').addClass('hide');
                $('.rmovprice3').addClass('hide');
            }
            if (selVal == 2) {
                $('.rmovprice1').removeClass('hide');
                $('.rmovprice2').removeClass('hide');
                $('.rmovprice3').addClass('hide');
            }
            if (selVal == 3) {
                $('.rmovprice1').removeClass('hide');
                $('.rmovprice2').removeClass('hide');
                $('.rmovprice3').removeClass('hide');
            }
        });
        $('.maxppl').trigger('change');

        $(".character-details").keyup(function () {
            var a = 125, b = $(this).val().length;
            if (b >= a) $(".description-remaining").text(" you have reached the limit");
            else {
                var c = a - b;
                $(".description-remaining").text(c + " characters left")
            }
        });
    })

    /***************************************** Delete Add Row *******************************************/
    function deletenewRow(rnum) {
        /*var x = confirm("Are you sure you want to delete?");
        if (x){*/
        $('#NewRow' + rnum).remove();
        /*}else{
        return false;
       }*/
    }

    /***************************************** Add New Row *******************************************/
    function addnewRow2() {
        var rowNum = Math.floor((Math.random() * 999) + 1);
        var newRow = '<div class="form-row my-style" id="NewRowserv' + rowNum + '">';
        newRow += '<div class="form-label col-md-2"></div>';
        newRow += '<div class="form-input col-md-12">';
        newRow += '<div class="col-md-4">';
        newRow += '<input placeholder="Service Name" type="text" name="service[]" id="service" class="validate[length[0,50]]">';
        newRow += '</div>';
        newRow += '<div>';
        newRow += '<a href="javascript:void(0);" class="btn medium bg-blue tooltip-button" data-placement="right" title="Add" onclick="addnewRow2(this);">';
        newRow += '<i class="glyph-icon icon-plus-square"></i>';
        newRow += '</a>';
        newRow += '<a href="javascript:void(0);" class="btn medium bg-red tooltip-button" data-placement="right" title="Delete" onclick="deletenewRow2(' + rowNum + ');">';
        newRow += '<i class="glyph-icon icon-minus-square"></i>';
        newRow += '</a>';
        newRow += '</div>';
        newRow += '</div>';
        newRow += '</div>';

        $('#option-field2').append(newRow);
    }

    /***************************************** Delete Add Row *******************************************/
    function deletenewRow2(rnum) {
        /*var x = confirm("Are you sure you want to delete?");
        if (x){*/
        $('#NewRowserv' + rnum).remove();
        /*}else{
        return false;
       }*/
    }

    function deleteImgheader(Re) {
        $('.MsgTitle').html('Do you want to delete the record ?');
        $('.pText').html('Clicking yes will be delete this record permanently. !!!');
        $('.divMessageBox').fadeIn();
        $('.MessageBoxContainer').fadeIn(1000);

        $(".botTempo").on("click", function () {
            var popAct = $(this).attr("id");
            if (popAct == 'yes') {
                $('#removeSavedimg' + Re).fadeOut(1000, function () {
                    $('#removeSavedimg' + Re).remove();
                    $('.uploader').fadeIn(500);
                });
            } else {
                Re = '';
            }
            $('.divMessageBox').fadeOut();
            $('.MessageBoxContainer').fadeOut(1000);
        });
    }

    // New slug
    $(document).on('blur', 'input[name="title"], input[name="slug"]', function () {
        var title = $(this).val();
        var actid = $('#idValue').val();
        $.ajax({
            url: getLocation(),
            type: 'POST',
            dataType: 'json',
            data: {'action': 'slug', 'title': title, 'actid': actid},
        })
            .done(function (data) {
                var msg = eval(data);
                $('input[name="slug"]').val(msg.result);
                $('span#error').html(msg.msgs);
            });
        return false;
    });

    function editImageTitle(Re) {
        var clicked = $('.clicked' + Re);
        $(clicked).html("");
        $('<input/>').attr({
            type: 'text',
            id: 'ne-title',
            name: 'ne-title',
            class: 'validate[required,length[0,250]] col-md-9',
            'imgId': Re
        }).appendTo($(clicked)).focus();
        $(clicked).append(' <button type="submit" id="ne-submit" class="col-md-3">Save</button>');

        $('.up-title').on("click", "#ne-submit", function (e) {
            var data = $("#ne-title");
            var id = $(data).attr("imgId");
            var title = $(data).val();
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: getLocation(),
                data: 'action=editSubGalleryImageText&id=' + id + '&title=' + title,
                success: function (data) {
                    var msg = eval(data);
                    if (msg.action == 'success') {
                        showMessage(msg.action, msg.message);
                        setTimeout(function () {
                            window.location.href = window.location.href;
                        }, 3000);
                    }
                    if (msg.action == 'error') {
                        showMessage(msg.action, msg.message);
                        setTimeout(function () {
                            window.location.href = window.location.href;
                        }, 3000);
                    }
                    if (msg.action == 'notice') {
                        showMessage(msg.action, msg.message);
                        setTimeout(function () {
                            window.location.href = window.location.href;
                        }, 3000);
                    }
                }
            });
        });
    }
</script>