<form action="mail.php" method ="POST">
	<p>
		<p><strong>ФИО</strong></p>
		<input type="text" name="fio"/>
	</p>

	<p>
		<p><strong>Ваша почта</strong></p>
		<input type="text" name="email"/>
	</p>

	<p>
		<button type="submit">Зарегистрироваться</button>
	</p>

</form>


<?php


$fio = $_POST['fio'];
$email = $_POST['email'];
$fio = htmlspecialchars($fio);
$email = htmlspecialchars($email);
$fio = urldecode($fio);
$email = urldecode($email);
$fio = trim($fio);
$email = trim($email);


$subject = "Успешная регистрация";
$message = "Тема : Успешная регистрация \r\n ФИО: $fio \r\n Email : $email \r\n Вы успешно зарегистрировались!";
$from = "orangelemoncoder@gmail.com";
$headers = "From: $from" . "\r\n" .
    "Reply-To: $from ". "\r\n" .
    "X-Mailer: PHP/"  . phpversion();

if (mail($email, $subject, $message, $headers))
 {     echo "сообщение успешно отправлено";
} else {
    echo "при отправке сообщения возникли ошибки";
}?>
