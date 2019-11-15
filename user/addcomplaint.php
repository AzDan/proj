<?php
  include($_SERVER['DOCUMENT_ROOT'].'/proj/includes/session.php');
  include($_SERVER['DOCUMENT_ROOT'].'/proj/includes/static_content.php');
  include($_SERVER['DOCUMENT_ROOT'].'/proj/includes/db.php');

  if(isset($_POST['submitbtn'])){
    $complaint = $_POST['complaint'];
    $c_type=$_POST["c_type"];
    $location=$_POST["location"];
    $query1="INSERT INTO complaint(RegNo,Description,Date,Type,Location,Status) VALUES('$user_check','$complaint',curdate(),'$c_type','$location','pending');";

    if(mysqli_query($conn,$query1)){
      $message="Complaint successfully registered!";
      echo "<script type='text/javascript'>alert('$message');</script>";
    }
    else{
      echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
  }
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>َComplaint Form</title>
    <link rel="stylesheet" href="/proj/css/add_complaint.css">
  </head>
  <body>
    <form class="box" action="addcomplaint.php" method="post">
      <div class="signupinfo">
        <div class="first-last">
          <h1>Add Complaint</h1>
          <label for="ctype">Complaint Type: </label>
          <select class="ipbox" name="c_type" style="margin-left:" required>
            <option value="electrical">Electrical</option>
            <option value="civil">Civil</option>
          </select>
          <br>
          <br>
          <label for="location">Complaint Location: </label>
          <select class="reg-box" name="location" style="width:160px;margin-left:119px;" required>
            <option value="hostel">Hostel</option>
            <option value="academic">Academic</option>
            <option value="residential">Residential</option>
          </select>
          <br>
          <br>
          <label for="complaint">Complaint:</label>
          <br>
          <textarea placeholder="Enter complaint here" id="text" name="complaint" rows="4" cols="31" class="reg-box" style="margin-left:20px;" required></textarea>
        </div>
        <br>
        <br>
        <input type="submit" name="submitbtn" value="Submit" class="signupbtn"></button>
      </div>
    </form>
  </body>
</html>
