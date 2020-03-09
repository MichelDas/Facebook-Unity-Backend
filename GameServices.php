<?php

//db connectivity code here
$hostname = "localhost";
$username = "root";
$password = "";
$dbname   = "LeaderBoard";

$conn = mysqli_connect($hostname, $username, $password, $dbname) OR DIE ("Unable to connect to database! Please try again later.");

//housekeepign variables
//$action = $_REQUEST['action'];
 $action = "login";


//$gameId = $_REQUEST['gameId'];
  $gameId = 'com.priyosoft.tst';
  $response = array();

//switch case to consolidate the db interaction
$fbId = $_POST['fbId'];
//$fbId = '25661234314';
$name = $_POST['name'];
//$name = 'michel';
$email = $_POST['email'];
//$email = 'michel@gmail.com';
//$score = $_REQUEST['Score'];
$score = '10';
$limit = (isset($_REQUEST['limit']))?$_REQUEST['limit']:10;
$limit = ($limit > 100)?100:$limit;

switch ($gameId)
{
    case 'com.priyosoft.tst':
        $table = 'fb_GlobalLeaderboard';
		$loginQuery = "INSERT INTO $table (id, name, email, score) VALUES ('$fbId', '$name', '$email', '0') ON DUPLICATE KEY UPDATE name=VALUES(name), email=VALUES(email)";
		$updateQuery = "UPDATE $table SET score='$score' WHERE id='$fbId'";
		$scoreQuery = "SELECT score FROM $table WHERE id='$fbId'";
	break;

	default:
		die(json_encode("Game ID not found!!!"));
	break;

}

//switch case to consolidate the web interaction
switch ($action)
{
	case 'login':
		$response = array();

		$status = mysqli_query($conn, $loginQuery);

		$row = mysqli_fetch_array(mysqli_query($conn, $scoreQuery),MYSQLI_ASSOC);

		$response = $row;
		$response['status'] = $status;

		echo json_encode($response);
	break;

	case 'updateScore':

		if(mysqli_query($conn, $updateQuery))
			$response['status'] = true;
		else
			$response['status'] = false;

		echo json_encode($response);
	break;

	case 'getScore':

		$response = array();

		$globalLBQuery = ($globalLBQuery == '')?"SELECT * FROM $table WHERE name <> '' ORDER BY score DESC LIMIT 0,$limit":$globalLBQuery;
		$result = mysqli_query($conn, $globalLBQuery);
		while ($row = mysqli_fetch_assoc($result))
			$response[] = $row;

		$response['status'] = true;

		echo json_encode($response);
	break;

	default:
		$response['msg'] = 'wat!';
		$response['status'] = false;

		echo json_encode($response);
		break;
}
?>
