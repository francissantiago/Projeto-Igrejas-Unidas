<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
} 
if(!defined('RESTRICTED')){
  define('RESTRICTED',1);
}
$path = $_SERVER['DOCUMENT_ROOT'];
require_once($path.'/scripts/functions.php');
require_once($path.'/views/def_lang.php');
//require_once($path.'/dashboard/includes/mail.php');

if($maintenance_mode == "false"){
  if (!isset($_SESSION['email'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login');
  }
  if (isset($_POST['logout'])) {
    session_destroy();
    unset($_SESSION['email']);
    header("location: login");
  }
include_once($path.'/views/partials/header.php');
include_once($path.'/views/partials/menu.php');

?>
<!-- Panel -->
<link rel="stylesheet" href="<?php $path;?>/dist/css/panel.css">
<!-- Content Header (Page header) -->
<div class="container" style="padding-top: 10vh;">

</div>
<?php 
mysqli_close(connectDB());
}
if($maintenance_mode == "true"){
   header("location: maintenance");
}
?>