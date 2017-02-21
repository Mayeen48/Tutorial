<?php
session_start();
require 'Comclass.php';
use App\Comclass\Comclass;


if (!isset($_SESSION['user_id']))
{
         echo '<script>';
         echo "alert('You have to login First....');";
         echo "window.location.replace('../view/login.php')";
         echo '</script>'; 
   // header("location: ../index.php");
}
 else {
   $user_id=$_GET['user_id'];
   $lc_id=$_GET['lc_id'];
   if($user_id!=$_SESSION['user_id'])
   {
        echo '<script>';
         echo "alert('You are not Permitted to Delete This Comment');";
         echo "window.location.replace('../index.php')";
         echo '</script>';  
   }
   else{
        //$con= mysqli_connect("localhost", "root", "", "djit") or die("database not found.....");
       $users = new Comclass();
       $users->commentDelete($user_id, $lc_id);
   }
 }
      