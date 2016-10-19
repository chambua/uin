$("input[type='tel']").on("keydown",function(e)
{
	if(e.which!=37 && e.which!=39 && e.which!=8 && e.which!=127 && !(e.which>=48 && e.which<=58)){
		$(this).val().replace(String.fromCharCode(e.which),"");
		e.preventDefault(); 
	}
	if($(this).val().length>=9){
		 $(this).val($(this).val().substring(0,9));
	}
	
	//if((e.which>=48 && e.which<=58))$(this).val($(this).val()+String.fromCharCode(e.which)
 })
 