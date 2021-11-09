<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
$path = $_SERVER['DOCUMENT_ROOT'];
include_once($path.'/views/partials/header.php');
echo "Login Page";
?>
<script src="/pwa.js" type="module"></script>