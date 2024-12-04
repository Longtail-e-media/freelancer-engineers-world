<?php
$booking_code = Config::getField('hotel_code', true);

$tellinked = '';
$telno = explode("/", $siteRegulars->contact_info);
$lastElement = array_shift($telno);
$tellinked .= '<a href="tel:' . $lastElement . '" target="_blank">' . $lastElement . '</a>/';
foreach ($telno as $tel) {
    $tellinked .= '<a href="tel:+977-' . $tel . '" target="_blank">' . $tel . '</a>';
    if (end($telno) != $tel) {
        $tellinked .= '/';
    }
}

$header = ob_start();
?>
    <!-- header info begin -->
    <div id="header-info">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <ul class="header-contact">
                        <li class="icon_location"><a href="<?= $siteRegulars->contact_info2 ?>" target="_blank"><?= $siteRegulars->fiscal_address ?></a></li>
                        <li class="icon_phone"><a href="tel:<?= $siteRegulars->contact_info ?>"><?= $siteRegulars->contact_info ?></a></li>
                        <li class="icon_email"><a href="mailto:<?= $siteRegulars->email_address ?>"><?= $siteRegulars->email_address ?></a></li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <div class="h_box">
                        <div class="social-icons-header">
                            <?= $jVars['module:socilaLinktop'] ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header info close -->

    <!-- header begin -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <span id="menu-btn"></span>
                    <!-- logo begin -->
                    <div id="logo">
                        <div class="inner">
                            <a href="<?= BASE_URL ?>home"><img
                                        src="<?= IMAGE_PATH ?>preference/<?= $siteRegulars->logo_upload ?>" alt="logo"></a>
                        </div>
                    </div>
                    <!-- logo close -->
                    <!-- mainmenu begin -->
                    <nav>
                        <?= $jVars['module:res-menu'] ?>
                    </nav>
                    <!-- mainmenu close -->
                </div>
            </div>
            <!-- Removed one div cause design broke -->
    </header>
    <!-- header close -->
<?php
$header = ob_get_clean();

$header = '
    <nav class="navbar navbar-expand-lg bg-body-secondary">
        <div class="container">
            <a class="navbar-brand bg-white p-1" href="' . BASE_URL . 'home">
                <img src="' . IMAGE_PATH . 'preference/' . $siteRegulars->logo_upload . '" alt="logo" class="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                ' . $jVars['module:res-menu'] . '
            </div>
        </div>
    </nav>
';
$jVars['module:header'] = $header;