<?php

include('connection.php');
include('action.php');

//switch case to consolidate the db interaction
$fbId = $_POST['fbId'];
$name = $_POST['name'];
$email = $_POST['email'];
//$score = $_REQUEST['Score'];
$score = $_POST['score'];
$friendId = $_POST['frinedId'];
$limit = (isset($_REQUEST['limit']))?$_REQUEST['limit']:10;
$limit = ($limit > 100)?100:$limit;
$FriendIdss = array("101368984825657", "111551333793324" );




//switch case to consolidate the web interaction
switch ($action)
{
	case 'login':

	break;

	case 'updateScore':

		if(mysqli_query($conn, $updateQuery))
			$response['status'] = true;
		else
			$response['status'] = false;

		echo json_encode($response);
	break;

	case 'getScore':


	break;

	default:
		$response['msg'] = 'wat!';
		$response['status'] = false;

		echo json_encode($response);
		break;
}
?>
