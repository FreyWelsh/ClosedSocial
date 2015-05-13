///
// PROGRAMMERS: Joshua T. Frey, Terrence H. Welsh
// This file contains the javascript to generate the main page
//  of the site
//

////////////
// loadThreads calls the php to display threads that are currently in the database
//   and writes them to the window
function loadThreads(  ) {
	//because I don't want to have to think about what I'm really supposed to
	//  do to fix this error
	var formValue = {}

	$.ajax({ 
		url: "http://voyager.cs.bgsu.edu/cs3140rg/cs3140b2/project/php/returnThreads.php",
		data: formValue,
		type: "post",
		dataType: "json",
		cache: false,
		// processData: false,
		// contentType: false,
		success: function(dataBack) {
			$("#threads").html("");
			var inserter = '';
			$.each(dataBack, function(index, object){

				inserter = "<form id=\"" + object.thread_id + "\">";
				inserter += "<h3>" + object.name + "</h3><small>" + object.post_date + "</small>";
				inserter += "<hr />";
				inserter += "<p>" + object.content + "<p>";

				inserter += '<button type=\"button\" class=\"btn-expand btn btn-default\" >Expand</button>';
				inserter += "</form>";
				$("#threads").append(inserter);
				
			});
			$('.btn-expand').on("click", showMore );
		},
		error: function(event, error, thirdparam) {
			$("#mybad").append('<div>ERROR REPORTED</div>');
			alert(error);
		}
	});
} //END loadThreads

////////////////
// newComment extracts the values to be sent to the php script and then
//   sends them to script: saveComment.php
function newComment(e) {
	var formValue = {
		content: $(this).parents('form:first').find(".commentsection").val(),
		tid: $(this).parents('form:first').attr('id')
	}
	// $('#mybad').append(formValue.content + '<br />');
	// $('#mybad').append(formValue.tid);

	$.ajax({
		url: "http://voyager.cs.bgsu.edu/cs3140rg/cs3140b2/project/php/saveComment.php",
		data: formValue,
		type: "post",
		dataType: "json",
		cache: false,
		// processData: false,
		// contentType: false,
		success: function(dataBack) {
			$('.btn-post').fadeOut();
			$('.commentsection').fadeOut();
			setTimeout(getComments(formValue.tid), 100);
			// $.each(allComments, function(index, object) {
			// 	$(this).parents('form:first').append("Found a comment");
			// })
			$(this).parents('form:first').append('<textarea rows=\"3\" cols=\"50\" class="commentsection" name="commentsection" />');
			$(this).parents('form:first').append('<br /><button type=\"button\" class=\"btn-post btn btn-default\" >post</button>');
		},
		error: function(event, error, thirdparam) {
			$("#mybad").append('<div>ERROR REPORTED</div>');
			alert(error);
		}
	});
} //END newComment

////////////////
// getComments is a helper function to access the php script to get the commetns of a thread
function getComments(e) {
	threadID = e;
	var formValue = {
		tid: threadID, 
		content: "fake content for debugging"
	}
	// $('#mybad').append(formValue.tid);
	var varId= '#' + threadID;
	$.ajax({
		url: "http://voyager.cs.bgsu.edu/cs3140rg/cs3140b2/project/php/returnComments.php",
		data: formValue,
		type: "post",
		dataType: "json",
		cache: false,
		// processData: false,
		// contentType: false,
		success: function(dataBack) {
			$('.comment').remove();
			var inserter = '';
			$.each(dataBack, function(index, object) {
				inserter = '<div class=\"comment\">';
				inserter += '<p><strong>' + object.name +'</strong></p>';
				inserter += ' <small>' + object.post_date + '</small>';
				inserter += '<p>' + object.content + '</p>';
				inserter += '<hr />'
				$(varId).append(inserter);
			});
			// $(varId).append('<br /><button type=\"button\" class=\"btn-collapse btn btn-default\" >post</button>');
			// $('.btn-collapse').on('click', cleanThread);
		},
		error: function(event, error, thirdparam) {
			$("#mybad").append('<div>ERROR REPORTED in Return Comments</div>');
			// alert(error);
		}
	});
} //end getComments

/////////////
// cleanThread removes ann 'expanded values'
function cleanThread( ) {
	$(this).parents('form:first').append('<button type=\"button\" class=\"btn-expand btn btn-default\" >Expand</button>');
	$(this).parents('form:first').find('.comment').remove();
	$(this).parents('form:first').find('.cP').remove();
	$(this).parents('form:first').find('.commentsection').remove();
	$(this).parents('form:first').find('.btn-post').remove();
	$(this).parents('form:first').find('.btn-collapse').remove();
	
	$('.btn-expand').on("click", showMore );
}
/////////////
// showMore shows comments on the page and provides a location for comments to be applied
function showMore(e) {
	// $('#mybad').append('click');
	e.preventDefault();
	var varId = $(this).parents('form:first').attr('id');
	$(this).parents('form:first').append('<p class=\"cP\">Comments:</p>');
	getComments(varId);
	
	$(this).parents('form:first').append('<textarea rows=\"3\" cols=\"50\" class="commentsection" name="commentsection" />');
	$(this).parents('form:first').append('<br class=\"cP\" /><button type=\"button\" class=\"btn-post btn btn-default\" >post</button>');
	$(this).parents('form:first').append('<button type=\"button\" class=\"btn-collapse btn btn-default\" >collapse</button>');
	$('.btn-collapse').on('click', cleanThread);
	$('.btn-post').on('click', newComment);
	$(this).fadeOut();
} // END showmore

/////////////////
// Thread handler runs the php script to extract threads from teh database
//   and displays them to the page
function threadHandler(e) {
	e.preventDefault();
	// $('#mybad').append("so yeah...");
	var checkboxes = document.getElementsByName('user');
	var userArr = [];
	for(var i = 0; i < checkboxes.length; i++) {
		if(checkboxes[i].checked) {
			userArr.push(checkboxes[i].value);
			// $('#mybad').append(checkboxes[i].value);
		}
	}

	var formValue = {
		users: userArr,
		content: $('#content').val()
	}
	//save the new thread to the database
	$.ajax({
		url: "http://voyager.cs.bgsu.edu/cs3140rg/cs3140b2/project/php/newThread.php",
		type: "post",
		data: formValue,
		cache: false,
		success: function(dataBack) {

			$.each(dataBack, function(index, object) {
				$('#mybad').append(object);
			});
		},
		error: function(one, two, three) {
			$('#mybad').append('ERROR REPORTED');
		}

	});
	//reload the thread section
	setTimeout(window.loadThreads(), 100);

} //END threadHandler


/////////////////
// document.ready prepares
//   the page for viewing
$(document).ready( function() {

	//display threads in database
	loadThreads();
	$('#logout').click( function(e) {
		$.ajax({
			url: "http://voyager.cs.bgsu.edu/cs3140rg/cs3140b2/project/php/logout.php",
			dataType: "json",
			cache: false,
			success: function(dataBack) {

			}
		});
	});

	//register the ajax handler with the add thread button
	$('#addbut').click( function(e)  {
		e.preventDefault();

		$.ajax({
			url: "http://voyager.cs.bgsu.edu/cs3140rg/cs3140b2/project/php/returnUsers.php",
			// type: "post",
			dataType: "json",
			cache: false,
			success: function(userList) {
				
				var inserter = '<label for=\"user\">Users in this thread:</label><br />';
				$.each(userList, function(index, object) {
					inserter += '<input type=\"checkbox\" name=\"user\" value=\"';
					inserter += object.user_id;
					inserter += '\">';
					inserter += object.name;					
					inserter += '</input><br />';
				});
				inserter += '<label for=\"content\">Content:</label><br />';
				inserter += '<textarea rows=\"4\" cols=\"29\" name=\"content\" id=\"content\" /><br />';
				inserter += '<input type=\"submit\" id=\"create-thread\" value=\"Create Thread\" class=\"btn btn-default\" data-dismiss=\"modal\" />';
				inserter += '<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Cancel</button>';
				$('#newThread').html(inserter);
				$('#create-thread').on("click", threadHandler );
			},

			error: function() {
				$('#mybad').append('ERROR REPORTED');
			}
		});

	});
})  //END document.ready