<?php
$msgAuth = NULL;
//сначала проверим логин
if ( isset($_POST['signin']) ) {
	if ( isset($_POST['_login']) ) {
		$q = $pdo->prepare("SELECT * FROM users WHERE `_log` = ? LIMIT 1");
		$q->execute(array($_POST['_login']));
		$u = $q->fetch();
	} else $msgAuth = 'Что-то пошло не так, попробуйте ещё раз...';

	if (!$u['_id']) $msgAuth = 'ОШИБКА! Пользователь не существует!';
	else {//проверим пароль
		if ( isset($_POST['_password']) ) {
			$shap = sha1($_POST['_password']);
			
			if ($shap == $u['_pas']) {//пароль верный, сохраним токен сессии
				$sess_id = md5(rand(1000,9999).passGen(12,18));
				$q = $pdo->prepare("UPDATE users SET `_session_id` = ? WHERE `_id` = ? LIMIT 1");
				$q->execute(array($sess_id,$u['_id']));
				setcookie("sess_id", $sess_id, time()+60*60*24, "/");
				exit( header("Location: /") );
			} else {
				$msgAuth = 'ОШИБКА! Введен неверный пароль!';
			}
		} else $msgAuth = 'Что-то пошло не так, попробуйте ещё раз...';
	}
}
?>
<form method="POST" name="auth" action="" autocomplete="off"
	style="display:flex; flex-direction:column; width:300px; align-items:center; background:rgba(1,1,1,0.1); padding:20px;">
	<label for="_login">Введите логин: <input name="_login" type="text" required></label>
	<label for="_password" style="margin-top:15px;">Введите пароль: <input name="_password" type="password" required></label>
	<input name="signin" type="submit" style="width:115px; margin-top:15px; font-size:16px; background: aliceblue;" value="Войти">
	<p style="color:red;"><?=$msgAuth?></p>
</form>