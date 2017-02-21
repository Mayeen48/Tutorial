<?php
session_start();

$con= mysqli_connect("localhost", "root", "", "djit") or die("database not found.....");
if (isset($_SESSION['user_id'])){
     $user_id=$_SESSION['user_id'];
       $date= date("d/m/y");
       //date closed
        date_default_timezone_set("Asia/Dhaka");
        $time=date("h:i:sa");
        $date_time="On ".$date." at ".$time;
    mysqli_query($con, "update user set last_logout='$date_time' where user_id='$user_id' ");
}

        session_destroy();
header("location: ../index.php");