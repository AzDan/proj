<?php
  include($_SERVER['DOCUMENT_ROOT'].'/proj/includes/db.php');

  if(isset($_POST['submitbtn'])){
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $email = $_POST['email'];
    $reg_no = $_POST['regno'];
    $address = $_POST['address'];
    $occ = $_POST['occupation'];
    $password = $_POST['pword'];
    $hashed = hash('sha1',$password);

    $query1 = "INSERT INTO login VALUES('$reg_no','$hashed');";
    $query2 = "INSERT INTO user VALUES('$reg_no','$first_name','$last_name','$email','$occ','$address');";

    if(mysqli_query($conn,$query2)) {
      if(mysqli_query($conn,$query1)) {
        header('Location: login_page.php');
        exit;
      }
      else {

        echo "Error connecting to database";
      }
    }
    else {

      echo "Error connecting to database";
    }
    mysqli_close($conn);
  }
?>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>َSign Up</title>
    <link rel="stylesheet" href="/proj/css/signup.css">
  </head>
  <body>
    <div style="text-align:center;">
      <a style="font-size: 35px ;font-family:Candara;">MOTILAL NEHRU NATIONAL INSTITUTE OF TECHNOLOGY</a>
    </div>
    <form id="signUpForm" action="signup.php" method="post">
      <div class="signupinfo">
        <div class="first-last">
          <label for="occupation">Occupation</label>
          <select class="ipbox" name="occupation" style="margin-left:76px" required>
            <option value="prof">Professor</option>
            <option value="student">Student</option>
          </select>
          <br>
          <label for="fname">First Name</label>
          <input type="text" placeholder="First Name" name="fname" class="ipbox" required>
          <br>
          <label for="lname">Last Name</label>
          <input type="text" placeholder="Last Name" name="lname" class="ipbox" style="margin-left: 80px;" required>
        </div>
          <br>
        <div class="email-pass">
          <label for="email">E-mail</label>
          <input type="text" placeholder="E-mail" name="email" id="email" class="email-box" required>
        </div>
          <br>
        <div class="reg-no">
          <label for="regno">Registration Number</label>
          <input type="text" placeholder="Reg. No." name="regno" class="reg-box" required>
        </div>
          <br>
        <div class="email-pass">
          <label for="pword">Password</label>
          <input type="password" placeholder="Password" name="pword" class="pass-box" required>
        </div>
          <br>
          <div class="reg-no" style="margin-left:39px;">
            <label for="address">Address</label>
            <input type="text" placeholder="Address" name="address" class="address" required>
          </div>
            <br>
          <button id="submitbtn" name="submitbtn" class="signupbtn" disabled><span>SUBMIT</span></button>
      </div>
      <div class="logbtn">
        <a href="login_page.php">Back to login page</a>
      </div>
    </form>
    <script>
    const signUpForm = document.getElementById('signUpForm');
    const emailField = document.getElementById('email');
    const okButton = document.getElementById('submitbtn');
    emailField.addEventListener('keyup', function (event) {
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
    var inputText = emailField.value;
    isValidEmail = inputText.match(mailformat)
    if ( isValidEmail) {
    okButton.disabled = false;
    } else {
    okButton.disabled = true;
    }
    });
    okButton.addEventListener('click', function (event) {
    signUpForm.submit();
    });
    </script>
  </body>
</html>
