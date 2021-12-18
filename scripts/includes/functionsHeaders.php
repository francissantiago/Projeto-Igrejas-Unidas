<?php
$path = $_SERVER['DOCUMENT_ROOT'];
header('Content-Type: text/html; charset=utf-8');
$datetime = new DateTime();
$timezone = new DateTimeZone('America/New_York');
$datetime->setTimezone($timezone);
error_reporting(E_ERROR | E_PARSE | E_ALL);
?>