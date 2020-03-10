
<?php
  $gameId = 'com.priyosoft.tst';
  $response = array();

  switch ($gameId)
  {
      case 'com.priyosoft.tst':
          $table = 'fb_GlobalLeaderboard';
  	//	$updateQuery = "UPDATE $table SET score='$score' WHERE id='$fbId'";
  		$scoreQuery = "SELECT score FROM $table WHERE id='$fbId'";
    //  $friendScoreQuery = "SELECT name, score from $table WHERE id = fbId";
  	break;

  	default:
  		die(json_encode("Game ID not found!!!"));
  	break;

  }
 ?>
