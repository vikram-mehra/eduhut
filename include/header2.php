<?php
error_reporting(0);
require("include/config.php");
require("include/connection.php");

$userdetails=$_SESSION['userid'];
$username=$userdetails['name'];
$userid=$userdetails['id'];
$usertype=$userdetails['userType'];
?>