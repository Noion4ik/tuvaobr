     
<html>
		<head>
			
			<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script> <!--команда подключения библиотеки QJEURY -->
			<!--<link rel="stylesheet" type="text/css" href="indexfiles/indexstyle.css">-->
			
		</head>
<body>
<p><strong>1. Из PHP в JavaScript:</strong></p>
<?
	session_start();
	
	//print $_SESSION['iduch'];
	require_once '../ConnectionToBase/connection.php';
		
		$sql='SELECT id,iduch,idscience,pervichball,testball FROM balls ORDER BY id';
		foreach($db->query($sql) as $row)
		{
			if ($row['iduch']==$_SESSION['iduch'])//ищем подоход€щую запись
			{
				$k=$row['idscience'];
				$kk=$row['testball'];
				
				
				//$GLOBAL=$row['id'];
				//session_start(); //otkrili sessiu дл€ хранени€
				$_SESSION['iduch']=$row['id'];
				//print $_SESSION['iduch'];
				$avtorisationflag=1;
				break;//пришлось брейкать цикл, так как в сессию можно записать только последний row['id'], а не текущий
				//if ($_SESSION['iduch'] == NULL) 
				//	{
				//		Header("Location:../Avtorisation/ErrorAvtorisation.php");
				//	}
			}
		}

		if ($avtorisationflag==1)
		{
			if ($k==1)
			{
				print "јлгебра = ";
				
			}
			print $kk;
			
		}
		
		
	
	$k=1;
?>

<!--
<script type="text/javascript">

var userName = '<?php echo $k;?>';
document.write('Значение PHP-переменной: ' + userName);

</script>
-->
<?php
	ini_set('display_errors',1);
	error_reporting(E_ALL);
	
	echo '<table border=2>';
 
	for($j=0;$j<1;$j++)
	{
		echo '<tr>';
		for($i=0;$i<6;$i++)
		{
			if ($j==0) //построение первой строки таблицы с полями: Дата экзамена, Предмет, Первичный балл, Тестовый балл, Статус экзамена, Апелляция
			{
				//echo '<td>Пипец5</td>';
				if ($i==0)
				{
					echo '<td>Дата экзамена</td>';
				}					
				if ($i==0)
				{
					echo '<td>Предмет</td>';
				}
				if ($i==0)
				{
					echo '<td>Первичный балл</td>';
				}
				if ($i==0)
				{
					echo '<td>Тестовый балл</td>';
				}
				if ($i==0)
				{
					echo '<td>Статус экзамена</td>';
				}
				if ($i==0)
				{
					echo '<td>Апелляция</td>';
				}
				
				
				
				
			}
			else
			{
				echo '<td>Хорошо5</td>';
			}
		}
		echo '</tr>';
	}
 
	echo '</table>';
 
 
 
?>



</body>
</html>