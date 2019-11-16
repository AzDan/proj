<?php
include($_SERVER['DOCUMENT_ROOT'].'/proj/includes/adminsession.php');
include($_SERVER['DOCUMENT_ROOT'].'/proj/includes/eng_static_content.php');
include($_SERVER['DOCUMENT_ROOT'].'/proj/includes/db.php');

  if(isset($_POST['submitbtn'])){
    $oldpass = $_POST['oldpass'];
    $newpass = $_POST['newpass'];
    $newpassconf = $_POST['newpassconf'];

    $oldpasshash = hash('sha1',$oldpass);
    $data=array();
    $q="SELECT * FROM adminlogin WHERE username='$user_check';";
    if ($res=mysqli_query($conn, $q)) {
      foreach ($res as $row) {
        $data[]=$row;
      }
    }
    $oldph = $data[0]['Password'];

    if($newpass==$newpassconf && $oldph==$oldpasshash){
      $newhash = hash('sha1',$newpass);
      $query = "UPDATE adminlogin SET Password='$newhash' WHERE username=$user_check;";
      if(mysqli_query($conn,$query)){
        $message="Password successfully changed!";
        echo "<script type='text/javascript'>alert('$message');</script>";
      }
      else{
        $message2="Password change fail!";
        echo "<script type='text/javascript'>alert('$message2');</script>";
      }
    }
    else{
      $message3="Password change fail!";
      echo "<script type='text/javascript'>alert('$message3');</script>";
    }
  }
 ?>

<!DOCTYPE html>
<html>
  <head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="/proj/css/changepassword.css">
  </head>
  <body>
    <div class="userctable">
      <form action="changepassword.php" method="post">
        <label for="oldpass" style="margin-left:7%;">Old Password:</label>
        <input type="password" placeholder="Old Password" name="oldpass" class="ipbox" style="margin-left:13%;" required>
        <br>
        <br>
        <label for="newpass" style="margin-left:7%;">New Password:</label>
        <input type="password" placeholder="New Password" name="newpass" class="ipbox" style="margin-left:11.5%;" required>
        <br>
        <br>
        <label for="newpassconf" style="margin-left:7%;">Confirm Password:</label>
        <input type="password" placeholder="Confirm New Password" name="newpassconf" class="ipbox" style="margin-left:5.5%;" required>
        <br>
        <button type="submit" name="submitbtn" class="signupbtn" style="margin-left:30%;"><span>SUBMIT</span></button>
      </form>
    </div>
  </body>
</html>
