
	$.ajax({
		url:'loadlocation.php',
		type:'post',
		dataType:'html',
		success: function(data){
			$('#location').html(data);
			
		}
		
	});
	
	

	
