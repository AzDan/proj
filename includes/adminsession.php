<?php
  session_id("adminsession");
  session_start();
  include 'db.php';

  $user_check = $_SESSION['login_admin'];
  $query = "SELECT username FROM adminlogin WHERE username='$user_check';";

  $data=array();
  if ($res=mysqli_query($conn, $query)) {
    foreach ($res as $row) {
      $data[]=$row;
    }
  }
  else {
      echo "Error: " . $query . "<br>" . mysqli_error($conn);
  }
  $login_session = $data[0]['username'];

  if(!isset($login_session)){

    mysqli_close($conn);

    header('Location: index.php');
  }
 ?>
