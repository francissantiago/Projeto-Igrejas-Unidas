<?php
$path = $_SERVER['DOCUMENT_ROOT'];


if (!isset($_SESSION['lang']) || !isset($_GET["lang"])) {
  $_SESSION['lang'] = "pt-br";
} else if (isset($_GET['lang']) && $_SESSION['lang'] != $_GET['lang'] && !empty($_GET['lang'])) {
  if ($_GET['lang'] == "pt-br") {
    $_SESSION['lang'] = "pt-br";
  } else if ($_GET['lang'] == "en") {
    $_SESSION['lang'] = "en";
  } else {
  	$_GET["lang"] = $_SESSION['lang'];
  }
}

require_once($path.'/locale/' . $_SESSION['lang'] . '.php');
?>