<?php
$user = user();// получим данные юзера по куке
?>
<h1>Hello Work!</h1>
<div align="center" style="padding:100px 0 0 0;">
<?php
if (!$user) {//если куки нет - предложим залогиниться или зарегаться
?>
  <div style="padding:10px;">
    <button style="font-size:18px;" class="logging auth active">Вход</button>
    <button style="font-size:18px;" class="logging reg">Регистрация</button>
  </div>
<?php
  include ROOT.'/auth/signin.php';
  include ROOT.'/auth/signup.php';
} else include ROOT.'/auth/lk.php';// если есть - отправим в личный кабинет
?>
</div>