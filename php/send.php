<?php

/*
Форма обратной связи может получать сообщения с любых почтовых ящиков.
Исправлена проблема кодировки при получении писем почтовым клиентом Outlook.
Вы скачали её с сайта Epic Blog https://epicblog.net Заходите на сайт снова!
ВНИМАНИЕ! Лучше всего в переменную myemail прописать почту домена, который использует сайт. А не mail.ru, gmail и тд.
*/
if(isset($_POST['submit'])){
/* Устанавливаем e-mail Кому и от Кого будут приходить письма */
	$to = "yuri.strelnikov@mail.ru"; // Здесь нужно написать e-mail, куда будут приходить письма
    $from = "no-reply@landinggods.ru"; // Здесь нужно написать e-mail, от кого будут приходить письма, например no-reply@epicblog.net

/* Указываем переменные, в которые будет записываться информация с формы */
	$first_name = $_POST['first_name'];
	$email = $_POST['email'];
	$selected_package = $_POST['select_package'];
	$phone = $_POST['phone'];
	$message = $_POST['message'];
    $subject = "Автоматическое сообщение с сайта Landing Gods";//Фиксированная тема письма

/* Проверка правильного написания e-mail адреса */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
show_error("<br /> Е-mail адрес не существует");
}

/* Переменная, которая будет отправлена на почту со значениями, вводимых в поля */
$mail_to_myemail ="<h1><b>Здравствуйте!</b></h1>
<b>Вы получили сообщение с сайта!</b>

<hr>

<p>
<b>Имя отправителя:</b> $first_name
</p>

<p>
<b>E-mail:</b> $email
</p>

<p>
<b>Номер телефона:</b> $phone
</p>

<p>
<b>Текст сообщения:</b> $message
</p>

<p>
<b>Выбранный пакет:</b> $selected_package
</p>";

$headers = "From: $from \r\n";

/* Отправка сообщения, с помощью функции mail() */
     mail($to, $subject, $mail_to_myemail, $headers . 'Content-type: text/html; charset=utf-8');
      /*echo "Сообщение отправлено. Спасибо Вам " . $first_name . ", мы скоро свяжемся с Вами.";
  	echo "<br /><br /><a href='https://epicblog.net'>Вернуться на сайт.</a>";*/
      exit('<meta http-equiv="refresh" content="0; url=/index.html" />');
  }
  ?>
/*<!--Переадресация на главную страницу сайта, через 3 секунды-->
<script language="JavaScript" type="text/javascript">
function changeurl(){eval(self.location="/index.html);}
window.setTimeout("changeurl();",3000);
</script>*/