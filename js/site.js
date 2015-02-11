
function validate(){
	var username = document.getElementById("email").value;
	var password = document.getElementById("key").value;
	if ( username == "twelsh@me" && password == "twelsh"){
		alert ("Login successfully");
		window.location = "http://voyager.cs.bgsu.edu/cs3140rg/cs3140d1/ClosedSocial/mainP.html"; // Redirecting to other page.
		return false;
	}
	else{
		alert("Incorrect Username/Password");
		document.getElementById("username").disabled = true;
		document.getElementById("password").disabled = true;
		document.getElementById("submit").disabled = true;
		return false;

	}
}

// function register(){
// 	alert ("Welcome, we now have all of your information");
// 	window.location = "http://voyager.cs.bgsu.edu/cs3140rg/cs3140d1/ClosedSocial/mainP.html";
// 	return false;
// }


// $("button#submit").click(function(){
// 	$.ajax({
// 	    type: "POST",
// 		url: "process.php",
// 		data: $('form.contact').serialize(),
//     	success: function(msg){
//        		$("#thanks").html(msg);
//       		$("#form-content").removeClass('hide'); 
//     	 },
// 			error: function(){
// 				alert("failure");
// 			}
//     });
// });

function newthread(){
	$('<div class = "detailBox"></div>').html(
        '<div class="titleBox">' +
          '<label id ="subject1">Thread Title</label>' +
            '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>' +
        '</div>' +
        '<div class="commentBox threadBack">' +        
            '<p class="taskDescription">Description of the Thread</p>' +
        '</div>' +
        '<div class = "threadBack">' +
            '<div class="actionBox">' +
                '<ul class="commentList">' +
                    '<li>' +
                        '<div class="commenterImage">' +
                          '<img src="" />' +
                        '</div>' +
                        '<div class="commentText">' +
                            '<p class="">Fillert OP</p> <span class="date sub-text"></span>' +
                        '</div>' +
                    '</li>' +
                    '<hr class = "hr"/>' +
                    '<li>' +
                        '<div class="commenterImage">' +
                          '<img src="" />' +
                        '</div>' +
                        '<div class="commentText">' +
                            '<p class="">First Response</p> <span class="date sub-text"></span>' +
                        '</div>' +
                    '</li>' +
                    '<hr class = "hr"/>' +
                    '<li>' +
                        '<div class="commenterImage">' +
                          '<img src="" />' +
                        '</div>' +
                        '<div class="commentText">' +
                            '<p class="">Most receent response</p> <span class="date sub-text"></span>' +
                        '</div>' +
                    '</li>' +
                '</ul>' +
                '<form class="form-inline" role="form">' +
                    '<div class="form-group">' +
                        '<input class="form-control" type="text" placeholder="Your comments" />' +
                    '</div>' +
                    '<div class="form-group">' +
                        '<button class="btn btn-default">Add</button>' +
                    '</div>' +
                '</form>' +
           '</div>' +
        '</div>').appendTo('#threads');
}

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

window.onload = function() {
	// var path = document.title;
	// path = path.substr(path);
	// if (path == "Closed Social"){
	// 	(function () {
	// 		scrollConverter.activate();
	// 	}());
	// }
	document.getElementById("addbut").click = newthread;

}