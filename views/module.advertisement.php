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

        $linkstart = $linkend = '';
        if(!empty($advertdata->linksrc)){
            $target = ($advertdata->linktype == 1) ? 'target="_blank"' : '';
            $linkstart = '<a href="' . $advertdata->linksrc . '" ' . $target . '>';
            $linkend = '</a>';
        }

        $advertdetail .= '
            <div class="card border-0 rounded-0 bg-dark-subtle mb-4">
                ' . $linkstart . '<img src="' . $imagepath . '" alt="' . $advertdata->title . '" class="advertisement">' . $linkend . '
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

        $linkstart = $linkend = '';
        if (!empty($advertdata->linksrc)) {
            $target = ($advertdata->linktype == 1) ? 'target="_blank"' : '';
            $linkstart = '<a href="' . $advertdata->linksrc . '" ' . $target . '>';
            $linkend = '</a>';
        }

        $list_advert .= '
            <div class="bg-secondary-subtle card w-100 border-0 rounded-0">
                ' . $linkstart . '<img src="' . $imagepath . '" alt="' . $advertdata->title . '" class="advertisement">' . $linkend . '
            </div>
        ';
    }

}

$jVars['module:advert:job-list'] = $list_advert;