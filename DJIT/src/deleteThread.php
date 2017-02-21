<?php
session_start();
require 'ThreadClass.php';
use App\ThreadClass\ThreadClass;


if (!isset($_SESSION['user_id']))
{
    echo '<script>';
         echo "alert('You have to login First....');";
         echo "window.location.replace('../view/login.php')";
         echo '</script>'; 
    //header("location: ../view/login.php");
}
 else {
   $user_id=$_GET['user_id'];
   $t_id=$_GET['t_id'];
   if($user_id!=$_SESSION['user_id'])
   {
        echo '<script>';
         echo "alert('You are not Permitted to Delete This Comment');";
         echo "window.location.replace('../index.php')";
         echo '</script>';  
   }
   else{
        //$con= mysqli_connect("localhost", "root", "", "djit") or die("database not found.....");
       $users = new ThreadClass();
       $users->deleteThread($user_id, $t_id);
   }
 }
      