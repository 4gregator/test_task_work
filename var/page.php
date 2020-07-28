<h1>Hello Work!</h1>
<div align="center" style="padding:100px 0 0 0;">
<?php
if (!$user) {// если данных по юзеру нет нет - предложим залогиниться или зарегаться
?>
  <div style="padding:10px;">
    <button style="font-size:18px;" class="logging auth active">Вход</button>
    <button style="font-size:18px;" class="logging reg">Регистрация</button>
  </div>
<?php
  include ROOT.'/var/auth/signin.php';
  include ROOT.'/var/auth/signup.php';
} else include ROOT.'/var/auth/lk.php';// если есть - отправим в личный кабинет
?>
</div>