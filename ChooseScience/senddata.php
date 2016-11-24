<?
	//$msg='world';
	//if (_POST["name"])=="John") 
	//{
		//header("Location:SuccessAvtorisation.php");
	//}
	require_once '../ConnectionToBase/connection.php';
	$db->exec("INSERT INTO Otvets (otvet) VALUES ('f')");
	//header("Location:../Avtorisation/SuccessAvtorisation.php");
?>


<?
	/*
	require_once '../ConnectionToBase/connection.php';
	$fuck="fuck";
	$db->exec("INSERT INTO Otvets (otvet) VALUES ('$fuck')");
	print $_POST['otvet'];
	*/
?>