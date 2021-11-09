<?php
if(!defined('RESTRICTED')){
    if(session_status() == PHP_SESSION_NONE){
        header("location: login");
        exit('No direct script access allowed! Path: '.dirname(__FILE__));
    }
}
/*
███████ ██ ████████ ███████     ██ ███    ██ ███████  ██████  
██      ██    ██    ██          ██ ████   ██ ██      ██    ██ 
███████ ██    ██    █████       ██ ██ ██  ██ █████   ██    ██ 
     ██ ██    ██    ██          ██ ██  ██ ██ ██      ██    ██ 
███████ ██    ██    ███████     ██ ██   ████ ██       ██████  
*/
$siteTitle = "Projeto Igrejas Unidas";
$adminMail = "helper@sperocoin.org";
$site_url = 'http://127.0.0.18:81/';
$maintenance_mode = "false";

?>