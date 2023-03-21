<?
require "inc/db.php";
$data = $_POST;
if(isset($data['do_signup']))
{
	$errors = array();
	if(trim($data['login']) == '')
	{
		$errors[]='Введите логин';
	}
	if(trim($data['email']) == '')
	{
		$errors[]='Введите почту';
	}
	if($data['password'] == '')
	{
		$errors[]='Введите пароль';
	}
	if($data['password_2'] != $data['password'] )
	{
		$errors[]='Повторный пароль введен неправильно!';
	}
	if( R::count("users", "login=?", array($data['login']))>0)
	{
		$errors[]='Пользователь с таким логином уже существует, введите другой логин';;
	}
	if( R::count("users", "email=?", array($data['email']))>0)
	{
		$errors[]='Пользователь с таким email уже существует, введите другой email';;
	}


	if(empty($errors))
	{
		$user = R::dispense('users');
		$user->login = $data['login'];
		$user->email = $data['email'];
		$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
		R::store($user);



$login = $_POST['login'];
$email = $_POST['email'];
$login = htmlspecialchars($login);
$email = htmlspecialchars($email);
$login = urldecode($login);
$email = urldecode($email);
$login = trim($login);
$email = trim($email);


$subject = "Успешная регистрация";
$message = "Тема : Успешная регистрация \r\n ФИО: $login \r\n Email : $email \r\n Вы успешно зарегистрировались!";
$from = "orangelemoncoder@gmail.com";
$headers = "From: $from" . "\r\n" .
    "Reply-To: $from ". "\r\n" .
    "X-Mailer: PHP/"  . phpversion();


if (mail($email, $subject, $message, $headers))
 {     echo "сообщение успешно отправлено";
} else {
    echo "при отправке сообщения возникли ошибки";
}


		echo '<div style="color:green;" >Вы успешно зарегистрировались!</div><hr>';
		echo '<div style="color:green;" >Вы можете перейти на <a href="index.php">Главную</a> страницу!
			</div><hr>';

	}else
	{
		echo '<div style="color:red;" >'.array_shift($errors). '</div><hr>';

	}
}

?>
<form action="signup.php" method ="POST">
	<p>
		<p><strong>Ваш логин</strong></p>
		<input type="text" name="login" value="<? echo @$data['login'] ?>" />
	</p>

	<p>
		<p><strong>Ваша почта</strong></p>
		<input type="text" name="email" value="<? echo @$data['email'] ?>"/>
	</p>

	<p>
		<p><strong>Ваш пароль</strong></p>
		<input type="password" name="password" value="<? echo @$data['password'] ?>"/>
	</p>

	<p>
		<p><strong>Ваш пароль повторно</strong></p>
		<input type="password" name="password_2" />
	</p>


	<p>
		<button type="submit" name="do_signup">Зарегистрироваться</button>
	</p>

</form>
