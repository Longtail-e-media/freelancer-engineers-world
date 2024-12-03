<?php

define('LOGOUT_PAGE', 1); // Track homepage.
define('JCMSTYPE', 0); // Track Current site language.

require_once("includes/initialize.php");

$userId = $session->get("user_id");

$session->clear('email_logged');
$session->clear('user_id');
$session->clear('user_type');

redirect_to(BASE_URL . 'login');