<?php
   include('db.php');
   session_start();
   $db = mysqli_select_db($con,'logincheck');
   $user_name = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($con,"select username from logincheck where username= '$user_name'");
   $row = mysqli_fetch_array($ses_sql);
   $login_session = $row['username'];
   
   
   if(!isset($_SESSION['login_user'])){
      header("Location:loginphp.php");
   }
?>