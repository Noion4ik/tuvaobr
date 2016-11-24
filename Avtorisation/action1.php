<?php
	error_reporting(-1);
	header('Content-Type: text/html; charset=utf-8');//ввод кодировки поддержки русских букв
?>
<html>
	<head>
			<!--
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			-->
			
	</head>
	
	<body>
			<p>&nbsp </p>
			<p>&nbsp </p>
			<p>&nbsp </p>
			<p>&nbsp </p>
			<p>&nbsp </p>
			<p>&nbsp </p>
			<p>&nbsp </p>
			<p>&nbsp </p>
		
		<center>
			<form method="POST" action=avtorisation.php> 
				<input name ="name" type="text" placeholder ="Фамилия"/>
				<input name ="family" type="text" placeholder ="Имя"/>
				<input name ="daddy" type="text" placeholder ="Отчество"/>
				<input type="submit" name ="okbutton" value ="OK">
			</form>
		</center>
	</body>
</html>