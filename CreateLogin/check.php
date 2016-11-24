<?
	//переменные с формы
	$name = $_POST[name];
	$family = $_POST[family];
	$daddy = $_POST[daddy];
	
	require_once '../ConnectionToBase/connection.php';//подключаемс€ к Ѕƒ
	
	//функци€ проверки на существование логина
	function login_busy($off)
	{
			
	}	
	
	//проверка на зан€тость логина
		$sqltmp='SELECT name FROM users ORDER BY id';//создаем запрос
		foreach($db->query($sqltmp) as $row)//прочитываем всю таблицу
		{
			if ($row['name']==$name)//если обнаружим такую же запись, то выводим ошибку. а также мен€ем флаг.
			{
				//нельз€ пользоватьс€ выводом текста из-за того, что у нас есть переход
				//print "This name is busy"; 
				$flagisbusy=1;
			}
		}
		if ($flagisbusy==1) { //если есть така€ же запись, то переходим на главную страницу
			Header("Location:../index.php");
		}
		
	//если нет повторений, то добавл€ем пользовател€
	if ($flagisbusy==0) {
	$db->exec("INSERT INTO users (name) VALUES ('$name')");
	print "You have created login";
	}
?>
<html>
	<head>
	</head>
	
	<body>
		<form method="POST" action=../index.php> 
			<input type="submit" name ="okbutton" value ="OK">
		</form>
	</body>
</html>







