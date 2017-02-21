<?php
session_start();
$t_id=$_GET['t_id'];

 $date= date("d/m/y");
             //date closed
             date_default_timezone_set("Asia/Dhaka");
             $time=date("h:i:sa");
             $date_time="On ".$date." at ".$time;
             $con= mysqli_connect("localhost", "root", "", "djit") or die("database not found.....");
if (!$_SESSION['user_id'])
{
    $_SESSION['t_id']=$t_id;
    echo '<script>';
         echo "alert('You have to login First....');";
         echo "window.location.replace('../view/login.php')";
         echo '</script>'; 
    //header("location: ../view/login.php");
}

 else {
      $user_id=$_SESSION['user_id'];
      $select= mysqli_query($con, "select * from likecomment where thread_id='$t_id' AND user_id='$user_id'");
      $num= mysqli_num_rows($select);
      if ($num>0)
      {
      $fetch= mysqli_fetch_array($select);
      $interest=$fetch['interest'];
      if ($interest=="YES")
      {
        mysqli_query($con, "update likecomment set interest='NO', updated_at='$date_time' where thread_id='$t_id' AND user_id='$user_id'");
        header("location: ../index.php");
      }
      else {
          mysqli_query($con, "update likecomment set interest='YES', updated_at='$date_time' where thread_id='$t_id' AND user_id='$user_id'");
        header("location: ../index.php");
      }
      
      }
 else {
          mysqli_query($con, "insert into likecomment values('','$user_id','$t_id','','','YES','$date_time','')");
          header("location: ../index.php");
      }
}