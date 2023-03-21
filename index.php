<?
require "inc/db.php";?>
<? if(isset($_SESSION['logged_user']) ):?>

Авторизован!<br>
Привет, <?php echo $_SESSION['logged_user'] -> login; ?>!<hr>
<a href="logout.php">Выход</a><?php else:?>
	<p style="color:coral" >Вы не авторизованы!</p>
	<a href="login.php">Авторизация</a>
	<a href="signup.php">Регистрация</a>
	


<?php endif;?>