<?php

switch ($_REQUEST['action']) {
    case 'sample1':
        //echo 'Пример 1 - передача завершилась успешно';
        require_once '/home/u212600510/public_html//ConnectionToBase/connection.php';
		
		$name=$_POST["name"];
		$password=$_POST["password"];
		
		$sql='SELECT id, name, password FROM users ORDER BY id';
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
		
		
		break;
    case 'sample2':
        
		//echo 'Пример 2 - передача завершилась успешно. Параметры: name = ' . $_POST['name'] . ', nickname= ' . $_POST['phone'];
        //$global=$_POST['name'];
		require_once '/home/u212600510/public_html//ConnectionToBase/connection.php';//вход в бд при помощи PDO
		
		//проверка на занятость логина
		$name = $_POST["name"];
		$password = $_POST["password"];
		$sqltmp='SELECT name FROM users ORDER BY id';//создаем запрос, который пройдет по всем строкам таблицы
		foreach($db->query($sqltmp) as $row)//прочитываем всю таблицу
		{
			if ($row['name']==$name)//если обнаружим такую же запись, то выводим ошибку. а также меняем флаг.
			{
				//нельзя пользоваться выводом текста из-за того, что у нас есть переход
				//print "This name is busy"; 
				$flagisbusy=1;
			}
		}
		if ($flagisbusy==1) { //если есть такая же запись, то выводим текст, что уже логин занят
			echo 'Аккаунт с именем ' . $_POST['name'] . ' уже существует';
		}
		
	//если не нашли похожих записей, то добавляем пользователя
	if ($flagisbusy==0)
		{
			$db->exec("INSERT INTO users (name,password) VALUES ('$name','$password')");
			echo 'Аккаунт с именем ' .$_POST['name']. ' успешно создан. Пожалуйса, попробуйте авторизоваться под своим созданным аккаунтом.';
		}
		break;
    case 'sample3':
        echo "$('.results').html('Пример 3 - Выполнение JavaScript');";
        break;
    case 'sample4':
        header ('Content-Type: application/xml; charset=UTF-8');

        echo <<<XML
<?xml version='1.0' standalone='yes'?>
<items>
<item>Пункт 1</item>
<item>Пункт 2</item>
<item>Пункт 3</item>
<item>Пункт 4</item>
<item>Пункт 5</item>
</items>
XML;
        break;
    /*case 'sample5':
        $aRes = array('name' => 'Andrew', 'nickname' => 'Aramis');

        require_once('Services_JSON.php');
        $oJson = new Services_JSON();
        echo $oJson->encode($aRes);
        break;
		*/
		case 'sample5':
        require_once '../ConnectionToBase/connection.php';
		$global='world';
		$db->exec("INSERT INTO users (name) VALUES ('$global')");
		if (isset($_POST["name"]) && isset($_POST["phone"]) ) { 

		require_once '../ConnectionToBase/connection.php';
		$global='world';
		$db->exec("INSERT INTO users (name) VALUES ('$global')");
	
	// Формируем массив для JSON ответа
    
	$result = array(
    	'name' => $_POST["name"],
    	'phone' => $_POST["phone"]
    ); 

    // Переводим массив в JSON
    echo json_encode($result); 
}
        break;
}

?>