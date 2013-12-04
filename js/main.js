$( document ).ready(function(){

	console.log('Let\'s get ready to rumble!');

	var login = $('.login');
	var email = $('.email');
	var code = $('.authCode');
	var alertBox = $('.loginAlert');
	var state = 0;

	email.keydown(function(event){ if(event.keyCode==13) login.click() });
	code.keydown(function(event){ if(event.keyCode==13) login.click() });
	
	$('.launchLogin').click(function(){
	
		state++;
		console.log('Launching login form');
		$(this).html('Cancel Login');
		$('.loginBar').slideDown();
		email.focus();
	});

	
	login.click(function(){
	
		switch(state){
			case 1:
				console.log('Starting email check..');
				var userEmail = email.val();
				console.log('User\'s email: '+userEmail);
	
				authPOST('email', userEmail).done(function(data) {
					var result = jQuery.parseJSON(data);
			    	if(result.error){
			    		console.log('Error: '+result.error);
			    		showAlert('danger', 'No such email found. Would you like to <a href="#">register</a>?');
			    		$('.email').val('');
			    	}
			    	else {
			    		console.log('Success: email found');
			    		showAlert('info', 'Enter the code provided by Google Authenticator');
			    		window.GAuthify_userID = result.gauthID; // :/
			    		code.css('visibility','visible');
			    		login.animate({left: "0"});
			    		code.focus();
			    		state++;
			    	}
			    });
	
			    break;
			case 2:
				console.log('Starting auth check..');
				$('.loginForm').slideUp();
				showAlert('info', 'Processing<span class="ellipsis">...</span>');
				var userAuth = code.val().toString();
				if(isNaN(userAuth) || userAuth.length != 6){
					console.log('Invalid auth code');
					showAlert('danger', 'That\'s not a valid authentication code. Please try again.');
					$('.loginForm').slideDown();
					code.focus();
					code.val("");
				}
				else {
					authPOST('check', null, window.GAuthify_userID, userAuth).done(function(data) {
						if(data==""){
							showAlert('danger', 'Authentication code was incorrect');
							$('.loginForm').slideDown();
							code.focus();
							code.val("");
						}
						else authSuccess();
					});
				}
	
				break;
			default:
				break;
		}
	
	});


});

function showAlert(type, content){
	var alertBox = $('.loginAlert');
	alertBox.removeClass (function (index, css) { return (css.match (/\balert-\S+/g) || []).join(' '); });
	alertBox.addClass('alert-'+type);
	alertBox.html(content);
}

function authPOST(type, userEmail, userID, userAuth){

	console.log('posting '+type);

	return $.ajax({
		url: "auth.php",
		type: "POST",
		data: {type: type, email: userEmail, user: userID, code: userAuth}
	});

}

function authSuccess(){
	showAlert('success', 'Authenticated Successfully!');
	// You'd probably want to redirect the user to a logged in page, or refresh the current one.
}