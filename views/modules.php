<?php
// pr($_SESSION);
// SITE REGULARS
$jVars['site:header'] 		= Config::getField('headers',true);
$jVars['site:footer'] 		= Config::getField('footer',true);
$siteRegulars 				= Config::find_by_id(1);
$jVars['site:copyright']	= str_replace('{year}',date('Y'),$siteRegulars->copyright);

$jVars['site:contact-header'] = '<span class="address"><a href="tel:'.$siteRegulars->contact_info.'" data-toggle="tooltip" data-placement="bottom" title="Call"><i class="fa fa-phone"></i></a></span>
<span class="address"><a href="mailto:'.$siteRegulars->mail_address.'" data-toggle="tooltip" data-placement="bottom" title="Mail"><i class="fa fa-envelope-o"></i></a></span>';

$jVars['site:phone-news-side'] = '<a href="tel:'.$siteRegulars->contact_info.'" class="phone">'.$siteRegulars->contact_info.'</a>';

$jVars['site:fevicon']		=  '<link rel="shortcut icon" href="'.IMAGE_PATH.'preference/'.$siteRegulars->icon_upload.'"> 
							    <link rel="apple-touch-icon" href="'.IMAGE_PATH.'preference/'.$siteRegulars->icon_upload.'"> 
							    <link rel="apple-touch-icon" sizes="72x72" href="'.IMAGE_PATH.'preference/'.$siteRegulars->icon_upload.'"> 
							    <link rel="apple-touch-icon" sizes="114x114" href="'.IMAGE_PATH.'preference/'.$siteRegulars->icon_upload.'">';
$jVars['site:logo']			= '<a href="'.BASE_URL.'home" id="logo"><img src="'.IMAGE_PATH.'preference/'.$siteRegulars->logo_upload.'" alt="logo" data-retina="true"/></a>';	
			    
$jVars['site:seotitle']     = MetaTagsFor_SEO();
$jVars['site:googleanalatic'] = $siteRegulars->google_anlytics;

$jVars['site:pixel-code']	= $siteRegulars->pixel_code;
$jVars['site:SITE_FOLDER']  = SITE_FOLDER;

$metatitle = str_replace('3rd','',$siteRegulars->meta_title);
$jVars['site:titlescript']	= ' <script>
        document.addEventListener(\'DOMContentLoaded\', function() {
            document.title = \'3\u02B3\u1D48'.$metatitle.'\'; 
        });
    </script>';

function changestatustimeout($tablename = "")
{
    $currentdate = date('Y-m-d');
    global $db;

    $db->begin();
    $db->query("update {$tablename} set project_status=4 where deadline_date<'.$currentdate.' and project_status<=2");
    $db->commit();
}

require_once("views/module.booking.php");

// SITE MODULES
$modulesList = Module::getAllmode();
foreach($modulesList as $module):	
	$fileName = "module.".$module->mode.".php";
	if(file_exists("views/".$fileName)){
	  	require_once("views/".$fileName);
	}
endforeach;

// view modules

require_once("views/module.dashboard.php");
require_once("views/module.faq.php");
require_once("views/module.contact.php");

require_once("views/module.job-1.php");
require_once("views/module.job-2.php");

require_once("views/module.reservation.php");
require_once("views/module.header.php");
require_once("views/module.footer.php");


?>