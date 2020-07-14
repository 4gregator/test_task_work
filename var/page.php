<?php
$user = user();// получим данные юзера по куке, если куки нет - предложим залогиниться или зарегаться
?>
<h1>Hello Work!</h1>
<div align="center" style="padding:100px 0 0 0;">
<?php
if (!$user) {
?>
  <div style="padding:10px;">
    <button style="font-size:18px;" class="logging auth active">Вход</button>
    <button style="font-size:18px;" class="logging reg">Регистрация</button>
  </div>
<?php
  include ROOT.'/auth/signin.php';
  include ROOT.'/auth/signup.php';
} else include ROOT.'/auth/lk.php';
?>
</div>