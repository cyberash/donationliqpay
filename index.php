<!DOCTYPE html>
<html lang="ru">
 <head>
  <title>Пожертвования</title>
  <meta charset="utf8" />
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
 </head>
 <body>
 <?php
 
$host='localhost'; // имя хоста (уточняется у провайдера)

$database='hoslan_help'; // имя базы данных, которую вы должны создать

$user='hoslan_help'; // заданное вами имя пользователя, либо определенное провайдером

$pswd='way666'; // заданный вами пароль

$dbh = mysql_connect($host, $user, $pswd) or die("Не могу соединиться с MySQL.");

mysql_select_db($database) or die("Не могу подключиться к базе.");

$balance = mysql_query("SELECT balance FROM payments WHERE id = 1");
$balance_arr = mysql_fetch_array($balance);


 ?>
  <header id="header">
   <div class="container">
    <div class="row">
	 <div class="col-md-12">
	  <div class="head">
	   <h1>Фонд поддержки проекта</h1>
	  </div>
	 </div>
	</div>
   </div>
  </header>
  <main id="main">
   <div class="container">
    <div class="main">
	 <div class="row">
	  <div class="col-md-12">
	   <div class="sum">
	    <p>Всего собрано: <?php echo $balance_arr['balance']; ?> UAH</p>
	   </div>
	  </div>
	 </div>
	 <div class="row">
	  <div class="col-md-12">
	    <div class="add">
		 <p>Пожертвовать</p>
		</div>
	  </div>
	 </div>
	 <div class="row">
	  <div class="col-md-12">
	   <div class="form">
	    <form action="https://www.liqpay.com/api/pay" method="post" class="form-horizontal">
<div class="control-group">
<label for="twoicons" class="control-label">Введите сумму</label>
<div class="controls">
                            <div class="input-append">

    <input type="text" class="input-square" name="amount" id="twoicons"><span class="add-on">UAH</span>
                            </div>
   </div>
                    </div>
 <input type="hidden" name="public_key" value="ID Merchant" />    
<input type="hidden" name="currency" value="UAH" />
<input type="hidden" name="description" value="Пополнение баланса" />
<? /* ?><input type="hidden" name="sandbox" value="1" /> <? */ ?>
<input type="hidden" name="type" value="buy" />
<input type="hidden" name="result_url" value="" />
<input type="hidden" name="server_url" value="/status.php" />
<input type="hidden" name="pay_way" value="card,delayed" />
<input type="hidden" name="language" value="ru" />
<div class="form-actions">
<br>
   <button type="submit" class="btn btn-success">Оплатить</button>
                    </div>
</form>
	   </div>
	  </div>
	 </div>
	</div>
   </div>
  </main>
  <footer id="footer">
  
  </footer>
  <script type="text/javascript">
   function pay() {
	   var wallet = document.getElementById('wallet').value;
	   if(wallet == 'qiwi') {
		   document.getElementById('qiwi-form').style.display='block';
	   }
	   else {
		   document.getElementById('yandex-form').style.display='block';
	   }
	   return false;
   }
  </script>
 </body>
</html>