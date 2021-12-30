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
    //$_SESSION['msg'] = "You must log in first";
    header('location: login');
  }
  if (isset($_POST['logout'])) {
    session_destroy();
    unset($_SESSION['email']);
    header("location: login");
  }
include($path.'/views/partials/header.php');
include($path.'/views/partials/menu.php');

?>
<!-- Panel -->
<link rel="stylesheet" href="<?php $path;?>/dist/css/add_church.css">
<!-- Content Header (Page header) -->
<div class="container text-center" style="padding-top: 2vh;">
  <head>
    <b class="display-6">
      <i class="fa-solid fa-place-of-worship"></i><br>
      <?php echo $lang['add_church']?>
    </b>
  </head>
  <hr>
  <p style="padding-top: 5vh">
    <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" class="box">
      <!-- 2 column grid layout with text inputs for the first and last names -->
      <div class="row mb-4">
        <div class="col">
          <div class="form-outline">
            <input type="text" id="form6Example1" class="form-control" />
            <label class="form-label" for="form6Example1">First name</label>
          </div>
        </div>
        <div class="col">
          <div class="form-outline">
            <input type="text" id="form6Example2" class="form-control" />
            <label class="form-label" for="form6Example2">Last name</label>
          </div>
        </div>
      </div>

      <!-- Text input -->
      <div class="form-outline mb-4">
        <input type="text" id="form6Example3" class="form-control" />
        <label class="form-label" for="form6Example3">Company name</label>
      </div>

      <!-- Text input -->
      <div class="form-outline mb-4">
        <input type="text" id="form6Example4" class="form-control" />
        <label class="form-label" for="form6Example4">Address</label>
      </div>

      <!-- Email input -->
      <div class="form-outline mb-4">
        <input type="email" id="form6Example5" class="form-control" />
        <label class="form-label" for="form6Example5">Email</label>
      </div>

      <!-- Number input -->
      <div class="form-outline mb-4">
        <input type="number" id="form6Example6" class="form-control" />
        <label class="form-label" for="form6Example6">Phone</label>
      </div>

      <!-- Message input -->
      <div class="form-outline mb-4">
        <textarea class="form-control" id="form6Example7" rows="4"></textarea>
        <label class="form-label" for="form6Example7">Additional information</label>
      </div>
      </div>

      <!-- Submit button -->
      <button type="submit" class="btn btn-primary btn-block mb-4">Place order</button>
    </form>
  </p>
</div>
<?php 
mysqli_close(connectDB());
}
if($maintenance_mode == "true"){
   header("location: maintenance");
}
?>