 <html>
		<head>
			<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		</head>

		<body>
		   ������������!
			<!-- <p><strong>1. �� PHP � JavaScript:</strong></p> -->
<?
	/*               ����� ����������� ��������������� �������.  
	������� ������: �� ����� id ��������������� �������.
	���������: ���� � ������� ����������� (balls) ������ ��������������� ������� �� ��� id. ����� ���������� ������ � ��������� ������.
	�����: ����� ������� � ������ (�������, �������� ����, ���������)
	*/
	
	session_start();//��������� ������, ��� ��� ��� ��������� id ��������������� ������������, ����� ��������� ������� ��� �����������
		
	
	require_once '../ConnectionToBase/connection.php'; //������������ � ��
	
	$array = array();//�������������� ��������� ������	
	$curI=0;//�������������� �������� ���������� �������
	$curJ=0;
	
	$sql='SELECT id,iduch,idscience,pervichball,testball FROM balls ORDER BY id';//�������������� ������ �� ����������� ���� ������� ��� ������ ������
	foreach($db->query($sql) as $row) //������ ������ ������� balls ��������� �� ��������� ������ $row
	{
		if ($row['iduch']==$_SESSION['iduch'])//���� ������� ������ ����������� ��������������� ������������, �� ��������� ������ ������(��������) � ��������� ������(���������, ������ ��� ���������� ����� �������� �� ������ �����)
		{
				//������� ����������� ����������� ������ ������� � ������ � �� ����, ������� ����� �������
				$array[$curI][0]=$row['idscience'];
				$array[$curI][1]=$row['pervichball'];
				$array[$curI][2]=$row['testball'];
				
				//$avtorisationflag=1;
				$curI++; //�������� ��������� �������, �� ������� ���� ����������
		}
	}
	//print $array[1][1]; //������� ��� ��� �������� �������
?>

<?php
	//print $curI; //�������� ���������� �� ������ <?php ? > ��������, ��� ��� ��� ��������� � ����� html ���������  
	ini_set('display_errors',1);
	error_reporting(E_ALL);
	
	echo '<table border=2>';
 
	
	
	//$curI -- �� ��������, ��� ���-�� ����������� ��������� ��������� ���
	for($j=0;$j<=$curI;$j++) //���-�� ��������� �������� ������ ���� ����� ���-�� ��������� + 1 ������(�������� ��������)
	{
		echo '<tr>';
		for($i=0;$i<3;$i++)
		{
			if ($j==0) //���������� ������ ������ ������� � ������: �������, ��������� ����, �������� ����
			{
				//echo '<td>�����5</td>';
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
					echo '<td>�������� ������</td>';
				}
			}
			else //������������ ����� ������ ������ �������, ��� ��� ���������� ������ ��������� ������� 
			{
				echo '<td>' ,$array[$j-1][$i], '</td>';//����� ��������� ��������� ��������
				
				//echo '<td>������5</td>';
			}
		}
		echo '</tr>';
	}
 
	echo '</table>';
 
 
 
?>



</body>
</html>