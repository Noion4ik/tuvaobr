<?
session_start(); //otkrili sessiju добавил Я
$_SESSION['a']=0;
?>
<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8">
	<!--<link rel="stylesheets" href="style1.css">-->
	<link rel="stylesheet" href="../css/main.css" type="text/css" media="all" /> <!--вот так работает-->
<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>-->
  
<!--<script src="/ajax.js" type="text/javascript"></script>-->

<script src="../js/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">
	$( document ).ready(function() {
		$("#btn").click(
			function(){
				alert("вы нажали кнопку");
				sendAjaxForm('result_form', 'ajax_form', 'action_ajax_form.php',0);
				return false; 
			}
		);
	});

$( document ).ready(function() {
    $("#btn1").click(
		function(){
			sendAjaxForm('result_form', 'ajax_form1', 'action_ajax_form1.php',1);
			return false; 
		}
	);
});
 
function sendAjaxForm(result_form, ajax_form, url, n) {
    alert("отправили данные");
	jQuery.ajax({
        /*
		<?
			session_start();
			$_SESSION['dd']=n;
		?>
		*/
		
		url:     url, //url страницы (action_ajax_form.php)
        type:     "POST", //метод отправки
        dataType: "html", //формат данных
        //data: jQuery("#"+ajax_form).serialize(),  // Сеарилизуем объект
        data: jQuery("#" + ajax_form).serialize(),//сериализация введенной значения в последовательность байт
		
		/*
		success: function(response) { //Данные отправлены успешно
        	result = jQuery.parseJSON(response);
        	document.getElementById(result_form).innerHTML = "Имя: "+result.name+"<br>Телефон: "+result.phonenumber;
    	},
    	error: function(response) { // Данные не отправлены
    		document.getElementById(result_form).innerHTML = "Ошибка. Данные не отправленны.";
    	}
		*/
 	});
}

</script>
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
		
		<?
			require_once '/home/u212600510/public_html//ConnectionToBase/connection.php';
			$sql='SELECT id,zadan1 FROM zadan ORDER BY id';//подготавливаем запрос по прохождению всей таблицы для отбора данных
				foreach($db->query($sql) as $row) //каждую строку таблицы balls сохраняем во временный массив $row
				{
					if ($row['id']==1)//если текущая запись принадлежит авторизованному пользователю, то сохраняем данные строки(экзамена) в двумерный массив(двумерный, потому что элементами будут экзамены со своими атриб)
					{
						//способа мгновенного копирования строки таблицы в массив я не знаю, поэтому делаю вручную
						$za=$row['zadan1'];
					}
				}
		?>
		<body background=7.jpg>
		
		<body background="$za"> <!-- вставили картинку на задний фон -->
		
		<h2>love </h2>
		
		
	
	
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