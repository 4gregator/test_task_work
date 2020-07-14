<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
include_once $_SERVER['DOCUMENT_ROOT'].'/config.php' ;
include_once ROOT.'/functions.php';

ob_start();
error_reporting(E_ALL);

include_once ROOT.'/var/header.php';
include_once ROOT.'/var/page.php';
include_once ROOT.'/var/footer.php';

$content = ob_get_contents();
ob_end_clean();
echo $content;
?>