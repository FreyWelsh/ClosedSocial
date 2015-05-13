//this will eventually be replaced, but it is the JS validation for testing.
<<<<<<< HEAD
=======

>>>>>>> f50cfe925fac0b8a8d4a88600f6d34a22c4af06b
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

<<<<<<< HEAD
//simple alert, no js validation, will be done on backend
=======
<<<<<<< HEAD
// function register(){
// 	alert ("Welcome, we now have all of your information");
// 	window.location = "http://voyager.cs.bgsu.edu/cs3140rg/cs3140d1/ClosedSocial/mainP.html";
// 	return false;
// }
=======

//simple alert, no js validation, will be done on backend

>>>>>>> f50cfe925fac0b8a8d4a88600f6d34a22c4af06b
function register(){
	alert ("Welcome, we now have all of your information");
	window.location = "http://voyager.cs.bgsu.edu/cs3140rg/cs3140d1/ClosedSocial/mainP.html";
	return false;
}
<<<<<<< HEAD

// this was the code to process the modal, I am not sure if it is helpful at all since you are going to write the method
=======
>>>>>>> origin/master

// this was the code to process the modal, I am not sure if it is helpful at all since you are going to write the method

>>>>>>> f50cfe925fac0b8a8d4a88600f6d34a22c4af06b
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

<<<<<<< HEAD
//this is the filler text for a new thread. not completely useful or useless in it's current form
=======

//this is the filler text for a new thread. not completely useful or useless in it's current form

>>>>>>> f50cfe925fac0b8a8d4a88600f6d34a22c4af06b
function newthread(){
	$('<div class = "detailBox"></div>').html(
        '<div class="titleBox">' +
          '<label id ="subject1">Thread Title</label>' +
            '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>' +
        '</div>' +
<<<<<<< HEAD
=======

        '<div class="commentBox threadBack">' +        
            '<p class="taskDescription">Description of the Thread</p>' +
        '</div>' +

>>>>>>> f50cfe925fac0b8a8d4a88600f6d34a22c4af06b
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

<<<<<<< HEAD
//for login screen, show password radio
=======

//for login screen, show password radio

>>>>>>> f50cfe925fac0b8a8d4a88600f6d34a22c4af06b
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

<<<<<<< HEAD
=======

>>>>>>> f50cfe925fac0b8a8d4a88600f6d34a22c4af06b
// This doesn't do anything at all, but might be helpful sometime so I kept it.
function createThread() {
    // var panels = $('.vote-results');
    // var panelsButton = $('.dropdown-results');
    // panels.hide();

    // //Click dropdown
    // panelsButton.click(function() {
    //     //get data-for attribute
    //     var dataFor = $(this).attr('data-for');
    //     var idFor = $(dataFor);

    //     //current button
    //     var currentButton = $(this);
    //     idFor.slideToggle(400, function() {
    //         //Completed slidetoggle
    //         if(idFor.is(':visible'))
    //         {
    //             currentButton.html('Hide Results');
    //         }
    //         else
    //         {
    //             currentButton.html('View Results');
    //         }
    //     })
    // });
}

//most of this was for horizontal scrolling, but now it just declares an onclick event
<<<<<<< HEAD
=======

>>>>>>> f50cfe925fac0b8a8d4a88600f6d34a22c4af06b
window.onload = function() {
	// var path = document.title;
	// path = path.substr(path);
	// if (path == "Closed Social"){
	// 	(function () {
	// 		scrollConverter.activate();
	// 	}());
	// }
	document.getElementById("addbut").click = newthread;
<<<<<<< HEAD
=======
    $(".clickableRow").click(function(){
        window.document.location = $(this).attr("href");
    });
>>>>>>> f50cfe925fac0b8a8d4a88600f6d34a22c4af06b

}