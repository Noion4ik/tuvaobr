<html>
	<head>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
		<script type="text/javascript">
			$("#buttest").click(function(){
				alert("кнопка нажата");
				var a = $("#text1").val();
				var a = $("#text2").val();
				$.ajax({
					type="POST",
					url="test.php",
					data:({
						a: a,
						b: b
					}),
					beforesend: alert("Отправляем данные"),
					success: function(data){
						alert("Сумма="+data);}
					
				});
			});
		
		</script>
	</head>
	<body>
		<h1>Hellow world!</h1>
		a: <input type="text" id="text1" value="">
		b: <input type="text" id="text2" value="">
		<button id="buttest">Получить сумму</button>
		
		
		
		
	</body>
</html>