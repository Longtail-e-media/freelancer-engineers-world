<?php

$lastElement = $phonelinked = $whatsapp = $tellinked = '';

$telno = explode(",", $siteRegulars->contact_info);
$lastElement = array_shift($telno);
$tellinked .= '<a href="tel:' . $lastElement . '" target="_blank">' . $lastElement . '</a>';
foreach ($telno as $tel) {
    $tel1 = str_replace('+977', '', $tel);
    $tellinked .= ' | <a href="tel:+977-' . $tel1 . '" target="_blank">' . $tel1 . '</a>';
    if (end($telno) != $tel) {
        $tellinked .= '/';
    }
}

$phoneno = explode("/", $siteRegulars->whatsapp);
$lastElement = array_shift($phoneno);
$phonelinked .= '<a href="tel:+977-' . $lastElement . '" target="_blank">' . $lastElement . '</a>/';
foreach ($phoneno as $phone) {
    $phonelinked .= '<a href="tel:+977-' . $phone . '" target="_blank">' . $phone . '</a>';
    if (end($phoneno) != $phone) {
        $phonelinked .= '/';
    }
}

$email = explode(',', $siteRegulars->email_address);

$footer = '
    <footer class="bg-body-secondary">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    ' . $jVars['module:res-footer2'] . '
                </div>
                <div class="col-lg-3">
                    ' . $jVars['module:res-footer1'] . '
                </div>
                <div class="col-lg-3">
                    <p class="fs-6 fw-normal mb-3">Follow Us:</p>
                    ' . $jVars['module:socilaLinkbtm'] . ' 
                </div>
                <div class="col-lg-3">
                    <div class="fs-6 fw-normal">
                        ' . $jVars['site:copyright'] . '
                        <p class="mt-3">
                        Website by <a href="https://longtail.info/" target="_blank" class="text-dark-blue">Longtail e-Media</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
';

$jVars['module:footer'] = $footer;

if (!empty($siteRegulars->whatsapp_a)) {
    $whatsapp = '
        <div class="messenger">
            <a href="' . $siteRegulars->whatsapp_a . '" target="_blank"><img src="' . BASE_URL . 'template/web/images/whatsapp.png"></a>
        </div>
    ';
}

$jVars['module:footer-whatsapp'] = $whatsapp;
