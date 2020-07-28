<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/src/config.php' ;
include_once ROOT.'/src/functions.php';

// получим данные юзера (если он логинился)
$user = user();

ob_start();

include ROOT.'/var/header.php';
include ROOT.'/var/page.php';
include ROOT.'/var/footer.php';

$content = ob_get_contents();
ob_end_clean();
echo $content;
?>