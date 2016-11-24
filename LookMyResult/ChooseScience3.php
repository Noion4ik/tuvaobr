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

?>