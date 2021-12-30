<?php 
if(!defined('RESTRICTED')){
    define('RESTRICTED',1);
}
$path = $_SERVER['DOCUMENT_ROOT'];
require($path.'/config/variables.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php echo $siteTitle; ?>
    </title>
    <!--
         ██████ ███████ ███████ 
        ██      ██      ██      
        ██      ███████ ███████ 
        ██           ██      ██ 
         ██████ ███████ ███████ 
    -->
    <!-- MDBootstrap CSS -->
    <link rel="stylesheet" href="<?php $path;?>/dist/css/mdb.dark.min.css">
    <link rel="stylesheet" href="<?php $path;?>/dist/css/mdb.dark.min.css.map">
    <link rel="stylesheet" href="<?php $path;?>/dist/css/mdb.dark.rtl.min.css">
    <link rel="stylesheet" href="<?php $path;?>/dist/css/mdb.dark.rtl.min.css.map">
    <link rel="stylesheet" href="<?php $path;?>/dist/css/mdb.min.css">
    <link rel="stylesheet" href="<?php $path;?>/dist/css/mdb.min.css.map">
    <link rel="stylesheet" href="<?php $path;?>/dist/css/mdb.rtl.min.css">
    <link rel="stylesheet" href="<?php $path;?>/dist/css/mdb.rtl.min.css.map">
    <!-- Custom -->
    <link rel="stylesheet" href="<?php $path;?>/dist/css/custom.css">
    <!-- Datatable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <!-- Flags -->
    <link rel="stylesheet" href="<?php $path;?>/dist/plugins/flag-icon-css/css/flag-icon.min.css">
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/f087b2d8c6.js" crossorigin="anonymous"></script>


    <!--
             ██  █████  ██    ██  █████  ███████  ██████ ██████  ██ ██████  ████████ 
             ██ ██   ██ ██    ██ ██   ██ ██      ██      ██   ██ ██ ██   ██    ██    
             ██ ███████ ██    ██ ███████ ███████ ██      ██████  ██ ██████     ██    
        ██   ██ ██   ██  ██  ██  ██   ██      ██ ██      ██   ██ ██ ██         ██    
         █████  ██   ██   ████   ██   ██ ███████  ██████ ██   ██ ██ ██         ██    
    -->
    <!-- SweetAlert2 JS -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- MDBootstrap JS -->
    <script src="<?php $path;?>/dist/js/mdb.min.js"></script>
    

    
    <!-- Manifest PWA -->
    <link rel="manifest" href="<?php $path;?>/manifest.json" />
</head>
<body class="area">