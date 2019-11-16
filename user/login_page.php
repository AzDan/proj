  <?php
  session_id("usersession");
  session_start();
  include($_SERVER['DOCUMENT_ROOT'].'/proj/includes/db.php');
  if(isset($_POST['submitbtn'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $hash = hash('sha1',$password);

    $data=array();
    $query = "SELECT RegNo,Password FROM login WHERE RegNo='$username';";
    if ($res=mysqli_query($conn, $query)) {
      foreach ($res as $row) {
        $data[]=$row;
      }
    }
    else {
        echo " ";
    }
    $r3=$res->num_rows;
    if($r3>0){
      if ($data[0]['RegNo']==$username && $data[0]['Password']==$hash) {
        $_SESSION['login_user']=$username;
        header('Location: home.php');
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
  if(isset($_POST['signupbtn'])){
    header('Location: signup.php');
  }
 ?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="/proj/css/login_page.css">
  </head>
  <body>
    <div>
      <a style="font-size: 35px ;font-family:Candara; margin-left:15.5%;">MOTILAL NEHRU NATIONAL INSTITUTE OF TECHNOLOGY, ALLAHABAD</a>
    </div>
    <div class="logo">
      <img src="/proj/images/mnnitlogo.png" height="175px" width="175px">
    </div>
    <form class="box" action="login_page.php" method="post">
      <input type="text" name="username" placeholder="Username">
      <input type="password" name="password" placeholder="Password">
      <input type="submit" name="submitbtn" value="Login">
      <input type="submit" name="signupbtn" value="Sign Up">
      <button><a href="adminlogin.php" style="float:right">ADMIN LOGIN</a></button>
      <br>
      <br>
    </form>
  </body>
</html>
