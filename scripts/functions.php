<?php
/*
* ==================================================
* Session Controller and File Restriction Web Access
* ==================================================
*/
if(!defined('RESTRICTED')){
    if(session_status() != PHP_SESSION_NONE){
        header("location: panel");
        exit('No direct script access allowed! Path: '.dirname(__FILE__));
    }
}

/*
* ==================================================
* Headers
* ==================================================
*/
require_once($path.'/scripts/includes/functionsHeaders.php');

/*
* ==================================================
* Sessions
* ==================================================
*/
if($_SESSION['email'] != ""){
    $emailSession = $_SESSION['email'];
}

/*
* ==================================================
* Variables, Configs, Authenticator and QRCode Library
* ==================================================
*/
require_once ($path.'/config/variables.php');
require_once ($path.'/config/db.php');

/*
* ==================================================
* Validation Database Connection
* ==================================================
*/
if(connectDB() === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
mysqli_set_charset(connectDB(),"utf8");

/*
* ===========================================================================================================================
*     FUNCTIONS
* ===========================================================================================================================
* Users
* ==================================================
*/

require_once($path.'/scripts/includes/user/functionsUsers.php');


/* LOGIN LEVEL */



?>