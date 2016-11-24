function addotvet1(){
  //$("#kk1").css("background-color", "blue");
  
  $.ajax({
  type: "POST",
  url: "senddata.php",
  data: "name=John&location=Boston",
  //success: function(msg){
    //alert( "Прибыли данные: " + msg );
  }
});
 }

 /*
 function addotvet1(){
  
  //$("#kk1").css("background-color", "blue");
  $.ajax({
	 type: "GET",
	 url: "test.js",
	 dataType: "script"
   });
 }
 //рабочий код
 */


