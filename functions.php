<?php
function user() {
    global $pdo;
    if ( isset($_COOKIE["sess_id"])) {
        $q = $pdo->prepare("SELECT * FROM users WHERE `_session_id` = ? LIMIT 1");
        $q->execute(array($_COOKIE["sess_id"]));
        $u = $q->fetch();
        return $u['_id'] ? $u : false;
    } else {
        return false;
    }
}

function passGen($minchars=8, $maxchars=10, $chars="ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz") {
$escapecharplus = 0;
$repeat = mt_rand($minchars, $maxchars);
$randomword = '';
while ( $escapecharplus < $repeat )
{
$randomword .= $chars[mt_rand(1, strlen($chars)-1)];
$escapecharplus += 1;
}
return $randomword;
}
?>