<?php
require_once("conf.php");
require_once("Utils.php");
require_once("header.html");

$user = getUser($facebook,APPURL);

echo $user;
$email = runFql($facebook,"SELECT email from user where uid=$user");
echo $email[0]['email'];

$friends = $facebook->api('/me/friends');
?>
