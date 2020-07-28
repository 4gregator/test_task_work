<?php
  $color = 'red';
  $msgNew = 'Что-то пошло не так, попробуйте ещё раз...';
  $success = false;

  // новый пароль
  if ( isset($_POST['c_pas']) ) {
    if ( isset($_POST['n_pas']) ) {
      $sha_pass = sha1( user_input($_POST['n_pas']) );
      $type = 'pass';
      
      user_change($sha_pass, $user['_id'], $type);

      $msgNew = 'Пароль успешно изменён!';
      $success = true;
    }
  }
  // новые ФИО
  if ( isset($_POST['c_name']) ) {
    if ( isset($_POST['n_name']) ) {
      $name = user_input($_POST['n_name']);
      $type = 'name';
      
      user_change($name, $user['_id'], $type);

      $msgNew = 'ФИО успешно изменены!';
      $success = true;
    }
  }

  if ($success) {
    $color = 'green';
    $user = user();
  }
?>