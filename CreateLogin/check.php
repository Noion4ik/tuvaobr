<?
	//���������� � �����
	$name = $_POST[name];
	$family = $_POST[family];
	$daddy = $_POST[daddy];
	
	require_once '../ConnectionToBase/connection.php';//������������ � ��
	
	//������� �������� �� ������������� ������
	function login_busy($off)
	{
			
	}	
	
	//�������� �� ��������� ������
		$sqltmp='SELECT name FROM users ORDER BY id';//������� ������
		foreach($db->query($sqltmp) as $row)//����������� ��� �������
		{
			if ($row['name']==$name)//���� ��������� ����� �� ������, �� ������� ������. � ����� ������ ����.
			{
				//������ ������������ ������� ������ ��-�� ����, ��� � ��� ���� �������
				//print "This name is busy"; 
				$flagisbusy=1;
			}
		}
		if ($flagisbusy==1) { //���� ���� ����� �� ������, �� ��������� �� ������� ��������
			Header("Location:../index.php");
		}
		
	//���� ��� ����������, �� ��������� ������������
	if ($flagisbusy==0) {
	$db->exec("INSERT INTO users (name) VALUES ('$name')");
	print "You have created login";
	}
?>
<html>
	<head>
	</head>
	
	<body>
		<form method="POST" action=../index.php> 
			<input type="submit" name ="okbutton" value ="OK">
		</form>
	</body>
</html>







