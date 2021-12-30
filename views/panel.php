<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
if(!defined('RESTRICTED')){
  define('RESTRICTED',1);
}
$path = $_SERVER['DOCUMENT_ROOT'];
include($path.'/views/partials/header.php');
require_once($path.'/scripts/functions.php');
require_once($path.'/views/def_lang.php');
//require_once($path.'/dashboard/includes/mail.php');

if($maintenance_mode == "false"){
  if ($_SESSION['email'] == "") {
    echo "<script>
          Swal.fire({
            text: '".$lang['alert_login_required']."',
            icon: 'error',
            showConfirmButton: false,
            timer: 1000
          }).then(function() {
            window.location.href = 'login?lang=".$_SESSION['lang']."';
          });
        </script>";
  } else {
    include($path.'/views/partials/menu.php');
    ?>
    <!-- Panel -->
    <link rel="stylesheet" href="<?php $path;?>/dist/css/panel.css">
    <!-- Content Header (Page header) -->
    <div class="container text-center" style="padding-top: 10vh;">
      <head>
        <b class="display-4">
          <?php echo $_SESSION['email']; ?>
        </b>
      </head>
    </div>
    <?php 
    mysqli_close(connectDB());
  }
  if (isset($_POST['logout'])) {
        session_destroy();
        $_SESSION['email'] = "";
        echo "<script>
          Swal.fire({
            text: '".$lang['alert_logout']."',
            icon: 'success',
            showConfirmButton: false,
            timer: 1000
          }).then(function() {
            window.location.href = 'login?lang=".$_SESSION['lang']."';
          });
        </script>";
    }
}
if($maintenance_mode == "true"){
   header("location: maintenance");
}
?>