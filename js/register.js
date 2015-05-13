/////////
// This is the javaScript to allow an ajax call to
//   the php page for registering users

$(document).ready( function() {

	$('#btn-register').click( function(e) {
		e.preventDefault();

		var formValue = {
			name: $('#name').val(),
			email: $('#email').val(),
			pass: $('#pass').val(),
			pass1: $('#pass1').val()
		};

		// var formValue = "name=" + $('#name').val() + "&email=" + $('#email').val();
		// formValue += "&pass" + $('#pass').val() + "&pass1" + $('#pass1').val();

		// var formValue = new FormData($('#registration-form')[0]);
		// formValue.append('view_type', 'addtemplate');

		$.ajax({ 
			url: "http://voyager.cs.bgsu.edu/cs3140rg/cs3140b2/project/php/register.php",
			data: formValue,
			type: "post",
			dataType: "json",
			cache: false,
			// processData: false,
			// contentType: false,
			success: function(dataBack) {
				$('#btn-register').fadeOut();
				var inserter = '';
				$.each(dataBack, function(index, object){
					inserter = "<div id=\"success\">";
					inserter += object;
					inserter += "</div>";
					$("#mybad").append(inserter);
					if(object.substring(0, 18) == 'That email address') {
						$('#registration-form').append('<a href="" class="forget" data-toggle="modal" data-target=".forget-modal">Forgot your password?</a>');
						$('#registration-form').append('<a href="login.html" class="forget">Back to login</a>');
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