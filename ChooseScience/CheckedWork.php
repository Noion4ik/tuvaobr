<?
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		session_start();
		$idd=$_SESSION['iduch']; //��������
		$iddd=$_SESSION['idscience']; //��������
		$idddd=$_SESSION['b'];//��������
		print $idddd;
		require_once '../ConnectionToBase/connection.php';
		
		
		
			
		$ballsofuch=0;
		$sql='SELECT id, iduch,idscience,otvet1,otvet2 FROM otvets ORDER BY id';
		foreach($db->query($sql) as $row)
		{
			if ($row['iduch']==$idd) //���� ����� � ������� ������ ���������� ��������
			{
				if ($row['idscience']==$iddd) //������ ���� ����� � ���� ������ ����� ��� ��������� �������
				{
				//$_SESSION['iduch']=$row['id'];
				
					if ($row['otvet1']==5)
					{
							$ballsofuch++;
					}
					if ($row['otvet2']==5)
					{
							$ballsofuch++;
					}
					//print $ballsofuch;	
					if ($ballsofuch==2) 
					{
						$balls=5;
					}
					
					$flag=1;
					break;
					//break;//�������� �������� ����, ��� ��� � ������ ����� �������� ������ ��������� row['id'], � �� �������
				}
			}
		}
		
		if ($flag != NULL) 
		{
			//���� ������ �������, �� ��� ������� �������� ����� ������� � ��
			$db->exec("INSERT INTO balls (iduch,idscience,pervichball,testball) VALUES ('$idd','$iddd','$ballsofuch','$balls')");//��������
			//$db->exec("INSERT INTO otvets (finished) VALUES ('1')");
			
			$sql='SELECT id, finished FROM otvets ORDER BY id';
			foreach($db->query($sql) as $row)
			{
				if ($row['id']==$idddd) //���� ����� � ������� ������ ���������� ��������
				{
					$r1=1;
					//$db->exec("INSERT INTO otvets (finished) VALUES ('1')");//���� � ���� ������, ��� ������������ �������� ���������
					$stmt = $db->prepare("UPDATE otvets set finished = :finished where id=:id");
					$stmt->bindParam(':id', $idddd);
					$stmt->bindParam(':finished', $r1);
					//$id=$_SESSION['b'];
					//$otvet = "world";
					$stmt->execute();
				}
			}
			
			//session_start();
			//$_SESSION['iduch']=5;
			//$_SESSION['iduch']=$row['id'];//������ ������������ ��������� row['id']
			//Header("Location:../Avtorisation/SuccessAvtorisation.php");
		}			
		else
		{
			//Header("Location:../Avtorisation/ErrorAvtorisation.php");
		}	
		
	//*/
	
		
		
		
	}

?>

