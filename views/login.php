<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

$path = $_SERVER['DOCUMENT_ROOT'];
include_once($path.'/views/partials/header.php');
require_once($path.'/config/variables.php');
require_once($path.'/scripts/functions.php');

if($maintenance_mode == "false"){
    if (isset($_SESSION['email'])) {
        echo "<script>
        Swal.fire({
          text: ".$lang['alert_login_success'].",
          icon: 'success',
          showConfirmButton: false,
          timer: 3000
        }).then(function() {
          window.location.href = 'login?lang=".$_SESSION['lang']."';
        });
      </script>";
    }
    if (!isset($_SESSION['lang']) || !isset($_GET["lang"])) {
        $_SESSION['lang'] = "pt-br";
    } else if (isset($_GET['lang']) && $_SESSION['lang'] != $_GET['lang'] && !empty($_GET['lang'])) {
        if ($_GET['lang'] == "pt-br") {
          $_SESSION['lang'] = "pt-br";
        } 
        else if ($_GET['lang'] == "en") {
          $_SESSION['lang'] = "en";
        }
        else if ($_GET['lang'] != "en" || $_GET['lang'] != "pt-br" ) {
          $_SESSION['lang'] = $_SESSION['lang'];
        }
    }

    require_once($path.'/locale/' . $_SESSION['lang'] . '.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 col-sm-12">
            
        </div>
        <div class="col-md-3">
    </div>
</div>


<script src="/pwa.js" type="module"></script>
</body>
</html>
<?php
}
if($maintenance_mode == "true"){
   header("location: maintenance");
}
?>