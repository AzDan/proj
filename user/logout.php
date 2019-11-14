<?php
  session_id("usersession");
  session_start();

  if(session_destroy()){
    header('Location: login_page.php');
  }
 ?>
