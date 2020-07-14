<?php
$msgReg = NULL;
//сначала проверим есть ли пользватель с таким логином
if ( isset($_POST['signup']) ) {
	$q = $pdo->prepare("SELECT * FROM users WHERE `_log` = ? LIMIT 1");
	$q->execute(array($_POST['r_login']));
  $u = $q->fetch();
  
	if ($u['_id']) $msgReg = 'ОШИБКА! Такой пользователь уже существует!';
	else {
    if ( isset($_POST['r_password']) && isset($_POST['r_mail']) ) {
      $shap = sha1($_POST['r_password']);
      $sess_id = md5(rand(1000,9999).passGen(12,18));
      
      $q = $pdo->prepare("INSERT INTO users (`_log`,`_pas`,`_mail`,`_name`,`_session_id`) VALUES (?,?,?,?,?)");
      $q->execute(array($_POST['r_login'],$shap,$_POST['r_mail'],$_POST['r_name'],$sess_id));
      setcookie("sess_id", $sess_id, time()+60*60*24, "/");
      exit( header("Location: /") );
    } else $msgReg = 'Что-то пошло не так, попробуйте ещё раз...';
  }
}
?>
<form method="POST" name="reg" action="" autocomplete="off"
	style="display:flex; flex-direction:column; width:300px; align-items:center; background:rgba(1,1,1,0.1); padding:20px;">
	<label for="r_login">Придумайте логин: <input name="r_login" type="text" required></label>
	<label for="r_password" style="margin-top:15px;">Придумайте пароль: <input name="r_password" type="text" required></label>
	<label for="r_mail" style="margin-top:15px;">Введите email: <input name="r_mail" type="email" required></label>
	<label for="r_name" style="margin-top:15px;">Введите ФИО: <input name="r_name" type="text"></label>
	<input name="signup" type="submit" style="width:115px; margin-top:15px; font-size:16px; background: aliceblue;" value="Отправить">
	<p style="color:red;"><?=$msgReg?></p>
</form>