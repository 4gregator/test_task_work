<?php
include ROOT.'/auth/lk.php';
?>
<h2>Личный Кабинет</h2>
<div style="display:flex; flex-direction:column; align-items:center; padding:10px; width:300px; background:rgba(1,1,1,0.1);">
  <p style="margin:5px 0;">Ваш логин: <?=$user['_log']?></p>
  <p style="margin:5px 0;">Ваш email: <?=$user['_mail']?></p>
  <p style="margin:5px 0;">ФИО: <?=$user['_name']?></p>
  <div>
    <button class="change pas">Сменить пароль</button>
    <button class="change fio">Редактировать ФИО</button>
    <form name="changePas" action="" method="POST" autocomplete="off"
      style="display:flex; flex-direction:column; width:300px; align-items:center;">
      <label for="n_pas">Ваш новый пароль: <input name="n_pas" type="text" required></label>
      <input name="c_pas" type="submit" style="width:115px; margin-top:15px; font-size:16px; background: aliceblue;" value="Отправить">
    </form>
    <form name="changeFIO" action="" method="POST" autocomplete="off"
      style="display:flex; flex-direction:column; width:300px; align-items:center;">
      <label for="n_name" style="margin-top:15px;">Введите ФИО: <input name="n_name" type="text" placeholder="<?=$user['_name']?>" required></label>
      <input name="c_name" type="submit" style="width:115px; margin-top:15px; font-size:16px; background: aliceblue;" value="Отправить">
    </form>
  </div>
  <form name="logout" action="/auth/signout.php" method="POST" style="margin-top:10px;">
    <input name="logout" type="submit" value="Выход">
  </form>
	<p style="color:<?=$color?>;"><?=$msgNew?></p>
</div>