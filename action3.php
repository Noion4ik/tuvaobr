<?php
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$name = $_POST['name'];
			echo "$name";
			require_once 'connection.php';
			
			$db->exec("INSERT INTO Otvets (otvet) VALUES ('$name')");
			
			$name=5;
			//функция проверки
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
			//далее
			
			require_once 'php/PHPExcel.php'; // Подключаем библиотеку PHPExcel
			$phpexcel = new PHPExcel(); // Создаём объект PHPExcel
			/* Каждый раз делаем активной 1-ю страницу и получаем её, потом записываем в неё данные */
			$page = $phpexcel->setActiveSheetIndex(0); // Делаем активной первую страницу и получаем её
			$page->setCellValue("A1", "$name"); // Добавляем в ячейку A1 слово "Hello"
			$page->setCellValue("A2", "World!"); // Добавляем в ячейку A2 слово "World!"
			$page->setCellValue("B1", "MyRusakov.ru"); // Добавляем в ячейку B1 слово "MyRusakov.ru"
			$page->setTitle("Test"); // Ставим заголовок "Test" на странице
			/* Начинаем готовиться к записи информации в xlsx-файл */
			$objWriter = PHPExcel_IOFactory::createWriter($phpexcel, 'Excel2007');
			/* Записываем в файл */
			$objWriter->save("test.xlsx");
		
			
			
}
?>