<?php
$path = $_SERVER['DOCUMENT_ROOT'];
    require_once($path.'/config/variables.php');
    // HTTP protocol + Server address(localhost or example.com) + requested uri (/ or //home)
    $current_url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $request = str_replace($site_url, '', $current_url);
    //Replacing extra back slash at the end
    $request = str_replace('/', '', $request);
    //Converting the request to lowercase
    $request = strtolower($request);
?>