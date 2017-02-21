<?php

namespace App\Logclass;
session_start();
 class Logclass{
     
     public function __construct() {
         echo "Please wait to login....."."<br/>";
         
     }
     public function login(){
         $email=$_POST['email'];
         $password1=$_POST['password'];
         
         $password= sha1($password1);
         
         $con= mysqli_connect("localhost", "root", "", "djit") or die("database not found.....");
         $logincheck= mysqli_query($con, "select * from user where email='$email' AND password='$password'");
         $num= mysqli_num_rows($logincheck);
         if ($num==1)
         {
             $fetch= mysqli_fetch_array($logincheck);
             $_SESSION['user_id']=$fetch['user_id'];
             
             $date= date("d/m/y");
             //date closed
             date_default_timezone_set("Asia/Dhaka");
             $time=date("h:i:sa");
             $date_time="On ".$date." at ".$time;
             mysqli_query($con, "update user set last_login='$date_time'");
             if (!$_SESSION['t_id'])
             {
                 header("location: ../index.php");
             }
             else{
                 $t_id=$_SESSION['t_id'];
                header("location: like.php?t_id=$t_id"); 
             }
             
         }
 else {
     echo"user Not Match";
     //session_destroy();
     header("location: ../view/login.php");
 }
         
        
         
//          $con= mysqli_connect("localhost", "root", "", "djit") or die("database not found.....");
//          $insert= mysqli_query($con, "insert into user values('','$name','$email','$password','$address','$dob','$date_time','')");
          
     }
     
 }
