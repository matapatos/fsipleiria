var FORM_ACTION = 'contact_us',
	RESPONSE_MSGS = getResponseMessages(),
	ERROR_MESSAGES = getMessages();


validate();
/**
 * Function created set new validation rules and messages to #contact-us-form
 */
function validate(){
	jQuery('#contact-us-form').validate({
		rules: {
			myname : 'required',
			myemail: {
				required : true,
				email : true
			},
			mysubject: 'required',
			mymessage: 'required'
		},
		messages: {
			myname: ERROR_MESSAGES.REQUIRED,
			myemail: {
				required : ERROR_MESSAGES.REQUIRED,
				email : ERROR_MESSAGES.INVALID_EMAIL
			},
			mysubject: ERROR_MESSAGES.REQUIRED,
			mymessage: ERROR_MESSAGES.REQUIRED
		},
		submitHandler: sendForm
	});
}
/**
 * Function created to send the form via Ajax, when all the fields are correctly filled.
 */
function sendForm(){
	var $ = jQuery;
	var myData = getFormData($);

	hideNotifications(); //Hide all messages

	$.ajax({
		url: myAjax.url,
		type: 'POST',
		dataType: 'json',
		data: myData,
	})
	.done(function(response) {
		try{
			var json = JSON.parse(JSON.stringify(response));
			if(json.state)
				showSuccess(RESPONSE_MSGS[json.msg]);
			else showError(RESPONSE_MSGS[json.msg]);
		}catch(err){
			showError(RESPONSE_MSGS['PARSING_ERROR']);
		}
	})
	.fail(function(response) {
		showError(response);
	});
}
/**
 * Function created to show only success messages/notifications.
 * @param  {[string]} msg - Message to be shown
 */
function showSuccess(msg){
	showMessage('.success', msg);
}
/**
 * Function created to show only error messages/notifications.
 * @param  {[string]} msg - Message to be shown
 */
function showError(msg){
	showMessage('.error', msg);
}
/**
 * Function created for showing a '.notification'.
 * @param  {[string]} selector - Selector of the notification div.
 * @param  {[string]} msg      - Message to be shown.
 */
function showMessage(selector, msg){
	jQuery(selector + ' > p').text(msg);
	jQuery(selector).fadeIn('slow', function() {
	});
}
/**
 * Function created to hide all the 'successful' or 'error' notifications received from the server.
 */
function hideNotifications(){
	jQuery('.notification').css('display', 'none');
}
/**
 * Function created for retrieving the data to be sent via Ajax from the contact form.
 * @param  {[type]} $ [description]
 * @return {[type]}   [description]
 */
function getFormData($){
	var myname = $('#myname').val(),
		myemail = $('#myemail').val(),
		mysubject = $('#mysubject').val(),
		mymessage = $('#mymessage').val();

	return {
		'action' : FORM_ACTION,
		'myname' : myname,
		'myemail' : myemail,
		'mysubject' : mysubject,
		'mymessage' : mymessage
	};
}
/**
 * Function created to retrieve the messages, depending of the language of the website, for the validation fields.
 * @return {[Object]} - All the necessary error messages.
 */
function getMessages(){
	switch(myAjax.lang){
		case 'pt':
			return {
				REQUIRED : 'Campo obrigatório',
				INVALID_EMAIL : 'Email inválido'
			};
		default:
			return {
				REQUIRED : 'Required field',
				INVALID_EMAIL : 'Invalid email'
			};
	}
}
/**
 * Function created for retrieving the Response messages to be shown to the user, when it receives the answer from the contact us form. It retrieves, depending on the language of the website. if it's 'pt' it retrieves Portuguese messages, etc.
 * @return {[Object]} - Messages to be shown.
 */
function getResponseMessages(){
	switch(myAjax.lang){
		case 'pt':
			return {
				'0' : 'Obrigado, o seu email foi enviado com sucesso!',
				'1' : 'Parâmetros em falta.',
				'2' : 'Parâmetros inválidos.',
				'3' : 'Erro desconhecido. Por favor, tente outra vez.',
				'PARSING_ERROR' : 'Desculpe, mas ocorreu um erro.'
			};
		default:
			return {
				'0' : 'Thanks, your email was sent successfully!',
				'1' : 'Missing parameters.',
				'2' : 'Invalid parameters.',
				'3' : 'Unknown error. Please, try again.',
				'PARSING_ERROR' : 'Sorry, an error occured.'
			};
	}
}
