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
    <link rel="stylesheet" href="/proj/css/home.css">
    <script type="text/javascript" src="/proj/js/jquery341.js"></script>
    <script type="text/javascript" src="/proj/js/ctypedropdown.js"></script>
  </head>
  <body>
    <form class="box" action="addcomplaint.php" method="post">
      <div class="complaintdiv">
        <div>
          <label for="ctype" style="margin-left:3%;">Complaint Type: </label>
          <select class="ctypebox" name="ctype" required>
            <option value="electrical">Electrical</option>
            <option value="civil">Civil</option>
          </select>
          <br>
          <br>
          <label for="location" style="margin-left:3%;">Complaint Location: </label>
          <select class="locbox" data-target=".locspec" name="location" style="width:120px;margin-left:10px;" required>
            <option value="hostel" data-show=".hostel">Hostel</option>
            <option value="academic" data-show=".academic">Academic</option>
            <option value="residential" data-show=".residential">Residential</option>
          </select>
          <div class="locspec">
            <div class="hostel hide">
              <label for="hostelbox" style="margin-left:-10%;">Hostel:</label>
              <select class="hostelspec" name="hostelbox" style="margin-left:10px;" required>
                <option value="svbh">SVBH</option>
                <option value="pg">PG Hostel</option>
                <option value="patel">Patel</option>
                <option value="tilak">Tilak</option>
                <option value="malviya">Malviya</option>
                <option value="tandon">Tandon</option>
                <option value="tagore">Tagore</option>
                <option value="raman">Raman</option>
                <option value="kngh">KNGH</option>
                <option value="sngh">SNGH</option>
                <option value="ih">IH</option>
              </select>
            </div>
            <div class="academic hide">
              <label for="acadbox" style="margin-left:-10%;">Area:</label>
              <select class="acadspec" name="acadbox" style="margin-left:10px" required>
                <option value="acad">Academic Building</option>
                <option value="admin">Administrative Building</option>
                <option value="mphall">MP Hall</option>
                <option value="semhall">Seminar Hall</option>
                <option value="lechall">Lecture Hall</option>
                <option value="cc">Computer Center</option>
                <option value="csed">CSED</option>
                <option value="other">Other Area</option>
              </select>
            </div>
            <div class="residential hide">
            </div>
          </div>
          <div class="address">
            <label for="addrbox">Address:</label>
            <input type="text" placeholder="Address" name="addrbox" class="addr" required>
            <div style="margin-left:40%; margin-top:-4.5%;">
              (<b>Hostel</b> - Room number | <b>Academic</b> - Specific area to the nearest building selected, specify if others| <b>Residential</b> - Apartment number)
            </div>
          </div>
          <br>
          <br>
          <label for="complaint" style="margin-left:3%;">Complaint:</label>
          <br>
          <textarea placeholder="Enter complaint here" id="text" name="complaint" rows="4" cols="34" class="locbox" style="margin-left:30px;" required></textarea>
        </div>
        <br>
        <br>
        <input type="submit" name="submitbtn" value="Submit" class="signupbtn" style="margin-left:40%;"></button>
      </div>
    </form>
  </body>
</html>
