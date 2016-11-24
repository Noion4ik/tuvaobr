<?php
	//print "hello!";
	//require_once '../ConnectionToBase/connection.php';
	
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$name = $_POST['name'];
		
		require_once '../ConnectionToBase/connection.php';
		
		$sql='SELECT id, name FROM users ORDER BY id';
		foreach($db->query($sql) as $row)
		{
			if ($row['name']==$name)//ищем подоходящую запись
			{
				//$GLOBAL=$row['id'];
				//session_start(); //otkrili sessiu для хранения
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
		
		if ($avtorisationflag != NULL) 
		{
			session_start();
			//$_SESSION['iduch']=5;
			$_SESSION['iduch']=$row['id'];
			Header("Location:../Avtorisation/SuccessAvtorisation.php");
		}			
		else
		{
			Header("Location:../Avtorisation/ErrorAvtorisation.php");
		}	
		

		//надо бы оформить функцию в будущем
		$sql1='SELECT name,question1 FROM kim ORDER BY id';
		foreach($db->query($sql1) as $row)
		{
			if ($row['name']=='inf')
			{
				print "success inf";
				$GLOBAL1=$row['name'];
				$question1=$row['question1'];
			}
			
			
			//print $row['id'] . "\t";
			//print $row['name'] . "\n";
			
		}
		print "You have choosen = ";
		print $GLOBAL1;
		print "You have choosen question1=";
		print $question1;
		//далее
		
		
		
	}

?>

<html>
			<!--
			<form action="../Zadania/action3.php" method="post">
				<p>Ваше имя: <input type="text" name="name" /></p>
				<p><input type="submit" /></p>
			</form>
			-->
		
</html>









