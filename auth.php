<?php
require_once('config.php');
require_once("gauthify.php");


//email check
if(isset($_POST['type'])){

	switch ($_POST['type']) {
		case 'email':
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
			else echo json_encode(array('error' => 'No such email found'));

			/*Demo purposes
			if($_POST['email'] == 'test@example.com'){ echo json_encode(array('username' => 'test user', 'email' => 'test@example.com', 'gauthID' => 'phplogin')); }
			else echo 'No Email Found';*/
			break;
		case 'check':
			$authCode = $_POST['code'];
			$userID = $_POST['user'];
			$gAuth = new GAuthify($GAuthAPI);
			$authCheck = $gAuth->check_auth($userID, $authCode);
			echo $authCheck;
			break;
		default:
			break;
	}

}


?>