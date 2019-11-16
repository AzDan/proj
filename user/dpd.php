<?php
  include($_SERVER['DOCUMENT_ROOT'].'/proj/includes/adminsession.php');
  include($_SERVER['DOCUMENT_ROOT'].'/proj/includes/db.php');
  include($_SERVER['DOCUMENT_ROOT'].'/proj/includes/dpd_static_content.php');

  /*$query = "SELECT * FROM user WHERE RegNo='$user_check';";
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
  $address=$data[0]['Address'];*/

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="/proj/css/home.css">
  </head>
  <body>

  </body>
</html>
