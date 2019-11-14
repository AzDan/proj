<?php
  include($_SERVER['DOCUMENT_ROOT'].'/proj/includes/session.php');
  include($_SERVER['DOCUMENT_ROOT'].'/proj/includes/static_content.php');
  include($_SERVER['DOCUMENT_ROOT'].'/proj/includes/db.php');

  $query = "SELECT * FROM user WHERE RegNo='$user_check';";
  $data=array();

  if($res = mysqli_query($conn,$query)){
    foreach($res as $row){
      $data[]=$row;
    }
  }
  else {
      echo "Error: " . $query . "<br>" . mysqli_error($conn);
  }
  $username=$data[0]['RegNo'];
  $fname=$data[0]['FirstName'];
  $lname=$data[0]['LastName'];
  $email=$data[0]['email'];
  $occ=$data[0]['Occupation'];
  $address=$data[0]['Address'];

 ?>
<html>
  <head>
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="/proj/css/home.css">
  </head>
  <body>
    <div class="profile">
      <h2>INFORMATION</h2>
      <?php
        echo "  USERNAME - <b>$username</b><br><br>";
        echo "  FIRST NAME - <b>$fname</b><br><br>";
        echo "  LAST NAME - <b>$lname</b><br><br>";
        echo "  EMAIL - <b>$email</b><br><br>";
        echo "  TYPE - <b>$occ</b><br><br>";
        echo "  ADDRESS - <b>$address</b><br><br>";
      ?>
    </div>
  </body>
</html>
