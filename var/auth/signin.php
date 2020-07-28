<?php
include ROOT.'/auth/signin.php';
?>
<form method="POST" name="auth" action="" autocomplete="off"
	style="display:flex; flex-direction:column; width:300px; align-items:center; background:rgba(1,1,1,0.1); padding:20px;">
	<label for="_login">Введите логин: <input name="_login" type="text" required></label>
	<label for="_password" style="margin-top:15px;">Введите пароль: <input name="_password" type="password" required></label>
	<input name="signin" type="submit" style="width:115px; margin-top:15px; font-size:16px; background: aliceblue;" value="Войти">
	<p style="color:red;"><?=$msgAuth?></p>
</form>