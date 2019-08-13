<?php
   include('connect.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];

   
   if(!isset($user_check))
   {
	  header("location:../index.php");
   }
?>