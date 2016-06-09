<?php
/**
 * Created by PhpStorm.
 * User: Ramachandra
 * Date: 6/6/2016
 * Time: 9:28 PM
 */

session_start();

$typeid = $_GET['typeid'] ;
$userid = $_GET['userid'] ;
$username = $_GET['name'] ;

$_SESSION['LoginUserTypeID'] = $typeid;
$_SESSION['LoginUserID'] = $userid;
$_SESSION['LoginUserName']=$username;

echo json_encode('success');

?>