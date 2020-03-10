<?php

  include('connection.php');

  $sql = "select name, id, score from fb_GlobalLeaderboard";
  $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result) > 0 ){
    while ($row = mysqli_fetch_assoc($result)) {
      echo "username:" .$row['name'] ." id:" .$row['id'] ." score:" .$row['score'] .";";
    }
  }

 ?>
