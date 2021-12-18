<?php 
if(!defined('RESTRICTED')){
    define('RESTRICTED',1);
}
$path = $_SERVER['DOCUMENT_ROOT'];
require_once($path.'/config/variables.php');
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
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="sweetalert2.min.css">
    <!-- Flags -->
    <link rel="stylesheet" href="<?php $path;?>/dist/plugins/flag-icon-css/css/flag-icon.min.css">

    <!--
             ██  █████  ██    ██  █████  ███████  ██████ ██████  ██ ██████  ████████ 
             ██ ██   ██ ██    ██ ██   ██ ██      ██      ██   ██ ██ ██   ██    ██    
             ██ ███████ ██    ██ ███████ ███████ ██      ██████  ██ ██████     ██    
        ██   ██ ██   ██  ██  ██  ██   ██      ██ ██      ██   ██ ██ ██         ██    
         █████  ██   ██   ████   ██   ██ ███████  ██████ ██   ██ ██ ██         ██    
    -->
    <!-- MDBootstrap JS -->
    <script src="<?php $path;?>/dist/js/mdb.min.js"></script>
    <script src="<?php $path;?>/dist/js/mdb.min.js.map"></script>
    <!-- SweetAlert2 JS -->
    <script src="sweetalert2.min.js"></script>

    
    <!-- Manifest PWA -->
    <link rel="manifest" href="<?php $path;?>/manifest.json" />
</head>
<body>