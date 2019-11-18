<?php
session_id("adminsession");
session_start();
  include($_SERVER['DOCUMENT_ROOT'].'/proj/includes/db.php');

  if(isset($_POST['submitbtn'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $data=array();
    $hash = hash('sha1',$password);
    $query = "SELECT username,password,type FROM adminlogin WHERE username='$username';";
    if ($res=mysqli_query($conn, $query)) {
      foreach ($res as $row) {
        $data[]=$row;
      }
    }
    else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
    $r3=$res->num_rows;
    if($r3>0){
      if ($data[0]['username']==$username&&$data[0]['password']==$hash&&$data[0]['type']==0) {
        $_SESSION['login_admin']=$username;
        header('Location: dpd.php');
        exit;
      }
      else if ($data[0]['username']==$username&&$data[0]['password']==$hash&&$data[0]['type']!=0) {
        $_SESSION['login_admin']=$username;
        header('Location: engineer.php');
        exit;
      }
      else{
        $errormsg="Incorrect username password combo!";
        echo "<script type='text/javascript'>alert('$errormsg')</script>";
      }
    }
    else{
      $errormsg="Incorrect username password combo!";
      echo "<script type='text/javascript'>alert('$errormsg')</script>";
    }
    mysqli_close($conn);
  }
 ?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>َLogin</title>
    <link rel="stylesheet" href="/proj/css/login_page.css">
  </head>
  <body>
    <div>
      <a href="login_page.php" style="float:left">BACK TO LOGIN</a>
      <a style="font-size: 35px ;font-family:Candara; margin-left: 7.45%;">MOTILAL NEHRU NATIONAL INSTITUTE OF TECHNOLOGY, ALLAHABAD</a>
    </div>
    <div class="logo">
      <img src="/proj/images/mnnitlogo.png" height="175px" width="175px">
    </div>
    <form class="box" action="adminlogin.php" method="post">
      <h1>Admin Login</h1>
      <input type="text" name="username" placeholder="Username">
      <input type="password" name="password" placeholder="Password">
      <input type="submit" name="submitbtn" value="Login">
    </form>

  </body>
</html>
