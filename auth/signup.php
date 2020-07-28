<?php
$msgReg = NULL;
// сначала проверим есть ли пользватель с таким логином
if ( isset($_POST['signup']) ) {
	$login = user_input($_POST['r_login']);

	$u = user_login($login);
  
	if ($u !== false) $msgReg = 'ОШИБКА! Такой пользователь уже существует!';
	else { // пользователь новый, сохраним его в базу
    if ( isset($_POST['r_password']) && isset($_POST['r_mail']) ) {
			// подготовим данные для записи в базу
			$sha_pass = sha1( user_input($_POST['r_password']) );
			$mail = user_input($_POST['r_mail']);
			$name = user_input($_POST['r_name']);
			$u_data = array($login,$sha_pass,$mail,$name);
      
      // добавляем юзера в базу
			user_new($u_data);
			
			// создаём куку сессии и отправляем на главную
      setcookie("sess_id", $sess_id, time()+60*60*24, "/");
      exit( header("Location: /") );
    } else $msgReg = 'Что-то пошло не так, попробуйте ещё раз...';
  }
}
?>