<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
$_SESSION['email'] = "";
$path = $_SERVER['DOCUMENT_ROOT'];
include($path.'/views/partials/header.php');
require($path.'/config/variables.php');
require($path.'/scripts/functions.php');

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

require($path.'/locale/' . $_SESSION['lang'] . '.php');

if($maintenance_mode == "false"){
/* LOGIN FORMS*/
// initializing variables
$username = "";
$email    = "";
$captcha_data = "";
$lastIP = $_SERVER['REMOTE_ADDR'];
$errors = array(); 

if (isset($_POST['login'])) {
  $email = mysqli_real_escape_string(connectDB(), strtolower($_POST['email']));
  $password = mysqli_real_escape_string(connectDB(), $_POST['password']);

  if (empty($email)) {
    echo "<script>
          Swal.fire({
            text: '".$lang['alert_email_required']."',
            icon: 'error',
            showConfirmButton: false,
            timer: 3000
          }).then(function() {
            window.location.href = 'login?lang=".$_SESSION['lang']."';
          });
        </script>";
  }
  if (!preg_match('/^[a-z0-9_\+-]+(\.[a-z0-9_\+-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*\.([a-z]{2,4})$/i', $email)){
    echo "<script>
          Swal.fire({
            text: '".$lang['alert_wrong_email']."',
            icon: 'error',
            showConfirmButton: false,
            timer: 3000
          }).then(function() {
            window.location.href = 'login?lang=".$_SESSION['lang']."';
          });
        </script>";
  }
  if (empty($password)) {
    echo "<script>
          Swal.fire({
            text: '".$lang['alert_password_required']."',
            icon: 'error',
            showConfirmButton: false,
            timer: 3000
          }).then(function() {
            window.location.href = 'login?lang=".$_SESSION['lang']."';
          });
        </script>";
  }

if($recaptcha == "true"){
  if (isset($_POST['g-recaptcha-response'])) {
    $captcha_data = $_POST['g-recaptcha-response'];
  }
  if (!$captcha_data) {
    echo "<script>
          Swal.fire({
            text: '".$lang['alert_wrong_captcha']."',
            icon: 'error',
            showConfirmButton: false,
            timer: 3000
          }).then(function() {
            window.location.href = 'login?lang=".$_SESSION['lang']."';
          });
        </script>";
    exit;
  }
  $resposta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$recaptchaSecretKey."&response=".$captcha_data."&remoteip=".$_SERVER['REMOTE_ADDR']);
    if (count($errors) == 0 && $resposta.success) {
      $queryLogin = mysqli_query(connectDB(), "SELECT * FROM users WHERE loginEmail='$email'");
      while ($rowLogin = mysqli_fetch_assoc($queryLogin)) {
          $rowPassword = $rowLogin['loginPassword'];
          if (password_verify($password, $rowPassword)) {
            $_SESSION['email'] = $email;
            echo "<script>
              Swal.fire({
                text: '".$lang['alert_login_success']."',
                icon: 'success',
                showConfirmButton: false,
                timer: 3000
              }).then(function() {
                window.location.href = 'panel?lang=".$_SESSION['lang']."';
              });
            </script>";
          }else{
            echo "<script>
              Swal.fire({
                text: '".$lang['alert_wrong_email_or_password']."',
                icon: 'error',
                showConfirmButton: false,
                timer: 3000
              }).then(function() {
                window.location.href = 'login?lang=".$_SESSION['lang']."';
              });
            </script>";
          }
      }
    }
  } else {
      if (count($errors) == 0) {
      $queryLogin = mysqli_query(connectDB(), "SELECT loginEmail,loginPassword FROM users WHERE loginEmail='$email'");
      while ($rowLogin = mysqli_fetch_assoc($queryLogin)) {
          $rowPassword = $rowLogin['loginPassword'];
          if (password_verify($password, $rowPassword)) {
            $_SESSION['email'] = $email;
            echo "<script>
              Swal.fire({
                text: '".$lang['alert_login_success']."',
                icon: 'success',
                showConfirmButton: false,
                timer: 3000
              }).then(function() {
                window.location.href = 'panel?lang=".$_SESSION['lang']."';
              });
            </script>";
          }else{
            echo "<script>
              Swal.fire({
                text: '".$lang['alert_wrong_email_or_password']."',
                icon: 'error',
                showConfirmButton: false,
                timer: 3000
              }).then(function() {
                window.location.href = 'login?lang=".$_SESSION['lang']."';
              });
            </script>";
          }
      }
    }
  }
}
/* LOGIN FORMS */

?>
<link rel="stylesheet" href="<?php $path;?>/dist/css/login.css">
<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 col-sm-12">
            <div class="card">
                <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" class="box">
                  <p class="text-center text-info">
                    <a href="?lang=en"><span class="flag-icon flag-icon-us"></span> <?php echo $lang['lang_eng']; ?></a> | <a href="?lang=pt-br"><span class="flag-icon flag-icon-br"></span> <?php echo $lang['lang_pt_br']; ?></a>
                  </p>
                    <h1><?php echo $lang['login_title']; ?></h1>
                    <p class="text-muted"> <?php echo $lang['login_subtitle']; ?></p>
                    <input type="text" name="email" placeholder="<?php echo $lang['login_email_input']; ?>" required="required">
                    <input type="password" name="password" placeholder="<?php echo $lang['login_password_input']; ?>" required="required">
                    <?php if($recaptcha == "true"){
                      echo "<div class='form-group'>
                              <center>
                                <div class='g-recaptcha' data-sitekey='".$recaptchaSiteKey."'></div>
                              </center>
                            </div>";
                      } ?>
                    <a class="forgot text-muted" href="https://t.me/sperocoin"><?php echo $lang['login_forgot_password']; ?></a><br>
                    <input type="submit" name="login" value="<?php echo $lang['login_button']; ?>" href="#">
                    <br>
                </form>
            </div>
        </div>
        <div class="col-md-3"></div>
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