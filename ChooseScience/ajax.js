$( document ).ready(function() {
    $("#btn").click(
		function(){
			alert("вы нажали кнопку");
			sendAjaxForm('result_form', 'ajax_form', 'action_ajax_form.php',0);
			return false; 
		}
	);
});

$( document ).ready(function() {
    $("#btn1").click(
		function(){
			sendAjaxForm('result_form', 'ajax_form1', 'action_ajax_form1.php',1);
			return false; 
		}
	);
});
 
function sendAjaxForm(result_form, ajax_form, url, n) {
    alert("отправили данные");
	jQuery.ajax({
        /*
		<?
			session_start();
			$_SESSION['dd']=n;
		?>
		*/
		
		url:     url, //url страницы (action_ajax_form.php)
        type:     "POST", //метод отправки
        dataType: "html", //формат данных
        //data: jQuery("#"+ajax_form).serialize(),  // Сеарилизуем объект
        data: jQuery("#" + ajax_form).serialize(),//сериализация введенной значения в последовательность байт
		
		/*
		success: function(response) { //Данные отправлены успешно
        	result = jQuery.parseJSON(response);
        	document.getElementById(result_form).innerHTML = "Имя: "+result.name+"<br>Телефон: "+result.phonenumber;
    	},
    	error: function(response) { // Данные не отправлены
    		document.getElementById(result_form).innerHTML = "Ошибка. Данные не отправленны.";
    	}
		*/
 	});
}