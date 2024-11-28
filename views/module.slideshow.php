<?php
/* First Slideshow */
$reslide='';

$RecRows = Slideshow::getSlideshow_by();
// pr($RecRows);
// var_dump($Records); die();
foreach($RecRows as $RecRow){
if($RecRow) {

    $file_path = SITE_ROOT.'images/slideshow/video/'.$RecRow->source;
    if(file_exists($file_path) and !empty($RecRow->source)) {
        $reslide='
        <video src="'.IMAGE_PATH.'slideshow/video/'.$RecRow->source.'" class="w-100" autoplay muted loop></video>


';

    }
            }
        
}

$jVars['module:slideshow']= $reslide;
?>