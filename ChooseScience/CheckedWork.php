<?
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		session_start();
		$idd=$_SESSION['iduch']; //работает
		$iddd=$_SESSION['idscience']; //работает
		$idddd=$_SESSION['b'];//работает
		print $idddd;
		require_once '../ConnectionToBase/connection.php';
		
		
		
			
		$ballsofuch=0;
		$sql='SELECT id, iduch,idscience,otvet1,otvet2 FROM otvets ORDER BY id';
		foreach($db->query($sql) as $row)
		{
			if ($row['iduch']==$idd) //если нашли в таблице строку требуемого человека
			{
				if ($row['idscience']==$iddd) //дальше ищем чтобы в этой строке также был требуемый предмет
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
					//break;//пришлось брейкать цикл, так как в сессию можно записать только последний row['id'], а не текущий
				}
			}
		}
		
		if ($flag != NULL) 
		{
			//если работа оценена, то нам следует записать баллы ученика в БД
			$db->exec("INSERT INTO balls (iduch,idscience,pervichball,testball) VALUES ('$idd','$iddd','$ballsofuch','$balls')");//работает
			//$db->exec("INSERT INTO otvets (finished) VALUES ('1')");
			
			$sql='SELECT id, finished FROM otvets ORDER BY id';
			foreach($db->query($sql) as $row)
			{
				if ($row['id']==$idddd) //если нашли в таблице строку требуемого человека
				{
					$r1=1;
					//$db->exec("INSERT INTO otvets (finished) VALUES ('1')");//флаг в базе данных, что пользователь закончил испытание
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
			//$_SESSION['iduch']=$row['id'];//запись брейканутого успешного row['id']
			//Header("Location:../Avtorisation/SuccessAvtorisation.php");
		}			
		else
		{
			//Header("Location:../Avtorisation/ErrorAvtorisation.php");
		}	
		
	//*/
	
		
		
		
	}

?>

