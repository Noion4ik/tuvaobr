$( document ).ready(function() {
    $("#btn").click(
		function(){
			alert("�� ������ ������");
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
    alert("��������� ������");
	jQuery.ajax({
        /*
		<?
			session_start();
			$_SESSION['dd']=n;
		?>
		*/
		
		url:     url, //url �������� (action_ajax_form.php)
        type:     "POST", //����� ��������
        dataType: "html", //������ ������
        //data: jQuery("#"+ajax_form).serialize(),  // ����������� ������
        data: jQuery("#" + ajax_form).serialize(),//������������ ��������� �������� � ������������������ ����
		
		/*
		success: function(response) { //������ ���������� �������
        	result = jQuery.parseJSON(response);
        	document.getElementById(result_form).innerHTML = "���: "+result.name+"<br>�������: "+result.phonenumber;
    	},
    	error: function(response) { // ������ �� ����������
    		document.getElementById(result_form).innerHTML = "������. ������ �� �����������.";
    	}
		*/
 	});
}