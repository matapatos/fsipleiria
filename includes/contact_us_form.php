<?php

/* -------------------------- RESPONSE MESSAGES ------------------------ */
$ERROR_MSGS = [
	'MISSING_PARAMETERS' => 1,
	'INVALID_PARAMETERS' => 2,
	'UNKNOWN_ERROR' => 3
];

$SUCCESS_MSG = 0;

/* -------------------------- END RESPONSE MESSAGES ------------------------ */

const TO_EMAIL = 'andre_gil22@hotmail.com';

/**
 * Function created to handle a POST request from a contact us form.
 * @return [json] - Response from server.
 */
function contactUsAction(){
	$name = getPostRequiredParam('myname');
	$email = getPostRequiredParam('myemail');
	$subject = getPostRequiredParam('mysubject');
	$message = getPostRequiredParam('mymessage');

	global $ERROR_MSGS;
	if(!isEmail($email))
		throwMessageError($ERROR_MSGS['INVALID_PARAMETERS']);

	$header .= "MIME-Version: 1.0\n";
    $header .= "Content-Type: text/plain; charset=utf-8\n";
    $header .= "From:" . $email;

	if(wp_mail(TO_EMAIL, $subject, $message, $header))
		sendSuccessMessage();

	throwMessageError($ERROR_MSGS['UNKNOWN_ERROR']);
}

function isEmail($email){
	return filter_var($email, FILTER_VALIDATE_EMAIL);
}
/**
 * Function created to check if a POST param exists and if yes to retrieve it. If it doesn't exists it just sends an error message to the client and the process ends.
 * @param  [string] $key - The name of the param
 * @return [Object]      - Value of the param.
 */
function getPostRequiredParam($key){
	if(array_key_exists($key, $_POST) && $_POST[$key] != '')
		return $_POST[$key];

	global $ERROR_MSGS;
	throwMessageError($ERROR_MSGS['MISSING_PARAMETERS']);
}
/**
 * Function created to send an error message to the client and end process.
 * @param  [Object] $msg - Message to be sent
 */
function throwMessageError($msg){
	sendMsg(false, $msg);
}
/** Function created to send a successful message to the client and end the process. */
function sendSuccessMessage(){
	global $SUCCESS_MSG;
	sendMsg(true, $SUCCESS_MSG);
}
/**
 * Function created to send a message to the client and end the process. It's the function used from the 'throwMessageError' or 'sendSuccessMessage' functions.
 * @param  [Bool] $state - if it's an error or a success message.
 * @param  [Object] $msg   - The message to be sent to the client.
 */
function sendMsg($state, $msg){
	$json = json_encode([
				'state' => $state,
				'msg' => $msg
		]);

	echo $json;
	exit;
}
?>
