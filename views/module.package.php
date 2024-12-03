<?php
$booking_code = Config::getField('hotel_code', true);


/*
* Home accmodation list
*/
$reshmpkg = '';
$imageList = '';

if (defined('HOME_PAGE')) {
    $acid = Package::get_accommodationId();
    $pkgRec = Package::find_by_id($acid);
    if (!empty($pkgRec)) {
        $subRec = Subpackage::getPackage_limit($acid);

        if (!empty($subRec)) {
            $imglink = '';
            $reshmpkg .= '';

            $reshmpkg .= "";
            foreach ($subRec as $subRow) {

                $features_of_rooms = '';
                if ($subRow->class_room_style == 'best_deal') {
                    $features_of_rooms = '<div class="tags discount">Best Deal</div>';
                } elseif ($subRow->class_room_style == 'featured_room') {
                    $features_of_rooms = '<div class="tags featured">Featured Room</div>';
                }

                $img123 = unserialize($subRow->image);

                if (!empty($subRow->image)) {

                    $imgpath = IMAGE_PATH . 'subpackage/' . $img123[0];
                } else {
                    $imgpath = IMAGE_PATH . 'static/inner-img.jpg';
                }
                $file_path = SITE_ROOT . 'images/subpackage/' . $img123[0];
                if (file_exists($file_path) and !empty($subRow->image)) {
                    $reshmpkg .= '
                            <div class="col-md-4 room-item wow fadeInUp" data-wow-delay=".4s">
                               <div class="inner">
                                   ' . $features_of_rooms . '
                                   <img src="' . $imgpath . '" class="img-responsive" alt="' . $subRow->title . '">
                                   <h3>' . $subRow->title . '</h3>
                                   <div class="price_from">Start From <span>' . $subRow->currency . ' ' . $subRow->onep_price . '++</span>/night</div>
                                   <div class="spacer-half"></div>
                                   <a href="' . BASE_URL . $subRow->slug . '" class="btn-detail">View Details</a>
                               </div>
                           </div>
                                ';

                }
            }
            $reshmpkg .= '';
        }
    }


}


$jVars['module:home-accommodation'] = $reshmpkg;


/*
* Home sub package list
*/
$newpkg = '';

if (defined('HOME_PAGE')) {
//$slug = !empty($_REQUEST['slug'])? addslashes($_REQUEST['slug']) : '';
//$pkgRec = Package::getPackage();
//if (!empty($pkgRec)) {

    /* foreach($pkgRec as $pkgRow) {
        $imglink = '';*/
    /* if ($pkgRow->banner_image != "a:0:{}") {
         $imageList = unserialize($pkgRow->banner_image);
         $file_path = SITE_ROOT . 'images/package/banner/' . $imageList[0];
         if (file_exists($file_path)) {
             $imglink = IMAGE_PATH . 'package/banner/' . $imageList[0];
         }
     } */
    // if(($pkgRow->type)==0) {
    $newpkg .= '<div class="col-sm-6">
                <div class="mosaic_container">
                     <a href="' . BASE_URL . 'page/about-us">
                    <img src="' . BASE_URL . 'template/web/img/mosaic_1.jpg" alt="image" class="img-responsive add_bottom_30"><span class="caption_2">Experience Peninsula</span>
                    </a>
                </div>
            </div>';
    //}else{
    $newpkg .= '<div class="col-sm-6">
         
         <div class="col-xs-12">
                    <div class="mosaic_container">
                        <a href="' . BASE_URL . 'services">
                        <img src="' . BASE_URL . 'template/web/img/mosaic_2.jpg" alt="image" class="img-responsive add_bottom_30"><span class="caption_2">Services & Faciities</span>
                        </a>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="mosaic_container">
                        <a href="' . BASE_URL . 'rooms">
                        <img src="' . BASE_URL . 'template/web/img/room.jpg" alt="rooms" class="img-responsive add_bottom_30"><span class="caption_2">
Accommodation</span>
                        </a>
                    </div>
                </div>
                  <div class="col-xs-6">
                     <a href="' . BASE_URL . 'dining">
                    <div class="mosaic_container">
                        <img src="' . BASE_URL . 'template/web/img/dining.jpg" alt="dining" class="img-responsive add_bottom_30"><span class="caption_2">Dining & Bar</span>
                    </div>
                    </a>
                </div>
                
                  </div>
                ';

    //}
    //}
//}
}
$jVars['module:newpkg'] = $newpkg;


/////
$reshplist = $pakagehometype = '';
$cnt = 1;
if (defined('HOME_PAGE')) {
    $pgkRows = Package::find_by_id(1);
    $pkgRec = Subpackage::getPackage_limits(1, 6);

    if (!empty($pkgRec)) {

        foreach ($pkgRec as $pkgRow) {
            //echo "<pre>";print_r($pkgRow);die();

            //if(!empty($pkgRow->image2)) {


            //echo "<pre>";print_r($reshplist);die();
            if (($cnt % 3) == 2) {
                $reshplist .= ' <div class="container margin_60">
        <div class="row">
            <div class="col-md-5 col-md-offset-1 col-md-push-5">
                  <figure class="room_pic left"><a href="' . BASE_URL . '' . $pkgRow->slug . '"><img src="' . IMAGE_PATH . 'subpackage/image/' . $pkgRow->image2 . '" alt="' . $pkgRow->title . '" class="img-responsive"></a><span class="wow zoomIn"><sup>' . $pkgRow->currency . ' </sup>' . $pkgRow->onep_price . '<small>Per night</small></span></figure>
            </div>
            <div class="col-md-4 col-md-offset-1 col-md-pull-6">
                <div class="room_desc_home">
                    <h3>' . $pkgRow->title . '</h3>
                    <p>
                         ' . $pkgRow->detail . ' 
                    </p>
                    <ul>';
                $saveRec = unserialize($pkgRow->feature);
                $count = 1;

                $reshplist .= '</ul>
                    <a href="' . BASE_URL . '' . $pkgRow->slug . '" class="btn_1_outline">Read more</a>
                </div><!-- End room_desc_home -->
            </div>
        </div><!-- End row -->
    </div>';

            } else {
                $reshplist .= '  <div class="container_styled_1">
        <div class="container margin_60">
            <div class="row">
                <div class="col-md-5 col-md-offset-1">
                    <figure class="room_pic"><a href="' . BASE_URL . '' . $pkgRow->slug . '"><img src="' . IMAGE_PATH . 'subpackage/image/' . $pkgRow->image2 . '" alt="' . $pkgRow->title . ' " class="img-responsive"></a><span class="wow zoomIn"><sup>' . $pkgRow->currency . ' </sup>' . $pkgRow->onep_price . '<small>Per night</small></span></figure>
                </div>
                <div class="col-md-4 col-md-offset-1">
                    <div class="room_desc_home">
                        <h3>' . $pkgRow->title . '  </h3>
                        <p>
                            ' . $pkgRow->detail . '
                        </p>
                        <ul>';
                $saveRec = unserialize($pkgRow->feature);
                $count = 1;

                $reshplist .= '</ul>
                        <a href="' . BASE_URL . '' . $pkgRow->slug . '" class="btn_1_outline">Read more</a>
                    </div><!-- End room_desc_home -->
                </div>
            </div><!-- End row -->
        </div><!-- End container -->
    </div>';
            }
            $cnt++;
//}

        }
    }
    /* $reshplist.= '</div>
                 </div>
             </div>';*/
}

$jVars['module:home-packagelist'] = $reshplist;
$jVars['module:home-package-type-list'] = $pakagehometype;


$roomlist = $dinelist = $roombread = '';
$modalpopup = '';
$room_package = '';
$dine_package = '';
if (defined('PACKAGE_PAGE') and isset($_REQUEST['slug'])) {

    $slug = !empty($_REQUEST['slug']) ? addslashes($_REQUEST['slug']) : '';

    $pkgRow = Package::find_by_slug($slug);
    if ($pkgRow->type == 1) {

        $imglink = BASE_URL . 'template/web/images/bg/room-banner.jpg';
        $pkgRowImg = $pkgRow->banner_image;
        if ($pkgRowImg != "a:0:{}") {
            $pkgRowList = unserialize($pkgRowImg);
            $file_path = SITE_ROOT . 'images/package/banner/' . $pkgRowList[0];
            if (file_exists($file_path) and !empty($pkgRowList[0])) {
                $imglink = IMAGE_PATH . 'package/banner/' . $pkgRowList[0];
            }
        }

        $roombread .= '

     <div class="banner-header full-height section-padding valign bg-img bg-fixed bg-position-bottom" data-overlay-dark="5" data-background="' . $imglink . '">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center caption">
                    <h1>' . $pkgRow->title . '</h1>
                </div>
            </div>
        </div>
        <!-- button scroll -->
        <a href="#" data-scroll-nav="1" class="mouse smoothscroll"> 
            <span class="mouse-icon">
                <span class="mouse-wheel"></span> 
            </span>
        </a>
    </div>

    ';

        $sql = "SELECT *  FROM tbl_package_sub WHERE status='1' AND type = '{$pkgRow->id}' ORDER BY sortorder DESC ";

        $page = (isset($_REQUEST["pageno"]) and !empty($_REQUEST["pageno"])) ? $_REQUEST["pageno"] : 1;
        $limit = 200;
        $total = $db->num_rows($db->query($sql));
        $startpoint = ($page * $limit) - $limit;
        $sql .= " LIMIT " . $startpoint . "," . $limit;
        $query = $db->query($sql);
        $pkgRec = Subpackage::find_by_sql($sql);
        // pr($pkgRec);

        if (!empty($pkgRec)) {


            foreach ($pkgRec as $key => $subpkgRow) {
                $imageList = '';
                if ($subpkgRow->image != "a:0:{}") {
                    $imageList = unserialize($subpkgRow->image);
                }


                $roomlist .= '

             <div class="col-lg-4 col-md-6">
                    <div class="item">
                        <figure> <img src="' . IMAGE_PATH . 'subpackage/' . $imageList[0] . '" alt="" class="img-fluid"> </figure>
                        <div class="desc">
                            <h3 class="title"><a href="' . BASE_URL . $subpkgRow->slug . '">' . $subpkgRow->title . '</a></h3>
                            <p>' . $subpkgRow->detail . '</p>
                            <div class="price">' . $subpkgRow->currency . $subpkgRow->onep_price . ' <span>per night</span></div>
                            <div class="rbtn"><a href="' . BASE_URL . 'result.php?hotel_code=' . $booking_code . '" target="_blank" class="butn-dark2"><span>Book Now</span></a></div>
                        </div>
                    </div>
                </div>

           

                
                ';

            }
            $room_package = '
                <!-- Rooms starts -->
                 <section class="rooms5 section-padding" data-scroll-index="1">
        <div class="container">
            <div class="row">
                       
                                ' . $roomlist . '
                                </div>
                                </div>
                            </section>
                <!-- Room Ends -->';
        }
    } else {
        $imglink = BASE_URL . 'template/web/images/default.jpg';
        $pkgRowImg = $pkgRow->banner_image;
        if ($pkgRowImg != "a:0:{}") {
            $pkgRowList = unserialize($pkgRowImg);
            $file_path = SITE_ROOT . 'images/package/banner/' . $pkgRowList[0];
            if (file_exists($file_path) and !empty($pkgRowList[0])) {
                $imglink = IMAGE_PATH . 'package/banner/' . $pkgRowList[0];
            } else {
                $imglink = BASE_URL . 'template/web/images/default.jpg';
            }
        }

        $roombread .= '
    <!--================ Breadcrumb ================-->
    <div class="mad-breadcrumb with-bg-img with-overlay" data-bg-image-src="' . $imglink . '">
        <div class="container wide">
            <h1 class="mad-page-title">' . $pkgRow->title . '</h1>
            <nav class="mad-breadcrumb-path">
                <span><a href="index.html" class="mad-link">Home</a></span> /
                <span>' . $pkgRow->title . '</span>
            </nav>
        </div>
    </div>
    <!--================ End of Breadcrumb ================-->

    ';

        $sql = "SELECT *  FROM tbl_package_sub WHERE status='1' AND type = '{$pkgRow->id}' ORDER BY sortorder DESC ";

        $page = (isset($_REQUEST["pageno"]) and !empty($_REQUEST["pageno"])) ? $_REQUEST["pageno"] : 1;
        $limit = 200;
        $total = $db->num_rows($db->query($sql));
        $startpoint = ($page * $limit) - $limit;
        $sql .= " LIMIT " . $startpoint . "," . $limit;
        $query = $db->query($sql);
        $pkgRec = Subpackage::find_by_sql($sql);

        // pr($pkgRec);

        if (!empty($pkgRec)) {

            $count = 1;


            $max_count = count($subpkgRec);

            foreach ($pkgRec as $key => $subpkgRow) {
                $gallRec = SubPackageImage::getImagelimit_by(3, $subpkgRow->id);
                $subpkg_caro = '';
                foreach ($gallRec as $row) {
                    $file_path = SITE_ROOT . 'images/package/galleryimages/' . $row->image;
                    if (file_exists($file_path) and !empty($row->image)):

                        // $active=($count==0)?'active':'';
                        $subpkg_caro .= '
                    <div class="mad-owl-item">
                                        <img src="' . IMAGE_PATH . 'package/galleryimages/' . $row->image . '" alt="' . $row->title . '" />
                                    </div>

                     
                            
                                ';


                    endif;


                }

                $button = '';
                $modal = '';
                $imageList = '';
                if ($subpkgRow->image != "a:0:{}") {
                    $imageList = unserialize($subpkgRow->image);
                }
                if ($pkgRow->id == 11) {
                    $button = '<a href="contact-us" class="btn">Book Now</a>';
                    if (!empty($subpkgRow->below_content)) {
                        $modal = '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#' . $subpkgRow->slug . '">
                details
              </button>';
                    } else {
                        $modal = '';
                    }
                } else {
                    $button = '<a href="#" class="btn">View Menu</a>';
                }

                if ($subpkgRow->type == 11) {

                    $modalpopup .= '
        <div class="modal fade" id="' . $subpkgRow->slug . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">' . $subpkgRow->title . ' details</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            ' . $subpkgRow->below_content . '
            </div>
          </div>
        </div>
      </div>';
                    if ($count % 2 == 1) {
                        $roomlist .= '
            <div class="mad-section mad-section--stretched mad-colorizer--scheme-color-4">
                    <div class="mad-entities style-3 type-4">
                        <!--================ Entity ================-->
                        <article class="mad-entity">
                            <div class="mad-entity-media">
                                <div class="owl-carousel mad-simple-slideshow mad-grid with-nav">
                                    ' . $subpkg_caro . '
                                </div>
                            </div>

                            <div class="mad-entity-content">
                                <h2 class="mad-entity-title">' . $subpkgRow->title . '</h2>
                                <p>' . strip_tags($subpkgRow->content) . '</p>
                                <div class="mad-rest-info">
                                    <div class="mad-rest-info-item">
                                        <span class="mad-rest-title">Hall Amenities</span>
                                        <span>' . $subpkgRow->cocktail . '</span>
                                    </div>
                                    <div class="mad-rest-info-item">
                                        <span class="mad-rest-title">Size</span>
                                        <span>' . $subpkgRow->seats . '</span>
                                    </div>
                                </div>
                                ' . $button . ' ' . $modal . '
                                </div>


                        </article>
                        <!--================ End of Entity ================-->
                    </div>
                </div>

                
                ';

                    } else {
                        $roomlist .= '<div class="mad-section">
                <div class="mad-entities mad-entities-reverse type-4">
                    <!--================ Entity ================-->
                    <article class="mad-entity">
                        <div class="mad-entity-media">
                            <div class="owl-carousel mad-simple-slideshow mad-grid with-nav">
                            ' . $subpkg_caro . '
                            </div>
                        </div>
                        <div class="mad-entity-content">
                            <h2 class="mad-entity-title">' . $subpkgRow->title . '</h2>
                            <p>' . strip_tags($subpkgRow->content) . '</p>
                            <div class="mad-rest-info">
                            <div class="mad-rest-info-item">
                            <span class="mad-rest-title">Hall Amenities</span>
                            <span>' . $subpkgRow->cocktail . '</span>
                        </div>
                        <div class="mad-rest-info-item">
                            <span class="mad-rest-title">Size</span>
                            <span>' . $subpkgRow->seats . '</span>
                        </div>
                            </div>
                            ' . $button . ' ' . $modal . '
                        </div>

                    </article>
                    <!--================ End of Entity ================-->
                </div>
            </div>';
                    }
                    $count++;


                }


                if ($subpkgRow->type == 12) {
                    if ($count % 2 == 1) {
                        $roomlist .= '
            <div class="mad-section mad-section--stretched mad-colorizer--scheme-color-4">
                    <div class="mad-entities style-3 type-4">
                        <!--================ Entity ================-->
                        <article class="mad-entity">
                            <div class="mad-entity-media">
                                <div class="owl-carousel mad-simple-slideshow mad-grid with-nav">
                                    ' . $subpkg_caro . '
                                </div>
                            </div>

                            <div class="mad-entity-content">
                                <h2 class="mad-entity-title">' . $subpkgRow->title . '</h2>
                                <p>' . strip_tags($subpkgRow->content) . '</p>
                                <div class="mad-rest-info">
                                    <div class="mad-rest-info-item">
                                        <span class="mad-rest-title">Opening hours</span>
                                        <span>' . $subpkgRow->theatre_style . ' <br />' . $subpkgRow->class_room_style . '</span>
                                    </div>
                                    <div class="mad-rest-info-item">
                                        <span class="mad-rest-title">Cuisine</span>
                                        <span>' . $subpkgRow->shape . '</span>
                                    </div>
                                    <div class="mad-rest-info-item">
                                        <span class="mad-rest-title">Dess Code</span>
                                        <span>' . $subpkgRow->round_table . '</span>
                                    </div>
                                </div>
                                ' . $button . '
                                </div>
                        </article>
                        <!--================ End of Entity ================-->
                    </div>
                </div>

                
                ';
                    } else {
                        $roomlist .= '<div class="mad-section">
                <div class="mad-entities mad-entities-reverse type-4">
                    <!--================ Entity ================-->
                    <article class="mad-entity">
                        <div class="mad-entity-media">
                            <div class="owl-carousel mad-simple-slideshow mad-grid with-nav">
                            ' . $subpkg_caro . '
                            </div>
                        </div>
                        <div class="mad-entity-content">
                            <h2 class="mad-entity-title">' . $subpkgRow->title . '</h2>
                            <p>' . strip_tags($subpkgRow->content) . '</p>
                            <div class="mad-rest-info">
                                <div class="mad-rest-info-item">
                                    <span class="mad-rest-title">Opening hours</span>
                                    <span>' . $subpkgRow->theatre_style . '<br />' . $subpkgRow->class_room_style . ' </span>
                                </div>
                                <div class="mad-rest-info-item">
                                    <span class="mad-rest-title">Cuisine</span>
                                    <span>' . $subpkgRow->shape . '</span>
                                </div>
                                <div class="mad-rest-info-item">
                                    <span class="mad-rest-title">Dess Code</span>
                                    <span>' . $subpkgRow->round_table . '</span>
                                </div>
                            </div>
                            ' . $button . '
                        </div>

                    </article>
                    <!--================ End of Entity ================-->
                </div>
            </div>';
                    }
                    $count++;

                }

            }
            $room_package = '
                <!-- Rooms starts -->
                <div class="mad-content no-pd">
            <div class="container">
                <div class="mad-section">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="mad-pre-title">M.I.C.E</div>
                            <h2 class="mad-page-title" style="font-size: 42px;line-height: 46px;">' . $pkgRow->sub_title . '</h2>
                        </div>
                        <div class="col-lg-7">
                            <p class="mad-text-medium">' . $pkgRow->content . '
                            </p>
                        </div>
                    </div>
                </div>
                                ' . $roomlist . '
                            </div>
                        </div>
                    
                
                <!-- Room Ends -->';
        }

    }
    if ($pkgRow->id >= 14) {

        $room_package = '
                <!-- Rooms starts -->
                <div class="mad-content no-pd">
            <div class="container">
                <div class="mad-section">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="mad-pre-title">' . $pkgRow->title . '</div>
                            <h2 class="mad-page-title" style="font-size: 42px;line-height: 46px;">' . $pkgRow->sub_title . '</h2>
                        </div>
                        
                    </div>
                    <div class="col-lg-7">
                            <p class="mad-text-medium">' . $pkgRow->content . '
                            </p>
                        </div>
                </div>
                            </div>
                        </div>
                    
                
                <!-- Room Ends -->';
    }
}


if (defined('HOME_PAGE')) {


    $sql = "SELECT *  FROM tbl_package_sub WHERE status='1' AND type = '1' ORDER BY sortorder DESC ";

    $page = (isset($_REQUEST["pageno"]) and !empty($_REQUEST["pageno"])) ? $_REQUEST["pageno"] : 1;
    $limit = 200;
    $total = $db->num_rows($db->query($sql));
    $startpoint = ($page * $limit) - $limit;
    $sql .= " LIMIT " . $startpoint . "," . $limit;
    $query = $db->query($sql);
    $pkgRec = Subpackage::find_by_sql($sql);


    // pr($pkgRec);
    if (!empty($pkgRec)) {

        foreach ($pkgRec as $key => $subpkgRow) {
            $pacRec = package::find_by_id($subpkgRow->type);
            $gallRec = SubPackageImage::getImagelist_by($subpkgRow->id);
            $imagepath = '';
            $imageList = '';
            $imageList = unserialize($subpkgRow->image);


            $file_path = SITE_ROOT . 'images/subpackage/' . $imageList[0];
            // pr($file_path);
            if (file_exists($file_path) and !empty($imageList)):
                $imagepath = IMAGE_PATH . 'subpackage/' . $imageList[0];


            endif;
// pr($imagepath);

            $roomlist .= '

            <div class="col-lg-4 col-md-6">
                    <div class="item">
                        <figure> <img src="' . $imagepath . '" alt="" class="img-fluid"> </figure>
                        <div class="desc">
                            <h3 class="title"><a href="' . BASE_URL . $subpkgRow->slug . '">' . $subpkgRow->title . '</a></h3>
                            <p>' . strip_tags($subpkgRow->detail) . '</p>
                            <div class="price">' . $subpkgRow->currency . $subpkgRow->onep_price . '<span>per night</span></div>
                            <div class="rbtn"><a href="' . BASE_URL . 'result.php?hotel_code=' . $booking_code . '" target="_blank" class="butn-dark2"><span>Book Now</span></a></div>
                        </div>
                    </div>
                </div>

                
                ';

        }
        $room_package = '
       <section class="rooms5 section-padding" data-scroll-index="1">
        <div class="container">
            <div class="row mb-30">
                <div class="col-md-2">
                    <div class="sub-title border-bot-light">Explore</div>
                </div>
                <div class="col-md-10">
                    <div class="section-title">' . $pacRec->title . '</div>
                    <p>' . $pacRec->content . '</p>
                </div>
            </div>

            <div class="row">
                                ' . $roomlist . '
                               </div>
        </div> 
    </section>';
    }


    $sqla = "SELECT *  FROM tbl_package_sub WHERE status='1' AND type = '12' ORDER BY sortorder DESC ";

    $page = (isset($_REQUEST["pageno"]) and !empty($_REQUEST["pageno"])) ? $_REQUEST["pageno"] : 1;
    $limit = 200;
    $total = $db->num_rows($db->query($sqla));
    $startpoint = ($page * $limit) - $limit;
    $sqla .= " LIMIT " . $startpoint . "," . $limit;
    $query = $db->query($sqla);
    $dineRec = Subpackage::find_by_sql($sqla);


    // pr($pkgRec);
    if (!empty($dineRec)) {

        foreach ($dineRec as $key => $dineRow) {
            $dRec = package::find_by_id($dineRow->type);
            $gallRecs = SubPackageImage::getImagelimit_by(3, $dineRow->id);
            $imageList = '';
            $imagepath = '';
            foreach ($gallRecs as $gallRec) {
                // pr($gallRec);
                if (!empty($gallRec)) {

                    $imagepath .= '
    
    <div class="col-md-4"> 
                            <img src="' . IMAGE_PATH . 'package/galleryimages/' . $gallRec->image . '" class="img-fluid image" alt="">
                            <div class="overlay">
                                <div class="text">' . $gallRec->title . '</div>
                            </div>
                        </div>';
                }


            }


// pr($imagepath);

            $dinelist .= '

                            ' . $dineRow->content . '
                        
                <div class="row dinetodine">
                       ' . $imagepath . '
                    </div>

                
                ';

        }
        $dine_package = '
        <section class="restaurant-page section-padding bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="sub-title border-bot-light">Experience</div>
                </div>
                <div class="col-md-10">
                    <div class="section-title">' . $dRec->title . ' <span>O\'Ganga</span></div>
                   

                                ' . $dinelist . '
                               </div>
            </div>
        </div>
    </section>';
    }
}


$jVars['module:list-modalpop-up'] = $modalpopup;
$jVars['module:list-package-room'] = $room_package;
$jVars['module:list-package-dine'] = $dine_package;
$jVars['module:list-package-room-bred'] = $roombread;


/**
 *      Package Record
 */
$resubpkgDetail = $resubpkgbann = $bcont = '';

if (defined('SUBPACKAGE_PAGE') and isset($_REQUEST['slug'])) {

    $id = !empty($_REQUEST['id']) ? addslashes($_REQUEST['id']) : '';
    $slug = !empty($_REQUEST['slug']) ? addslashes($_REQUEST['slug']) : '';
    $subpkgRec = Subpackage::find_by_slug($slug);
    $pkgRec = Package::find_by_id($subpkgRec->type);
    //echo "<pre>";print_r($slug);die();
    $gallRec = SubPackageImage::getImagelist_by($subpkgRec->id);
    $otherPacs = Subpackage::get_relatedpkg($subpkgRec->type, $subpkgRec->id, 12);


    $pgkRow = Package::find_by_id(3);
    if (!empty($subpkgRec)) {
        //$resubpkgbann.='';
        foreach ($gallRec as $row) {
            $file_path = SITE_ROOT . 'images/package/galleryimages/' . $row->image;
            if (file_exists($file_path) and !empty($row->image)):

                $resubpkgbann .= ' <div><img src="' . IMAGE_PATH . 'package/galleryimages/' . $row->image . '" alt="' . $row->title . '"><div class="caption cpation_room">
     <h3>
     <ul>
     <li><a href="' . BASE_URL . 'home">Home</a></li>
     <li><a href="' . BASE_URL . $pkgRec->slug . '">' . $pkgRec->title . '</a></li>
     <li>' . $subpkgRec->title . '</li>
     </ul>
     </h3>
     </div></div>';
            endif;

        }


        $pkgType = Package::field_by_id($subpkgRec->type, 'type');
        /* if(!empty($pkgType)) {
                         */
        $subpkgImg = $subpkgRec->image;

        if ($pkgType == 1) {
            $resubpkgDetail .= '<h1 class="main_title_in">' . $subpkgRec->short_title . '</h1>
          <div class="container add_bottom_60">
          
          <div class="row">
          <div class="col-md-8" id="room_detail_desc">';

            $resubpkgDetail .= ' <div id="single_room_feat">
          <ul>';
            $saveRec = unserialize($subpkgRec->feature);
            $count = 1;


            $resubpkgDetail .= '
       
       </ul>
       </div>  <div class="row">
       <div class="col-md-3">
       <h3>Description</h3>
       </div>
       <div class="col-md-9">
       
       ' . $subpkgRec->content . '
       
       </div><!-- End col-md-9  -->
       </div><!-- End row  -->

       <div class="row">
       <div class="col-md-3">
       <h3>Occupancy | Tariff</h3>
       </div>
       <div class="col-md-9">
       <table class="table table-striped">
       <tbody>
       <tr>
       <td>Single Occupancy</td>
       <td>' . $subpkgRec->currency . ' ' . $subpkgRec->onep_price . '</td>
       </tr>
       <tr>
       <td>Double Occupancy</td>
       <td>' . $subpkgRec->currency . ' ' . $subpkgRec->twop_price . '</td>
       </tr>
       <tr>
       <td>Extra Bed Charge</td>
       <td> ' . $subpkgRec->currency . ' ' . $subpkgRec->threep_price . '</td>
       </tr>
       </tbody>
       </table>
       </div>
       </div> </div>
       <div class="col-md-4" id="sidebar">
       <div class="theiaStickySidebar">
       <div class="box_style_1">
       <div id="message-booking"></div>
      <form action="" target="_blank" autocomplete="off" id="hotel_booking" data-url="' . BASE_URL . 'result.php">
       
         <input type="hidden" name="hotel_code" value="2AXhJ6">
       <div class="row">
       <div class="col-md-12 col-sm-12">
       <div class="form-group">
       <label>Arrival date</label>
       <input class="startDate1 form-control datepick" type="text" data-field="date" data-startend="start" data-startendelem=".endDate1" readonly placeholder="Arrival" id="checkin" name="hotel_check_in">
       <span class="input-icon"><i class="icon-calendar-7"></i></span>
       </div>
       </div>
       <div class="col-md-12 col-sm-12">
       <div class="form-group">
       <label>Departure date</label>
       <input class="endDate1 form-control datepick" type="text" data-field="date" data-startend="end" data-startendelem=".startDate1" readonly placeholder="Departure" id="checkout" name="hotel_check_out">
       <span class="input-icon"><i class="icon-calendar-7"></i></span>
       </div>
       </div>
       </div><!-- End row -->

       <div class="row">
       <div class="col-md-12 col-sm-12">
       <div class="form-group">
       <input type="submit" value="Book now" class="btn_full" id="submit-booking">
       </div>
       </div>
       </div>
       </form>
       ' . $jVars['module:room-location'] . '
       </div><!-- End box_style -->
       </div><!-- End theiaStickySidebar -->
       </div><!-- End col -->
       
       </div><!-- End row -->
       
       </div><!-- End container -->';
        }


    }
}
$jVars['module:form-controll'] = $bcont;
$jVars['module:sub-package-banner'] = $resubpkgbann;
// $jVars['module:sub-package-detail'] = $resubpkgDetail;


/*
* Sub package 
*/
$resubpkgDetail = '';
$subimg = '';
$imageList = '';


if (defined('SUBPACKAGE_PAGE') and isset($_REQUEST['slug'])) {
    $slug = !empty($_REQUEST['slug']) ? addslashes($_REQUEST['slug']) : '';
    $subpkgRec = Subpackage::find_by_slug($slug);
    $gallRec = SubPackageImage::getImagelist_by($subpkgRec->id);
    $booking_code = Config::getField('hotel_code', true);
    if (!empty($subpkgRec)) {
        if ($subpkgRec->type == 1) {
            $relPacs = Subpackage::get_relatedpkg(1, $subpkgRec->id, 12);
            $imglink = '';
            if (!empty($subpkgRec->image2)) {
                $file_path = SITE_ROOT . 'images/subpackage/image/' . $subpkgRec->image2;
                if (file_exists($file_path)) {
                    $imglink = IMAGE_PATH . 'subpackage/image/' . $subpkgRec->image2;
                } else {
                    $imglink = IMAGE_PATH . 'static/default-art-pac-sub.jpg';
                }
            } else {
                $imglink = IMAGE_PATH . 'static/default-art-pac-sub.jpg';
            }

            $pkgRec = Package::find_by_id($subpkgRec->type);
            $subpkg_carousel = '';
            foreach ($gallRec as $row) {
                $file_path = SITE_ROOT . 'images/package/galleryimages/' . $row->image;
                if (file_exists($file_path) and !empty($row->image)):

                    $subpkg_carousel .= '
                    <div class="text-center item bg-img" data-overlay-dark="5" data-background="' . IMAGE_PATH . 'package/galleryimages/' . $row->image . '"></div>
                 
                              
                                ';


                endif;


            }

            $resubpkgDetail .= '
           <header class="header slider">
        <div class="owl-carousel owl-theme">
            ' . $subpkg_carousel . '
          </div>
        <!-- button scroll -->
        <a href="#" data-scroll-nav="1" class="mouse smoothscroll"> <span class="mouse-icon">
                <span class="mouse-wheel"></span> </span>
        </a>
    </header>

            
            ';

            // $content = explode('<hr id="system_readmore" style="border-style: dashed; border-color: orange;" />', trim($subpkgRec->content));
            // pr($subpkgRec);


            $resubpkgDetail .= '
          <section class="room-details1 section-padding" data-scroll-index="1">
        <div class="container">
            <div class="row">
             <div class="col-md-12"> 
                    <div class="section-title">' . $subpkgRec->title . '</div>
                </div>
                <div class="col-md-8">
                ' . $subpkgRec->content . '
                </div>
                ';

            if (!empty($subpkgRec->feature)) {
                $amenttitle = '';
                $ftRec = unserialize($subpkgRec->feature);
                if (!empty($ftRec)) {


                    $resubpkgDetail .= '        
                                        <div class="col-md-3 offset-md-1">
                                        ';
                    foreach ($ftRec as $k => $v) {
                        $resubpkgDetail .= (!empty($v[0][0])) ? '<h6>' . $v[0][0] . '</h6>' : '<h6>Amenities</h6>';
                        if (!empty($v[1])) {
                            $sfetname = '';
                            $i = 0;
                            $resubpkgDetail .= '';
                            $feature_list = '';
                            foreach ($v[1] as $kk => $vv) {
                                $sfetname = Features::find_by_id($vv);
                                if (!empty($sfetname->image)) {
                                    $feature_list .= '
                                                         <li>
                            <div class="page-list-icon"> <img src="' . BASE_URL . 'images/features/' . $sfetname->image . '"> </div>
                            <div class="page-list-text">
                                <p>' . $sfetname->title . '</p>
                            </div>
                        </li>';
                                } else {
                                    $feature_list .= '
                        <li>
<div class="page-list-icon"> <i class="' . $sfetname->icon . '"></i> </div>
<div class="page-list-text">
<p>' . $sfetname->title . '</p>
</div>
</li>';
                                }
                                $i++;
                                if (($i % 1000 == 0) || (end($v[1]) == $vv)) {
                                    $resubpkgDetail .= '
                                                        <ul class="list-unstyled page-list mb-30">
                                                                ' . $feature_list . '
                                                            </ul>
                                                        
                                                            ';
                                    $feature_list = '';
                                }
                            }
                        }
                    }

                }
                $resubpkgDetail .= '
                                                                
                                                               </div>
            </div>
        </div>
    </section>';
            }


            $otherroom = '';
            $rooms = Subpackage::get_relatedsub_by($subpkgRec->type, $subpkgRec->id);


            if (!empty($rooms)) {


                foreach ($rooms as $room) {
                    if (!empty($room->image)) {
                        $img123 = unserialize($room->image);

                        if (file_exists($file_path) && !empty($img123[0])) {
                            $imglink = IMAGE_PATH . 'subpackage/' . $img123[0];
                            $file_path = SITE_ROOT . 'images/subpackage/' . $img123[0];
                        } else {
                            $imglink = IMAGE_PATH . 'static/static.jpg';
                        }
                    } else {
                        $imglink = IMAGE_PATH . 'static/static.jpg';
                    }


                    $otherroom .= '
                    <div class="mad-col">
                        <!--================ Entity ================-->
                        <article class="mad-entity">
                            <div class="mad-entity-media">
                                <a href="' . BASE_URL . $room->slug . '">
                                    <img src="' . $imglink . '" alt=""/>
                                </a>
                            </div>
                            <div class="mad-entity-content">
                                <h4 class="mad-entity-title">' . $room->title . '</h4>
                                <div class="mad-pricing-value">
                                    <span>From</span>
                                    <span class="mad-pricing-value-num">' . $room->currency . $room->onep_price . '/</span>
                                    <span>night</span>
                                </div>
                                <div class="mad-entity-footer">
                                    <div class="btn-set justify-content-center">
                                        <a href="#" class="btn btn-big">Book Now</a>
                                        <a href="' . BASE_URL . $room->slug . '" class="btn btn-big style-2">Details</a>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <!--================ End of Entity ================-->
                    </div>
            
                    
			';

                }
                //$otherroom.='';
                $resubpkgDetail .= '
 
                
        ';
            }


        } /********For service inner page ***************/
        else {
            $relPacs = unserialize($subpkgRec->image);
            // pr($relPacs);
            $imgslide = '';
            if (!empty($relPacs)) {
                foreach ($relPacs as $a => $relpac) {
                    if ($a <= 1) {
                        $imgslide .= '<div class="col-md-6"> <img src="' . IMAGE_PATH . 'subpackage/' . $relpac . '" class="img-fluid" alt=""> </div>';
                    } else {
                        $imgslide .= '';
                    }
                }
            } else {
                $imgslide = IMAGE_PATH . 'static/default.jpg';
            }

            $relPacs = Subpackage::get_relatedpkg($subpkgRec->type, $subpkgRec->id, 12);
            $imglink = '';
            if (!empty($subpkgRec->image2)) {
                $file_path = SITE_ROOT . 'images/subpackage/image/' . $subpkgRec->image2;
                if (file_exists($file_path)) {
                    $imglink = IMAGE_PATH . 'subpackage/image/' . $subpkgRec->image2;
                } else {
                    $imglink = IMAGE_PATH . 'static/default-art-pac-sub.jpg';
                }
            } else {
                $imglink = IMAGE_PATH . 'static/default-art-pac-sub.jpg';
            }

            $pkgRec = Package::find_by_id($subpkgRec->type);
            $subpkg_carousel = '';
            foreach ($gallRec as $row) {
                $file_path = SITE_ROOT . 'images/package/galleryimages/' . $row->image;
                if (file_exists($file_path) and !empty($row->image)):

                    $subpkg_carousel .= '
                        <div class="text-center item bg-img" data-overlay-dark="5" data-background="' . IMAGE_PATH . 'package/galleryimages/' . $row->image . '"></div>
                     
                                  
                                    ';


                endif;


            }


            $resubpkgDetail .= '

                    <header class="header slider">
        <div class="owl-carousel owl-theme">
            ' . $subpkg_carousel . '
          </div>
        <!-- button scroll -->
        <a href="#" data-scroll-nav="1" class="mouse smoothscroll"> <span class="mouse-icon">
                <span class="mouse-wheel"></span> </span>
        </a>
    </header>
                                                
                                        ';


            $resubpkgDetail .= '
                           <section class="restaurant-page section-padding" data-scroll-index="1">
        <div class="container">
            <div class="row">

            <div class="col-md-2">
                    <div class="sub-title border-bot-light">' . $subpkgRec->short_title . '</div>
                </div>
                <div class="col-md-10">
                    <div class="section-title">' . $subpkgRec->title . '</div>
                                ' . $subpkgRec->content . '
                 ';


            $resubpkgDetail .= '<div class="row">
                        ' . $imgslide . '
                             </div>
                </div>
            </div>
        </div>
    </section>';


        }


    }
}


$jVars['module:sub-package-detail'] = $resubpkgDetail;


/**********        For What;s nearby from package **************/
$resubpkgDetail = '';
$relPacs = Subpackage::get_relatedpkg(10, 0, 12);

foreach ($relPacs as $relPac) {

    $imglink = '';
    if (!empty($relPac->image)) {
        $img123 = unserialize($relPac->image);
        $file_path = SITE_ROOT . 'images/subpackage/' . $img123[0];
        if (file_exists($file_path)) {
            $imglink = IMAGE_PATH . 'subpackage/' . $img123[0];
        } else {
            $imglink = IMAGE_PATH . 'static/default-art-pac-sub.jpg';
        }
    } else {
        $imglink = IMAGE_PATH . 'static/default-art-pac-sub.jpg';
    }
    $resubpkgDetail .= '

                                            <div class="col-lg-3 col-md-6">
                                                <div class="top-hotels-ii">
                                                    <img src="' . $imglink . '" alt=" ' . $relPac->title . '"/>
                                                    ' . $relPac->content . '
                                                    <div class="pp-details yellow">
                                                        <span class="pull-left">More Info</span>
                                                        <span class="pp-tour-ar">
                                                                <a href="javascript:void(0)"><i class="fa fa-angle-right pad-0"></i></a>
                                                            </span>
                                                    </div>
                                                </div>
                                            </div>
                                        ';


}

$whats_nearby = '
            <section class="top-hotel">
                <div class="container-xxl px-5">
                    <div class="top-title">
                        <div class="row display-flex">
                            <div class="col-lg-8 mx-auto text-center">
                                <h2>What\'s <span>Nearby</span></h2>
                                <p class="mar-0">
                                    We are located at the heart of Lalitpur. Major shopping outlets, Patan Durbar Square, Hospitals, Banks, UN office, Government offices, etc are
                                    within walking distance.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!--Gallery Section-->
                    <div class="row activities-slider">
                        ' . $resubpkgDetail . '
                    </div>
                </div>
            </section>';

// pr($whats_nearby);
$jVars['module:whats-nearby'] = $whats_nearby;

                    
                        
                        



