<!DOCTYPE html>
	<html lang="ru">
		<head>
			<meta charset="utf-8" />
			<link rel="stylesheet" href="css/main.css" type="text/css" media="all" />
			<link rel="stylesheet" href="css/demopage.css" type="text/css" media="all" />
			<script src="js/jquery.min.js" type="text/javascript"></script>
			
			<script type="text/javascript">
			
			$(document).ready(function() {
				$("#btnCreateLogin").click(
					function(){
						alert("вы нажали кнопку!");
						$(".CreateLogin").show();
						$("#svernformLogin").show();
						return false; 
					}
				);
			});
			
			//функция скрытия блока регистрации
			$(document).ready(function() {
				$("#btnTurnformLogin").click(
					function(){
						alert("вы нажали кнопку свернуть!");
						$(".CreateLogin").hide();
						$("#svernformLogin").hide();
						
						//$("kv2").hide();
						//$("#kv2").css("display", "none;"); 
						return false; 
					}
				);
			});
			
			
			
			
			
			
			$( document ).ready(function() { //без этой штуки не работает
				$('#btnSendLogin').click( function() {
					var result_form='result_form';
					alert("Отправляем данные на сервер");
					$.ajax({
						type: 'POST',
						url: 'response.php?action=sample2',
							//'response.php?action=sample5',
						dataType: "html", //формат данных
						data: //'name=Andrew&nickname=Aramis',
							$("#formLogin").serialize(),
					
						success: function(data){
						$('.CreateLogin').html(data);
					/*
					 success: function(response) { //Данные отправлены успешно
        	result = jQuery.parseJSON(response);
        	document.getElementById(result_form).innerHTML = "Имя: "+result.name+"<br>Телефон: "+result.phone;
    	},*/
						},
					});

				});
			});
			
			
			
			//новая функция вывод формы
			$(document).ready(function() {
				$("#btnAvtorisationLogin").click(
					function(){
						$(".AvtorisationLogin").show();
						$("#svernformAvtorisation").show();
						return false; 
					}
				);
			});
			
			//функция скрытия формы авторизации
			$(document).ready(function() {
				$("#btnTurnformAvtorisation").click(
					function(){
						alert("вы нажали кнопку свернуть!");
						$(".AvtorisationLogin").hide();
						$("#svernformAvtorisation").hide();
						return false; 
					}
				);
			});
			
			//функция авторизации
			$( document ).ready(function() { //без этой штуки не работает
				$('#SendLoginForAvtorisation').click( function() {
					var result_form='result_form';
					alert("Отправляем данные на сервер");
					$.ajax({
						type: 'POST',
						url: 'response.php?action=sample1',
							//'response.php?action=sample5',
						dataType: "html", //формат данных
						data: //'name=Andrew&nickname=Aramis',
							$("#formAvtorisation").serialize(),
					
						success: function(data){
						//$('.AvtorisationLogin').html(data);
						alert("вывод блока вопросов");
						$(".AvtorisationBlock").hide();
						$('.AvtorisationBlock2').show();
						$('.AvtorisationBlock2').html(data);
					/*
					 success: function(response) { //Данные отправлены успешно
        	result = jQuery.parseJSON(response);
        	document.getElementById(result_form).innerHTML = "Имя: "+result.name+"<br>Телефон: "+result.phone;
    	},*/
						},
					});

				});
			});
			
			
			</script>
			
			
			
			
			
			
			</script>
		</head>
		<body>
			<header> <!--шапка сайта -->
				<h2>Мониторинг качества образования</h2>
				<a href="http://www.monrt.ru" class="stuts" target="_blank">Министерство образования Республики Тыва<span>MONRT.COM</span></a>
			</header>
		
			<!--######-->
			<div class="AvtorisationBlock"><!-- зона отображения блока авторизации и регистрации на веб-сервисе-->
				<center>
					<input type="button" id="btnAvtorisationLogin" value="Я имею аккаунт" />
					<input type="button" id="btnCreateLogin" value="Я не имею аккаунт" />
				</center>
				
				<div class="CreateLogin"> <!-- невидимый блок регистрации нового пользователя -->
					<form id="formLogin">
						<center><h2> Регистрация пользователя</h2></center>
						<input type="text" name="name" placeholder="Ваш логин" required /><br />
						<input type="text" name="password" placeholder="Ваш пароль" required /><br />
						<input type="button" id="btnSendLogin" value="Отправить" /><br />
					</form>
				</div>
				
				<div id="svernformLogin"> <!-- кнопка, которая позволит свернуть блок регистрации-->
					<input type="button" id="btnTurnformLogin" value="свернуть" /><br />
				</div>
				
				<div class="AvtorisationLogin"> <!--блок авторизации пользователя на веб-сервисе-->
					<form id="formAvtorisation">
						<center><h4> Авторизация пользователя</h4></center>
						<input type="text" name="name" placeholder="Ваш логин" required /><br />
						<input type="password" name="phone" placeholder="Ваш пароль" required /><br />
						<input type="button" id="SendLoginForAvtorisation" value="Отправить" /><br />
					</form>
				</div>
				
				<div id="svernformAvtorisation"> <!-- кнопка, которая позволит свернуть блок авторизации-->
					<input type="button" id="btnTurnformAvtorisation" value="свернуть" /><br />
				</div>
			</div>
			<!--#######-->
			
			<!--вывод вопросов в этот блок-->
			<div class="AvtorisationBlock2">
				
			
			
			</div>
			
			
			
			
			
		</body>
  </html>
 
 
  