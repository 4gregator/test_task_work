<?php
include ROOT.'/auth/signup.php';
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