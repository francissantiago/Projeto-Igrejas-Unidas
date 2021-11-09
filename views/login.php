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
          text: 'Login Realizado com Sucesso!',
          icon: 'success',
          showConfirmButton: false,
          timer: 3000
        }).then(function() {
          window.location.href = 'login';
        });
      </script>";
    }
echo "Login Page";
?>



<script src="/pwa.js" type="module"></script>
</body>
</html>
<?php
}
if($maintenance_mode == "true"){
   header("location: maintenance");
}
?>