<?php
	//print "hello!";
	//require_once '../ConnectionToBase/connection.php';
	
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$name = $_POST['name'];
		
		require_once '../ConnectionToBase/connection.php';
		
		$sql='SELECT id, name FROM users ORDER BY id';
		foreach($db->query($sql) as $row)
		{
			if ($row['name']==$name)//���� ����������� ������
			{
				//$GLOBAL=$row['id'];
				//session_start(); //otkrili sessiu ��� ��������
				$_SESSION['iduch']=$row['id'];
				//print $_SESSION['iduch'];
				$avtorisationflag=1;
				break;//�������� �������� ����, ��� ��� � ������ ����� �������� ������ ��������� row['id'], � �� �������
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
		

		//���� �� �������� ������� � �������
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
		//�����
		
		
		
	}

?>

<html>
			<!--
			<form action="../Zadania/action3.php" method="post">
				<p>���� ���: <input type="text" name="name" /></p>
				<p><input type="submit" /></p>
			</form>
			-->
		
</html>









