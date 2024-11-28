<?php
$reslgall = '';

$gallRec = Gallery::getParentgallery(2);
if (!empty($gallRec)) {
foreach ($gallRec as $gallRow) {
$childRec = GalleryImage::getGalleryImages($gallRow->id);
if (!empty($childRec)) {
$reslgall .= '';
foreach ($childRec as $childRow) {
$file_path = SITE_ROOT . 'images/gallery/galleryimages/' . $childRow->image;
if (file_exists($file_path) and !empty($childRow->image)) {
    $reslgall .= '
        <div class="col-md-4 gallery-item">
                    <div class="img-card">
                        <a href="' . IMAGE_PATH . 'gallery/galleryimages/' . $childRow->image . '" title="" class="img-zoom">
                            <div class="img-block">
                                <div class="wrapper-img"> <img src="' . IMAGE_PATH . 'gallery/galleryimages/' . $childRow->image . '" class="img-fluid mx-auto d-block" alt="' . $childRow->title . '"> </div>
                                <div class="title-block">
                                    <h6>Haven O\'Ganga</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                    ';
}
}
$reslgall .= '';
}
}
}

$res_gallery = '
                 <!-- Gallery -->
    <section class="gallery-home section-padding bg-white">
        <div class="container">
            <div class="row mb-30">
                <div class="col-md-2">
                    <div class="sub-title border-bot-light">Some Glimpses</div>
                </div>
                <div class="col-md-10">
                    <div class="section-title">Gallery <span>O\'Ganga</span></div>
                    <p>Breathtaking views of the majestic Annapurna range and the Fewa Lake from our rooms are mesmerizing. You will also be amazed by the beautiful view from the rooftop terrace.</p>
                </div>
            </div>
            <div class="row">
                        '. $reslgall .'
                     </div>
        </div>
    </section>';

$jVars['module:galleryHome'] = $res_gallery;



$dininggallery = '';
$galldining = GalleryImage::getImagelist_by(19, 3);
if (!empty($galldining)) {
    $dininggallery .= '<div class="row about">
                     <div class="demo-gallery">
    		     <div id="lightgallery" class="list-unstyled">';
    foreach ($galldining as $row) {
        $dininggallery .= '<div class="item col-sm-4 col-xs-12" data-responsive="' . IMAGE_PATH . 'gallery/galleryimages/' . $row->image . '" data-src="' . IMAGE_PATH . 'gallery/galleryimages/' . $row->image . '" data-sub-html="<h4>' . $row->title . '</h4>">
                        <a href="">
                            <img src="' . IMAGE_PATH . 'gallery/galleryimages/' . $row->image . '"/>
                        </a>
                    </div>';
    }
    $dininggallery .= '</div>
    </div>
    </div>';
}
$jVars['module:dining-gallery'] = $dininggallery;

$gallerybread='';
$siteRegulars = Config::find_by_id(1);
$imglink= $siteRegulars->gallery_upload ;
if(!empty($imglink)){
    $img= IMAGE_PATH . 'preference/gallery/' . $siteRegulars->gallery_upload ;
}
else{
    $img='';
}

$gallerybread='


<!-- Header Banner -->
<div class="banner-header full-height section-padding valign bg-img bg-fixed bg-position-bottom" data-overlay-dark="5" data-background="'.$img.'">
    <div class="container">
        <div class="row">
            <div class="col-md-12 caption text-center">
                <h4>Photos</h4>
                <h1>Gallery 0\'Ganga</h1>
            </div>
        </div>
    </div>
    <!-- button scroll -->
    <a href="#" data-scroll-nav="1" class="mouse smoothscroll"> <span class="mouse-icon">
            <span class="mouse-wheel"></span> </span>
    </a>
</div>';

$jVars['module:gallery-bread'] = $gallerybread;

/**
 *      Main Gallery
 */
$thegal = $gallerylistbread = $thegalnav= '';
$gallRectit = Gallery::getParentgallery();

if ($gallRectit) {
    $thegal .= '';
    foreach ($gallRectit as $row) {
        $thegalnav .= '
        <li class="col-md" data-class="' . $row->id . '">' . $row->title . '</li>';
    }
    $thegal .= '';

    // $thegal .= '
    //     <div id="gallery" class="gallery full-gallery de-gallery gallery-3-cols">
    foreach ($gallRectit as $row) {
    // ';

        $gallRec = GalleryImage::getGalleryImages($row->id);
        foreach ($gallRec as $row1) {
            // pr($row1);

            $file_path = SITE_ROOT . 'images/gallery/galleryimages/' . $row1->image;
            if (file_exists($file_path) and !empty($row1->image)):
                $thegal .= ' 

                    <div class="col-md-4 images" data-class="' . $row1->galleryid . '" data-src="' . IMAGE_PATH . 'gallery/galleryimages/' . $row1->image . '" style="display: block;">
                        <img src="' . IMAGE_PATH . 'gallery/galleryimages/' . $row1->image . '" alt="' . $row1->galleryid . ' ">
                    </div>
                   
                ';
            endif;
        }
    }
    $thegal .= '';

}

$jVars['module:gallery-list'] = $thegal;
$jVars['module:gallery-nav'] = $thegalnav;
