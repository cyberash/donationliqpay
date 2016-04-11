<?php

$host='localhost'; // имя хоста (уточняется у провайдера)

$database='hoslan_help'; // имя базы данных, которую вы должны создать

$user='hoslan_help'; // заданное вами имя пользователя, либо определенное провайдером

$pswd='way666'; // заданный вами пароль

$dbh = mysql_connect($host, $user, $pswd) or die("Не могу соединиться с MySQL.");

mysql_select_db($database) or die("Не могу подключиться к базе.");

$summa = $_POST['amount'];
$status = $_POST['status'];
 
$to = "";                 // вставте свой емаил
$subject = "Статус";        // вставте Темy сообщения
$from=''; 
 
$msg = "Сумма: $summa, Статус: $status";
 
 
mail ($to, $subject, $msg, 'From:'.$from);
 
if ($status == 'success') {
	mysql_query("UPDATE payments SET balance = balance + $summa WHERE id = 1");
}
else {
	header("Location: index.php");
}


?>