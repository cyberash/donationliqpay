<?php

$host='localhost'; // ��� ����� (���������� � ����������)

$database='hoslan_help'; // ��� ���� ������, ������� �� ������ �������

$user='hoslan_help'; // �������� ���� ��� ������������, ���� ������������ �����������

$pswd='way666'; // �������� ���� ������

$dbh = mysql_connect($host, $user, $pswd) or die("�� ���� ����������� � MySQL.");

mysql_select_db($database) or die("�� ���� ������������ � ����.");

$summa = $_POST['amount'];
$status = $_POST['status'];
 
$to = "";                 // ������� ���� �����
$subject = "������";        // ������� ���y ���������
$from=''; 
 
$msg = "�����: $summa, ������: $status";
 
 
mail ($to, $subject, $msg, 'From:'.$from);
 
if ($status == 'success') {
	mysql_query("UPDATE payments SET balance = balance + $summa WHERE id = 1");
}
else {
	header("Location: index.php");
}


?>