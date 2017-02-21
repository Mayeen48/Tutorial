<?php

namespace App\Regcl;

 class Regcl{
     public function __construct() {
         echo "I am Storing.....";
         
     }
     public function registration(){
         $name=$_POST['name'];
         $password1=$_POST['password'];
         $repassword=$_POST['repassword'];
         if($password1!=$repassword){
            echo '<script>';
            echo "alert('Password Not Match');";
            echo "window.location.replace('../index.php')";
            echo '</script>';
         }
         $password=sha1($password1);
         $email=$_POST['email'];
         $address=$_POST['address'];
         $dob=$_POST['date'];
         
         $date= date("d/m/y");
       //date closed
        date_default_timezone_set("Asia/Dhaka");
        $time=date("h:i:sa");
        $date_time="On ".$date." at ".$time;
         
          $con= mysqli_connect("localhost", "root", "", "djit") or die("database not found.....");
          $insert= mysqli_query($con, "insert into user values('','$name','$email','$password','$address','$dob','$date_time','','','')");
          echo '<script>';
         echo "alert('Registration Successfully Completed....');";
         echo "window.location.replace('../view/login.php')";
         echo '</script>';
          
     }
     
 }
