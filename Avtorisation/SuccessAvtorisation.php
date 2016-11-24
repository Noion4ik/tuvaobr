<html>
	<head>
	     <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		 <!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>--> <!--не стоит занова загружать, так как содержимое этого файла полностью отображается в index.php -->
		 
		 <!--не загружили файл c css, так как содержимое этого файла полностью загружается в корневой файл index.php, где видимо заново все инициализируется,поэтому даже сохраняются все обьекты -->
		 <script type="text/javascript">
			function addEffect1(){
				$("#kv1:hidden").show();
			}
			
			$(document).ready(function() {
				$("#btnOKavtorisation").click(function(){
						alert("вы нажали кнопку ок!");
						$.ajax({
						type: 'POST',
						url: '/Avtorisation/ShowResults.php',
							//'response.php?action=sample5',
						dataType: "html", //формат данных
						data: 'name=Andrew&nickname=Aramis',
							//$("#formAvtorisation").serialize(),
					
						success: function(data){
							//$('.AvtorisationBlock2').html(data);
							$('#k999').html(data);
						},
						});
					
					
					});
				});
			
			$(document).ready(function() {
				$("#btnOkBeginTest").click(function(){
						alert("вы нажали кнопку ок!");
						$.ajax({
						type: 'POST',
						url: '/ChooseScience/ChooseScience.php',
							//'response.php?action=sample5',
						dataType: "html", //формат данных
						data: 'name=Andrew&nickname=Aramis',
							//$("#formAvtorisation").serialize(),
					
						success: function(data){
							//$('.AvtorisationBlock2').html(data);
							$("#blockofvopros").hide();
							$('#k999').html(data);
							//$('.AvtorisationBlock3').html(data);
						},
						});
					
					
					});
				});


			
			
		 </script>
	</head>
	
	<body>
		
		<div id="blockofvopros">
			<form method="POST" action=../ChooseScience/ChooseScience.php> 
				<center>
					<font color="#00FF7F"><h2> Вы прошли авторизацию! Выберите предмет!</h2> </font>
					<input type="button" id="btnOkBeginTest" name ="okbutton" value ="OK">
				</center>
			</form>
			<!--<form method="POST" action=../ChooseScience/ShowResults.php>--> 
			<center>
				<font color="#00FF7F"><h2> Вы прошли авторизацию! Посмотреть мои оценки</h2> </font>
				<input type="button" id="btnOKavtorisation" name ="okbutton" value ="OK">
				<!--<input type="submit" id="btnOKavtorisation" name ="okbutton" value ="OK">-->
				<!--<input type="button" id="btnSendLogin" value="Отправить"-->
			</center>
			<!--</form>-->
			<!--<div id="kv1" >1</div>-->
		</div>
			<!--<button  onclick="addEffect1()">Эффект Show()</button>-->
		
		<div id="k999"></div> <!--блок отображения вопросов -->
		
		
		
	</body>
</html>