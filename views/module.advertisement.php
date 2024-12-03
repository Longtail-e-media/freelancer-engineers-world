<?php

$advertdatas = Advertisement::find_all();
$advertdetail = '';

if (!empty($advertdatas)) {

    foreach ($advertdatas as $advertdata) {
        if (!empty($advertdata->image)) {
            $imagepath = IMAGE_PATH . 'advertisement/' . $advertdata->image;
        }
        $advertdetail .= '
            <div class="card border-0 rounded-0 bg-dark-subtle mb-4">
                <img src="' . $imagepath . '" alt="' . $advertdata->title . '" class="advertisement">
            </div>
        ';
    }

}

$jVars['module:advert-home'] = $advertdetail;
