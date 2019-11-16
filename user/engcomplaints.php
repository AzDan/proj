<?php
  include($_SERVER['DOCUMENT_ROOT'].'/proj/includes/adminsession.php');
  include($_SERVER['DOCUMENT_ROOT'].'/proj/includes/db.php');
  include($_SERVER['DOCUMENT_ROOT'].'/proj/includes/eng_static_content.php');

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
    <style>
      #customers {
      font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
      }

      #customers td, #customers th {
      border: 1px solid #ddd;
      padding: 8px;
      }

      #customers tr:nth-child(even){background-color: #f2f2f2;}

      #customers tr:hover {background-color: #ddd;}

      #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #4CAF50;
      color: white;
      }
    </style>
  </head>
  <body>
    <div class="userctable" style="overflow:auto;">
      <?php
          $data=array();
          if ($res=mysqli_query($conn, "select * FROM complaint")){
            foreach ($res as $row) {
                $data[]=$row;
            }
          }
          else {
             echo "Error: " . $query . "<br>" . mysqli_error($conn);
          }
          $r2=$res->num_rows;
          echo '<table id="customers">';
          echo '<caption style="font-size:30px;">COMPLAINTS</caption>';
          echo '<tr>';
          echo '<td>'.'CID'.'</td>'.'<td>'.'Description'.'</td>'.'<td>'.'Date'.'</td>'.'<td>'.'Type'.'</td>'.'<td>'.'Location'.'</td>'.'<td>'.'Status'.'</td>';
          echo '</tr>';
          for($i=0;$i<$r2;$i++){
            echo '<tr>';
            echo '<td>'.$data[$i]['ComplaintNo'].'</td>'.'<td>'.$data[$i]['Description'].'</td>'.'<td>'.$data[$i]['Date'].'</td>'.'<td>'.$data[$i]['Type'].'</td>'.'<td>'.$data[$i]['Location'].'</td>'.'<td>'.$data[$i]['Status'].'</td>';
            echo '</tr>';
          }
          echo '</table>';
      ?>
    </div>
    <!--<div class="profile">
      <h2>INFORMATION</h2>
      /*<?php
        echo "  USERNAME - <b>$username</b><br><br>";
        echo "  FIRST NAME - <b>$fname</b><br><br>";
        echo "  LAST NAME - <b>$lname</b><br><br>";
        echo "  EMAIL - <b>$email</b><br><br>";
        echo "  TYPE - <b>$occ</b><br><br>";
        echo "  ADDRESS - <b>$address</b><br><br>";
      ?>*/
    </div>-->
  </body>
</html>
