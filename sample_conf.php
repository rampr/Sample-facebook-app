<?php

define('APPID','Your APP ID');
define('APPSECRET','APP SECRET');
define('APPURL', 'Your APP URL'); //should be something like http://apps.facebook.com/my_app_name

$fb_sdk_path = __DIR__."/php-sdk/src";
set_include_path(get_include_path() . PATH_SEPARATOR . $fb_sdk_path);
require_once("facebook.php");



$facebook = new Facebook(array(
    'appId'  => APPID,
    'secret' => APPSECRET,
));

?>
