     
<html>
		<head>
			
			<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script> <!--������� ����������� ���������� QJEURY -->
			<!--<link rel="stylesheet" type="text/css" href="indexfiles/indexstyle.css">-->
			
		</head>
<body>
<p><strong>1. �� PHP � JavaScript:</strong></p>
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
		
		
	
	$k=1;
?>

<!--
<script type="text/javascript">

var userName = '<?php echo $k;?>';
document.write('�������� PHP-����������: ' + userName);

</script>
-->
<?php
	ini_set('display_errors',1);
	error_reporting(E_ALL);
	
	echo '<table border=2>';
 
	for($j=0;$j<1;$j++)
	{
		echo '<tr>';
		for($i=0;$i<6;$i++)
		{
			if ($j==0) //���������� ������ ������ ������� � ������: ���� ��������, �������, ��������� ����, �������� ����, ������ ��������, ���������
			{
				//echo '<td>�����5</td>';
				if ($i==0)
				{
					echo '<td>���� ��������</td>';
				}					
				if ($i==0)
				{
					echo '<td>�������</td>';
				}
				if ($i==0)
				{
					echo '<td>��������� ����</td>';
				}
				if ($i==0)
				{
					echo '<td>�������� ����</td>';
				}
				if ($i==0)
				{
					echo '<td>������ ��������</td>';
				}
				if ($i==0)
				{
					echo '<td>���������</td>';
				}
				
				
				
				
			}
			else
			{
				echo '<td>������5</td>';
			}
		}
		echo '</tr>';
	}
 
	echo '</table>';
 
 
 
?>



</body>
</html>