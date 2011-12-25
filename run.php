<?php
require_once("conf.php");
require_once("Utils.php");
require_once("header.html");

$user = getUser($facebook,APPURL);
$friends = getFriends($facebook,$user);
//print_r($friends);
require_once("run.html");
?>
