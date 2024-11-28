<?php
$bl =  '';

if (defined('BLOG_PAGE')) {
    $record = Blog::get_allblog();
    $linkTarget='';
    $pagelink='';
    if (!empty($record)) {
        
        
            $bl .= '

      



            <!--================ Breadcrumb ================-->
        <div class="mad-breadcrumb with-bg-img with-overlay" data-bg-image-src="'. BASE_URL .'template/web/images/123456789.jpg">
            <div class="container wide">
                <h1 class="mad-page-title">Blogs</h1>
                <nav class="mad-breadcrumb-path">
                    <span><a href="' . BASE_URL . 'home" class="mad-link">Home</a></span> /
                    <span>News & Articles</span>
                </nav>
            </div>
            <h2>Blog list</h2>
        </div>

        
                ';
        
            foreach ($record as $homebl) {
            
           if(!empty($homebl->linksrc)){
            // $pagelink = ($homebl->linktype == 1) ? ' target="_blank" ' : '';
            $linkTarget = ($homebl->linktype == 1) ? ' target="_blank" ' : '';
                $linksrc = ($homebl->linktype == 1) ? $homebl->linksrc : BASE_URL.$homebl->linksrc;
           }
           else{
                $linksrc= BASE_URL. 'blog/'. $homebl->slug;
           }
           $bl .='
           <div class="item">
                    <div class="col-xl-12 col-lg-12 wow fadeInUp" data-wow-delay="100ms">
                        <div class="news-one__single">
                            <div class="news-one__img">
                                <img src="' . IMAGE_PATH . 'blog/' . $homebl->image . '" alt="' . $homebl->title . '">
                            </div>
                            <div class="news-one__content-box">
                                <div class="news-one__date">
                                    <p>' . date("d M Y", strtotime($homebl->blog_date)) . '</p>
                                </div>
                                <div class="news-one__content">
                                    <p class="news-one__author">by www.merolagani.com</p>
                                    <h3 class="news-one__title"><a href="'.$linksrc.'" '.$linkTarget.'>' . $homebl->title . '</a></h3>
                                </div>
                                <div class="news-one__bottom">
                                    <a href="'.$linksrc.'" target="_blank" class="news-one__more"> <i
                                            class="fa fa-arrow-right"></i> Read More</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                  
           ';
        }
        $bl.='</div>
        </section>';
    } else {
        redirect_to(BASE_URL);
    }
}
$jVars['module:bloglist'] = $bl;
$linkTarget='';
$homebloglist = '';
$homeblogs ='';
if (defined('HOME_PAGE')) {
    $homeblog = Blog:: get_latestblog_by(3);
    // $homeblogs = Blog:: get_latestblog_by(3);
    if (!empty($homeblog)) {
        
        foreach ($homeblog as $homebl) {
            
           if(!empty($homebl->linksrc)){
            // $pagelink = ($homebl->linktype == 1) ? ' target="_blank" ' : '';
            $linkTarget = ($homebl->linktype == 1) ? ' target="_blank" ' : '';
                $linksrc = ($homebl->linktype == 1) ? $homebl->linksrc : BASE_URL.$homebl->linksrc;
           }
           else{
                $linksrc=  BASE_URL. 'blog/' .$homebl->slug;
           }
           $homebloglist .='
           <div class="mad-grid-item">
                            <!--================ Entity ================-->
                            <article class="mad-entity">
                                <div class="mad-entity-media mad-owl-center-img">
                                    <a href="'.$linksrc.'" '.$linkTarget.'>
                                        <img src="' . IMAGE_PATH . 'blog/' . $homebl->image . '" alt="' . $homebl->title . '" />
                                    </a>
                                </div>
                                <div class="mad-entity-content mad-owl-center-element">
                                    <div class="mad-entity-inner">
                                        <h4 class="mad-entity-title">' . $homebl->title . '</h4>
                                        <p>
                                        ' . $homebl->brief . '   
                                        </p>
                                        <div class="mad-entity-footer">
                                            <a href="'.$linksrc.'" '.$linkTarget.' class="btn btn-big">View More</a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <!--================ End of Entity ================-->
                        </div>
           
                  
           ';
        }
        $homeblogs='<div class="mad-title-wrap align-center">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="mad-pre-title">Make memories happen</div>
                <h2 class="mad-page-title">Club Himalaya Experience</h2>
            </div>
        </div>
    </div>
    <div class="mad-section no-pt mad-section-pb-mobile mad-section--stretched-content-no-px mad-colorizer--scheme-color-2">
    <div class="mad-entities mad-owl-center mad-pricing type-3 with-img-border mad-grid owl-carousel mad-owl-moving mad-grid--cols-2 nav-size-2 no-dots">
        <!-- owl item -->
                
                '.$homebloglist.'
                <!-- / owl item -->
                </div>
            </div>
        ';
    }
}

$jVars['module:homebloglist'] = $homeblogs;

$blog_detail = $recent_posts = '';
if (defined("BLOG_PAGE") ) {
    $slug = !empty($_REQUEST['slug']) ? $_REQUEST['slug'] : '';
    $Blogs = Blog::find_by_slug($slug);
    //pr($Blogs);
   

    if (!empty($slug)) {
        $blog_detail .= '
          <!-- Header Banner -->
    <div class="banner-header section-padding valign bg-img bg-fixed bg-position-bottom" data-overlay-dark="5" data-background="' . IMAGE_PATH . 'blog/banner/' . $Blogs->other_upload . '">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-left caption">
                    <h5><a href="'.BASE_URL.'blog">Blog</a></h5>
                    <h2>6' . $Blogs->title . '</h2>
                    <div class="post">
                        <div class="author"> <span>' . $Blogs->author . '</span> </div>
                        <div class="date-comment"> <i class="ti-calendar"></i>' . date('d M Y', strtotime($Blogs->blog_date)) . '</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- button scroll -->
        <a href="#" data-scroll-nav="1" class="mouse smoothscroll"> <span class="mouse-icon">
                <span class="mouse-wheel"></span> </span>
        </a>
    </div>

        
       
        
               ';
        
        $blog_detail .= '
            <!-- Post -->
    <section class="section-padding" data-scroll-index="1">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12"> 
                    <img src="' . IMAGE_PATH . 'blog/banner/' . $Blogs->other_upload . '" class="mb-30" alt="">
                    <h2>' . $Blogs->title . '</h2>
                    <p>' . $Blogs->content . '</p>
                </div>
                    

   ';
                                

        $recents = Blog::get_latestblog_by(3);
        if (!empty($recents)) {
            $blog_detail .='<div class="col-lg-4 col-md-12">
                    <div class="blog-sidebar row">
                        <div class="col-md-12">
                            <div class="widget">
                                <div class="widget-title">
                                    <h6>Related Posts</h6>
                                </div>
                                <ul class="recent">';
            foreach ($recents as $recent) {
                if ($recent->title != $Blogs->title) {
                    $blog_detail .= '

                                      <li>
                                        <div class="thum"> <img src="' . IMAGE_PATH . 'blog/' . $recent->image . '" alt=""> </div> <a href="' . BASE_URL . 'blog/' . $recent->slug . '">' . $recent->title . '</a>
                                    </li>
                                
                    
                 ';
                }
                
            }
            $blog_detail .= '
            
           </ul>
                            </div>
                        </div>
                    </div>
                </div>';       
        }

        $blog_detail .= '  </div>
        </div>
    </section>';
    } else {
        $blog_detail .= '
              <!-- Header Banner -->
    <div class="banner-header full-height section-padding valign bg-img bg-fixed bg-position-bottom" data-overlay-dark="5" data-background="template/web/img/banner.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center caption">
                    <h5>Hotel Blog</h5>
                    <h1>News O\'Ganga</h1>
                </div>
            </div>
        </div>
        <!-- button scroll -->
        <a href="#" data-scroll-nav="1" class="mouse smoothscroll"> <span class="mouse-icon">
                <span class="mouse-wheel"></span> </span>
        </a>
    </div>
       
        
       <section class="blog-home section-padding" data-scroll-index="1">
        <div class="container">
            <div class="row">      
                ';
        $Blogs = Blog::get_allblog();
        //pr($Blogs);
         foreach ($Blogs as $homebl) {
            
           if(!empty($homebl->linksrc)){
            // $pagelink = ($homebl->linktype == 1) ? ' target="_blank" ' : '';
            $linkTarget = ($homebl->linktype == 1) ? ' target="_blank" ' : '';
                $linksrc = ($homebl->linktype == 1) ? $homebl->linksrc : BASE_URL.$homebl->linksrc;
           }
           else{
                $linksrc= BASE_URL. 'blog/'. $homebl->slug;
           }
           $blog_detail .='
            <div class="col-lg-4 col-md-6">
                    <div class="item bg-img" data-background="' . IMAGE_PATH . 'blog/' . $homebl->image . '">
                        <div class="content">
                            <div class="info">
                                <a href="'.$linksrc.'" '.$linkTarget.'> <span><i class="ti-time" aria-hidden="true"></i>' . date("d M Y", strtotime($homebl->blog_date)) . '</span></a>
                            </div>
                            <a href="'.$linksrc.'" '.$linkTarget.'>
                                <h5>' . $homebl->title . '</h5>
                            </a>
                            <p>' . $homebl->brief . '</p>
                            <div class="arrow"> <a href="'.$linksrc.'" '.$linkTarget.'><span class="ti-arrow-right"></span></a> </div>
                        </div>
                    </div>
                </div>

        

           ';
    }
    $blog_detail .='
      </div>
        </div>
    </section>

            ';
    
    }
}


$jVars['module:blog-detail'] = $blog_detail;
$jVars['module:blog-recent-posts'] = $recent_posts;


?>