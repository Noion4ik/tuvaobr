<?php
	session_start(); //otkrili sessiju ������� �
//if (isset($_POST["name"]) && isset($_POST["phonenumber"]) ) { 
if (isset($_POST["name"])) { 
	$_SESSION['a']=$_SESSION['a']+1;
	// ��������� ������ ��� JSON ������
   /*
   $result = array(
    	'name' => $_POST["name"],
    	'phonenumber' => $_POST["phonenumber"]
    );
    */	
	$global1 = $_POST["name"];
    $global2 = $_SESSION['iduch'];
	$global3 = $_SESSION['idscience'];
	//$global3 = $_POST["number"];
	//$global2 = 3;
	// ��������� ������ � JSON
    //echo json_encode($result); 
	
	if ($_SESSION['a']==1) //���� ��� ������ �����
	{
		require_once 'connection.php';//������������ � ��
		$db->exec("INSERT INTO otvets (otvet1,iduch,idscience) VALUES ('$global1','$global2','$global3')");//��������
		$id = $db->lastInsertId();//����� ��������
		//$db->exec("INSERT INTO otvets (iduch) VALUES ('$global2 ')");//� �� �������� �������� iduch ��-������� id �������
		
	}
	else
	{
	
		//�����2 - ��� ����� �������
		require_once 'connection.php';//������������ � ��
		$stmt = $db->prepare("UPDATE otvets set otvet1 = :otvet1 where id=:id");
		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':otvet1', $global1);
		$id=$_SESSION['b'];
		//$otvet = "world";
		$stmt->execute();
	}
	//session_start();
	$_SESSION['b']=$id; //�����! ����������!      ��� ������ ����� ������������ ������ ��������. ������� ��� ���������� ��������. ������ ��� ����� �� �������� ������ if � �� ����. ����� ����������� ������
}

?>