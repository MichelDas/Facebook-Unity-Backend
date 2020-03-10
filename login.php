<?php

  echo "inside login.php";
  include('connection.php');


  $fbId = $_POST['fbId'];
  $name = $_POST['name'];
  $email = $_POST['email'];

  $response = array();
  include('action.php');
  $loginQuery = "INSERT INTO $table (id, name, email, score) VALUES ('$fbId', '$name', '$email', '0') ON DUPLICATE KEY UPDATE name=VALUES(name), email=VALUES(email)";


  $status = mysqli_query($conn, $loginQuery);

  $row = mysqli_fetch_array(mysqli_query($conn, $scoreQuery),MYSQLI_ASSOC);

  $response = $row;
  $response['status'] = $status;

  echo json_encode($response);
 ?>
