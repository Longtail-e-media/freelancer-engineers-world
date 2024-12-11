<?php

define('HOMEPAGE', 0); // Track homepage.
define('FORGET_PASSWORD_PAGE', 1);// Track Login page.
define('JCMSTYPE', 0); // Track Current site language.

require_once("includes/initialize.php");

$currentTemplate	= Config::getCurrentTemplate('template');
$jVars 				= array();
$template 			= "template/{$currentTemplate}/forgetpassword.html";

require_once('views/modules.php');

template($template, $jVars, $currentTemplate);
