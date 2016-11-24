<?
session_start(); //otkrili sessiju добавил Я
$_SESSION['a']=0;
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Article Ajax WH-DB.COM</title>
  <meta name="description" content="Article WH-DB.COM. How send ajax form.">
  <meta name="author" content="wh-db.com">
	<link rel="stylesheets" href="style1.css">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script src="ajax.js"></script>

</head>

<body>
    
	
	<center>
	
	
	
		<form method="post" id="ajax_form" action="" >
			<h1>B1 </h1>     Петя пошел из лагеря в город. В 12 часов, в а км от лагеря,<br> 
			его догнал велосипедист и подвез его немного. <br>
			Затем велосипедист высадил Петю в а км от города, <br>
			и в 14 часов Петя добрался до города. <br>
			Сколько времени потратит Петя на обратную дорогу пешком, если известно, <br>
			что скорость велосипедиста в два раза больше скорости Пети? <br>

			<input type="text" name="name" placeholder="" /><br> <!--placeholder это то что будет отображаться на экране -->
			<!-- <input type="text" name="phonenumber" placeholder="YOUR PHONE" /><br> -->
			<input type="button" id="btn" value="Отправить" />
		</form>
	
		<form method="post" id="ajax_form1" action="" >
			<h1>B2 </h1>      В уравнении 5х+3=18 значение Х равно: 
			<input type="text" name="name" placeholder="" /><br>
			<!-- <input type="text" name="phonenumber" placeholder="YOUR PHONE" /><br> --> 
			<input type="button" id="btn1" value="Отправить" />
		</form>
	
	
	
	</center>


	<!--код проверки введенных данных-->
	<form method="POST" action=CheckedWork.php> 
			<center>
			<font color="#00FF7F"><h2> Завершить контрольную </h2> </font>
			<input type="submit" name ="okbutton" value ="OK">
			</center>
	</form>
	
	
	
	
	
	
	

	
	

    <br>

    <!--<div id="result_form"><div>--> 
</body>
</html>