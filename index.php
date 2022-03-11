<?php

error_reporting(E_ALL );
ini_set("display_errors","1");
ini_set("log_errors","1");
ini_set("html_errors","1");





/* ------------------------------------------------------------------------------------------------------------
detect domain and configuration method

autodiscover.example.com/autodiscover/autodiscover.xml
autoconfig.example.com/mail/config-v1.1.xml
------------------------------------------------------------------------------------------------------------ */

$hostaddress = $_SERVER['HTTP_HOST'];
$hostaddress = explode('.', $hostaddress);
$subdomain = $hostaddress[0];
$domain = implode('.', array_slice($hostaddress, 1));

/* ------------------------------------------------------------------------------------------------------------
create configuration files
------------------------------------------------------------------------------------------------------------ */

require_once 'config.php';

if($subdomain == 'autodiscover') {
require_once 'autodiscover.php';
}else {
require_once 'autoconfig.php';
}






?>