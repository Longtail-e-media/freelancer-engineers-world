<?php

/**
 *      Homepage Advertisement
 */
$advertdatas = Advertisement::find_all_with_limit(4);
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


/**
 *      Job list page Advertisement
 */
$list_advert = '';
$advertdatas = Advertisement::find_all_with_limit(4);

if (!empty($advertdatas)) {

    foreach ($advertdatas as $advertdata) {
        if (!empty($advertdata->image)) {
            $imagepath = IMAGE_PATH . 'advertisement/' . $advertdata->image;
        }
        $list_advert .= '
            <div class="bg-secondary-subtle card w-100 border-0 rounded-0">
                <img src="' . $imagepath . '" alt="' . $advertdata->title . '" class="advertisement w-100 h-100">
            </div>
        ';
    }

}

$jVars['module:advert:job-list'] = $list_advert;