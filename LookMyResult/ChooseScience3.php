<?
	session_start();
	//print $_SESSION['iduch'];
	require_once '../ConnectionToBase/connection.php';
		
		$sql='SELECT id,iduch,idscience,pervichball,testball FROM balls ORDER BY id';
		foreach($db->query($sql) as $row)
		{
			if ($row['iduch']==$_SESSION['iduch'])//���� ����������� ������
			{
				$k=$row['idscience'];
				$kk=$row['testball'];
				
				
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

		if ($avtorisationflag==1)
		{
			if ($k==1)
			{
				print "������� = ";
				
			}
			print $kk;
			
		}

?>