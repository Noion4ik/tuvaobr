<?php
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$name = $_POST['name'];
			echo "$name";
			require_once 'connection.php';
			
			$db->exec("INSERT INTO Otvets (otvet) VALUES ('$name')");
			
			$name=5;
			//������� ��������
			$sql1='SELECT otvet1 FROM etalon ORDER BY id';
			foreach($db->query($sql1) as $row)
			{
				if ($row['otvet1']==$name)
				{
					print "success proverka";
					$GLOBAL3=$row['otvet1'];
					//$GLOBAL1=$row['name'];
					//$question1=$row['question1'];
					
				}
			
			
			//print $row['id'] . "\t";
			//print $row['name'] . "\n";
			
			}
			
			$name=$row['otvet1'];
			print"olol";
			print $GLOBAL3;
			//�����
			
			require_once 'php/PHPExcel.php'; // ���������� ���������� PHPExcel
			$phpexcel = new PHPExcel(); // ������ ������ PHPExcel
			/* ������ ��� ������ �������� 1-� �������� � �������� �, ����� ���������� � �� ������ */
			$page = $phpexcel->setActiveSheetIndex(0); // ������ �������� ������ �������� � �������� �
			$page->setCellValue("A1", "$name"); // ��������� � ������ A1 ����� "Hello"
			$page->setCellValue("A2", "World!"); // ��������� � ������ A2 ����� "World!"
			$page->setCellValue("B1", "MyRusakov.ru"); // ��������� � ������ B1 ����� "MyRusakov.ru"
			$page->setTitle("Test"); // ������ ��������� "Test" �� ��������
			/* �������� ���������� � ������ ���������� � xlsx-���� */
			$objWriter = PHPExcel_IOFactory::createWriter($phpexcel, 'Excel2007');
			/* ���������� � ���� */
			$objWriter->save("test.xlsx");
		
			
			
}
?>