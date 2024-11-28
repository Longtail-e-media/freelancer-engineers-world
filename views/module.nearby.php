<?php
$nearbydetail = $nearbydetail_modals= $imageList = $nearbybred = '';
$siteRegulars = Config::find_by_id(1);
if (defined('HOME_PAGE')) {
    $recRows = Nearby::find_all_active();
    // pr($recRow);
    if (!empty($recRows)) {

        foreach($recRows as $recRow){

            // $imglink = BASE_URL . 'template/web/img/slider/2.jpg';
            // if ($recRow->image != "a:0:{}") {
            //     $imageList = unserialize($recRow->image);
            //     $imgno = array_rand($imageList);
            //     $file_path = SITE_ROOT . 'images/nearby/' . $imageList[$imgno];
            //     if (file_exists($file_path)) {
            //         $imglink = IMAGE_PATH . 'nearby/' . $imageList[$imgno];
            //     }
            // }

            $nearbydetail .= '

            <div class="col-md-12 nearby-home mb-30">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4><a href="#">' . $recRow->title . '</a></h4>
                                </div>

                                <div class="col-md-2">
                                    <p>' . $recRow->distance . '</p>
                                </div>

                                <div class="col-md-4">
                                    <a target="_blank" class="getDirection" data-src="' . $recRow->Google_embed . '"><p>Get Direction <i class="ti-arrow-right"></i></p></a>
                                </div>
                            </div>
                        </div>
            ';

        } 

        $nearbydetail_modals='<div class="col-lg-5 col-md-12 offset-lg-2">
                    <div class="map-home"> 
                        <iframe src="' . $siteRegulars->location_map . '" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" id="iframe_map"></iframe>
                    </div>
                </div>';
    }
}
// pr($nearbydetail);


$jVars['module:inner-nearby-detail'] = $nearbydetail;
$jVars['module:inner-nearby-detail-map'] = $nearbydetail_modals;

?>