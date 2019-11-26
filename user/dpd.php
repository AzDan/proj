<?php
  include($_SERVER['DOCUMENT_ROOT'].'/proj/includes/adminsession.php');
  include($_SERVER['DOCUMENT_ROOT'].'/proj/includes/db.php');
  include($_SERVER['DOCUMENT_ROOT'].'/proj/includes/dpd_static_content.php');

  if(isset($_POST['submitbtn'])){
    $_SESSION['mnum']=$_POST['months'];
  }
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="/proj/css/home.css">
  </head>
  <body>
    <form action="dpd.php" method="post">
      <select class="ddm" name="months">
        <option value="20">ALL</option>
        <option value="01">Januray</option>
        <option value="02">February</option>
        <option value="03">March</option>
        <option value="04">April</option>
        <option value="05">May</option>
        <option value="06">June</option>
        <option value="07">July</option>
        <option value="08">August</option>
        <option value="09">September</option>
        <option value="10">October</option>
        <option value="11">November</option>
        <option value="12">December</option>
      </select>
      <input type="submit" name="submitbtn" value="->" class="subbtn"></button>
      <?php
        if(isset($_POST['submitbtn'])){
          $m = $_POST['months'];
          switch ($m) {
            case 1:
              echo '<h4 class="heading">Januray</h4>';
              break;
            case 2:
              echo '<h4 class="heading">February</h4>';
              break;
            case 3:
              echo '<h4 class="heading">March</h4>';
              break;
            case 4:
              echo '<h4 class="heading">April</h4>';
              break;
            case 5:
              echo '<h4 class="heading">May</h4>';
              break;
            case 6:
              echo '<h4 class="heading">June</h4>';
              break;
            case 7:
              echo '<h4 class="heading">July</h4>';
              break;
            case 8:
              echo '<h4 class="heading">August</h4>';
              break;
            case 9:
              echo '<h4 class="heading">September</h4>';
              break;
            case 10:
              echo '<h4 class="heading">October</h4>';
              break;
            case 11:
              echo '<h4 class="heading">November</h4>';
              break;
            case 12:
              echo '<h4 class="heading">December</h4>';
              break;
            case 20:
              echo '<h4 class="heading">ALL</h4>';
              break;
          }
        }
       ?>
    </form>
      <iframe class="graphs" src="/proj/user/index2.php">
  </body>
</html>
