<script language="javascript">

    function getLocation() {
        return '<?php echo BASE_URL;?>includes/controllers/ajax.freelancer.php';

    }

    function getApp() {
        return '<?php echo BASE_URL;?>includes/controllers/ajax.freelancer.php';

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

    /***************************************** Vacency Create Date *******************************************/
    $(document).ready(function () {
        $('#date1').datepicker({
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            dateFormat: 'yy-mm-dd'
        });
    });

    /***************************************** View Subpackage Lists *******************************************/
    function viewfreelancerlist(Re) {
        window.location.href = "<?php echo ADMIN_URL?>vacency/vacencylist/" + Re;
    }


    $(document).ready(function () {
        // form submisstion actions
        jQuery('#vacency_frm').validationEngine({
            autoHidePrompt: true,
            scroll: true,
            onValidationComplete: function (form, status) {
                if (status == true) {
                    $('#btn-submit').attr('disabled', 'true');
                    var action = ($('#idValue').val() == 0) ? "action=add&" : "action=edit&";
                    for (instance in CKEDITOR.instances)
                        CKEDITOR.instances[instance].updateElement();

                    var data = $('#vacency_frm').serialize();
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
                                    window.location.href = "<?php echo ADMIN_URL?>vacency/list";
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
    });

    // Deleting Record
    function recordDelete(Re) {
        $('.MsgTitle').html('<?php echo sprintf($GLOBALS['basic']['deleteRecord_'], "vacency")?>');
        $('.pText').html('Click on yes button to delete this vacency permanently.!!');
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
            }
            $('.divMessageBox').fadeOut();
            $('.MessageBoxContainer').fadeOut(1000);
        });
    }

    // Deleting Record
    function recordfreelancerDelete(Re) {
        $('.MsgTitle').html('<?php echo sprintf($GLOBALS['basic']['deleteRecord_'], "vacency")?>');
        $('.pText').html('Click on yes button to delete this vacency permanently.!!');
        $('.divMessageBox').fadeIn();
        $('.MessageBoxContainer').fadeIn(1000);

        $(".botTempo").on("click", function () {
            var popAct = $(this).attr("id");
            if (popAct == 'yes') {
                $.ajax({
                    type: "POST",
                    dataType: "JSON",
                    url: getApp(),
                    data: 'action=delete&id=' + Re,
                    success: function (data) {
                        var msg = eval(data);
                        showMessage(msg.action, msg.message);
                        $('#' + Re).remove();
                        reStructureList(getTableId());
                    }
                });
            }
            $('.divMessageBox').fadeOut();
            $('.MessageBoxContainer').fadeOut(1000);
        });
    }

    /***************************************** View Vacencys Lists *******************************************/
    function viewvacencylist() {
        window.location.href = "<?php echo ADMIN_URL?>vacency/list";
    }

    function viewfreelancerlist(Re) {
        window.location.href = "<?php echo ADMIN_URL?>freelancer/list/";
    }

    /***************************************** Add New Vacencys *******************************************/
    function AddNewVacencys() {
        window.location.href = "<?php echo ADMIN_URL?>vacency/addEdit";
    }

    /***************************************** Edit records *****************************************/
    function editRecord(Re) {
        window.location.href = "<?php echo ADMIN_URL?>vacency/addEdit/" + Re;
    }

    /***************************************** Edit records *****************************************/
    function editfreelancer(Re) {
        window.location.href = "<?php echo ADMIN_URL?>freelancer/addEditfreelancer/" + Re;
    }

    function addRating(Re) {
        window.location.href = "<?php echo ADMIN_URL?>freelancer/addRating/" + Re;
    }
</script>