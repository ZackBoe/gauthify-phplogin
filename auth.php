<?php
require_once('config.php');
require_once("gauthify.php");


//email check
if(isset($_POST['email'])){
	$email = $_POST['email'];
	$stmt = $dbconn->prepare('SELECT * FROM users WHERE email= :email'); 
	$stmt->bindParam(":email", $email, PDO::PARAM_INT);
	$stmt->execute();
	$result = $stmt->fetchAll(); 
	if ( count($result) ) {
	foreach($result as $row) {
		echo json_encode(array('username' => $row['username'], 'email' => $row['email'], 'gauthID' => $row['gauthify-id']));
		}
	}
	else{echo 'No Email Found'; }

	/*Demo purposes
	if($_POST['email'] == 'test@email.com'){ echo json_encode(array('username' => 'test user', 'email' => 'test@example.com', 'gauthID' => 'phplogin')); }
	else echo 'No Email Found';*/
	
}

//gauth check
if(isset($_POST['auth'])){
	$authCode = $_POST['auth'];
	$userID = $_POST['uniqID'];
	$gAuth = new GAuthify($GAuthAPI);
	$authCheck = $gAuth->get_user($userID, $authCode);
	echo $authCheck['authenticated'];
}
?>