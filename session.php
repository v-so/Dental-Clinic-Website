<?php
   include('db.php');
   session_start();

   $user_check = $_SESSION['login_user'];

   $ses_sql = mysqli_query($db,"select name,role from employee where email = '$user_check' ");

   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $login_session = $row['name'];
   $login_role = $row['role'];
   $session_app_id = "";
   if(!isset($_SESSION['login_user'])){
      header("location:signin.php");
      die();
   }
?>
