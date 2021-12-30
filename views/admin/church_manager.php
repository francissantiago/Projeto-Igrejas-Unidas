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
include_once($path.'/views/partials/header.php');
include_once($path.'/views/partials/menu.php');

?>
<!-- Panel -->
<link rel="stylesheet" href="<?php $path;?>/dist/css/panel.css">
<!-- Content Header (Page header) -->
<div class="container text-center" style="padding-top: 2vh;">
  <head>
    <b class="display-6">
      <i class="fa-solid fa-place-of-worship"></i><br>
      <?php echo $lang['menu_app_churchs']?>
    </b>
  </head>
  <hr>
  <p style="padding-top: 5vh">
    <a href="add_church"><button class="btn btn-block btn-success">Adicionar Congregação</button></a>
    <div class="table-responsive">
      <table class="table table-hover table-striped table-nowrap">
        <thead>
          <tr class="table-danger">
            <th>ID</th>
            <th>Igreja</th>
            <th>Responsável</th>
            <th>Editar</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="table-light"></td>
            <td class="table-light"></td>
            <td class="table-light"></td>
            <td class="table-light">
              <a href=""><i class="fa-solid fa-pen-to-square"></i></a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </p>
</div>
<?php 
mysqli_close(connectDB());
}
if($maintenance_mode == "true"){
   header("location: maintenance");
}
?>

<script type="text/javascript">
$(document).ready(function(){
  $('#example').DataTable({
    "pagingType": "full_numbers"
  });
});
</script>