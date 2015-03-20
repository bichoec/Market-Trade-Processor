/**=============================================================================
 *
 *	Filename:  function.js
 *	
 *	(c)Autor: Eric Guzman
 *	
 *	Description: all fuctions 
 *	
 *	
 *===========================================================================**/

$(document).ready(function(){
$('#submit').click(function(){

			if ( $('#login_username').val() != "" && $('#login_userpass').val() != "" ){
				
				$.ajax({
					type: 'POST',
					cache:false,
					url: 'WS/wsATw.php',
					data: 'login_username=' + $('#login_username').val() + '&login_userpass=' + $('#login_userpass').val(),
					beforeSend: function(){
							$('#espera').html('<img src="images/loader.gif"/> Processing data..');							
						},
					success:function(msj){
						if ( msj == 'Correcto' ){
							window.location.href = "main/";
							
						}
						else{
							alert('Username or password are incorrect');
						}
						$('#espera').html('');
					},
					error:function(xhr, ajaxOptions, thrownError){
						
						alert('Login error');
						
					}
				});
				
			}
			else{
				alert("All values are required");
			}
});
	
	
	
$('#logout').click(function(){
		window.location.href = "../conn/logout.php";
});

$('#to').change(function(){

	
//$('#send').click(function(){

			if ( $('#val_from').val() != "" ){
				$( "#normal" ).hide(1000);
				$( "#confirm" ).show(1000);
				$.ajax({
					type: 'POST',
					cache:false,
					url: '../WS/processor.php',
					data: 'op=0&val_from=' + $('#val_from').val() + '&from=' + $('#from').val()+ '&to=' + $('#to').val(),
					beforeSend: function(){
							$('#espera').html('<img src="../images/loader.gif"/> Processing data..');							
						},
						dataType: "json",
					success:function(msj){
						if ( msj != '{::}' ){
							$("#val_from_cf").val(msj.amountSell);
							$("#from_cf").html(msj.currencyFrom);
							$("#val_to_cf").val(msj.amountBuy);
							$("#to_cf").html(msj.currencyTo);
							$("#rate").html(msj.rate);
							$("#org_country").val(msj.originatingCountry);
							$("#user").val(msj.UserId);
						}
						else{
							alert('No data');
						}
						$('#espera').html('');
						
					},
					error:function(xhr, ajaxOptions, thrownError){
						
						alert('error');
						
					}
				});
				
			}
			else{
				alert("All values are required");
			}
});	

$( "#confirm" ).hide();
$( "#history" ).hide();

$('#ini').click(function(){
			$( "#history" ).hide();
$( "#start" ).show();			  
						  });

$('#his').click(function(){
			$( "#start" ).hide();
$( "#history" ).show();			  
						  });

$('#save').click(function(){
	
				$.ajax({
					type: 'POST',
					cache:false,
					url: '../WS/processor.php',
					data: 'op=1&val_from=' + $('#val_from').val() + '&from=' + $('#from').val()+ '&to=' + $('#to').val()+ '&user=' + $('#user').val(),
					beforeSend: function(){
							$('#espera_confirm').html('<img src="../images/loader.gif"/> Submiting data..');							
						},
					success:function(msj){
						if ( msj == true ){
							alert("Data saved");
							$( "#confirm" ).hide(1000);
							$( "#normal" ).show(1000);
				
						}
						else{
							alert('Error while saving data');
						}
						$('#espera_confirm').html('');
						
					},
					error:function(xhr, ajaxOptions, thrownError){
						
						alert('error');
						
					}
				});
				
			
			
});	

$('#cancel').click(function(){
						  $( "#confirm" ).hide(1000);
							$( "#normal" ).show(1000);
							window.location.href = "";
						  });
	
});
