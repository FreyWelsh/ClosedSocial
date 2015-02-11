function showPassword() {
    
    var key_attr = $('#key').attr('type');
    
    if(key_attr != 'text') {
        
        $('.checkbox').addClass('show');
        $('#key').attr('type', 'text');
        
    } else {
        
        $('.checkbox').removeClass('show');
        $('#key').attr('type', 'password');
        
    }
    
}

// (function () {
	
// 	scrollConverter.activate();

// }());

$(document).ready(function() {

        $('#btn-login').click( function(e) {
            e.preventDefault();

            var formValue = {
                email: $('#email').val(),
                pass: $('#key').val()
            };
  

            $.ajax({ 
                url: "http://voyager.cs.bgsu.edu/cs3140rg/cs3140b2/project/php/login.php",
                data: formValue,
                type: "post",
                dataType: "json",
                cache: false,
                // processData: false,
                // contentType: false,
                success: function(dataBack) {
                    // $('#btn-login').fadeOut();
                    var inserter = '';
                    $.each(dataBack, function(index, object) {
                    	//******* Special case for our current redirect
                    	//    could be more robust with a regex if we want to redirect
                    	//    anywhere else in the future
                    	if(object.substring(0, 5) == 'mainP') {

                    		window.location = object;
                    	}
                    	else {
	                        inserter = "<div id=\"success\">";
	                        inserter += object;
	                        inserter += "</div>";
	                        $("#mybad").append(inserter);
	                    }
                    });
                },
                error: function(event, error, thirdparam) {
                    $("#mybad").append('<div>ERROR REPORTED</div>');
                    alert(error);
                }
            });

        });
});
