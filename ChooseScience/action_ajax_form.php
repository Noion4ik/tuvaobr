<?php
	session_start(); //otkrili sessiju добавил я
//if (isset($_POST["name"]) && isset($_POST["phonenumber"]) ) { 
if (isset($_POST["name"])) { 
	$_SESSION['a']=$_SESSION['a']+1;
	// Формируем массив для JSON ответа
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
	// Переводим массив в JSON
    //echo json_encode($result); 
	
	if ($_SESSION['a']==1) //если это первый ответ
	{
		require_once 'connection.php';//подключаемся к БД
		$db->exec("INSERT INTO otvets (otvet1,iduch,idscience) VALUES ('$global1','$global2','$global3')");//работает
		$id = $db->lastInsertId();//здесь работает
		//$db->exec("INSERT INTO otvets (iduch) VALUES ('$global2 ')");//и не забываем записать iduch по-другому id ученика
		
	}
	else
	{
	
		//дубль2 - ещё лучше вариант
		require_once 'connection.php';//подключаемся к БД
		$stmt = $db->prepare("UPDATE otvets set otvet1 = :otvet1 where id=:id");
		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':otvet1', $global1);
		$id=$_SESSION['b'];
		//$otvet = "world";
		$stmt->execute();
	}
	//session_start();
	$_SESSION['b']=$id; //ДАААА! получилось!      Для каждой новой перезагрузки сессия остается. поэтому эта переменная остается. почему эта штука не работала внутри if я не знаю. думаю особенность сессии
}

?>