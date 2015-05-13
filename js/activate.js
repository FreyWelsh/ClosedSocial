$(document).ready( function() {

	$('#btn-activate').click( function(e) {
		e.preventDefault();

		var formValue = {
			x: getQueryVariable("x"),
			y: getQueryVariable("y")
		};
		// $("#mybad").append(formValue.x);
		// $("#mybad").append(formValue.y);
		// var formValue = "name=" + $('#name').val() + "&email=" + $('#email').val();
		// formValue += "&pass" + $('#pass').val() + "&pass1" + $('#pass1').val();

		// var formValue = new FormData($('#registration-form')[0]);
		// formValue.append('view_type', 'addtemplate');

		$.ajax({ 
			url: "http://voyager.cs.bgsu.edu/cs3140rg/cs3140b2/project/php/activate.php",
			data: formValue,
			type: "post",
			dataType: "json",
			cache: false,
			// processData: false,
			// contentType: false,
			success: function(dataBack) {
				$('#btn-activate').fadeOut();
				var inserter = '';
				$.each(dataBack, function(index, object){
					inserter = "<div id=\"success\">";
					inserter += object;
					inserter += "</div>";
					$("#mybad").append(inserter);
				});
				$('#mybad').append('<a href="" class="forget" data-toggle="modal" data-target=".forget-modal">Forgot your password?</a>');
				$('#mybad').append('<a href="login.php" class="forget">Back to login</a>');
			},
			error: function(event, error, thirdparam) {
				$("#mybad").append('<div>ERROR REPORTED</div>');
				alert(error);
			}
		});

	});
});

// http://css-tricks.com/snippets/javascript/get-url-variables/
function getQueryVariable(variable)
{
       var query = window.location.search.substring(1);
       var vars = query.split("&");
       for (var i=0;i<vars.length;i++) {
               var pair = vars[i].split("=");
               if(pair[0] == variable){return pair[1];}
       }
       return(false);
}