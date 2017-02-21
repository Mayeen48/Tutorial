<?php
namespace App\ThreadClass;
session_start();
 class ThreadClass{
     
     public function __construct() {
         echo "Please wait....."."<br/>";
         
     }
     public function threadInsert(){
         $con= mysqli_connect("localhost", "root", "", "djit") or die("database not found.....");
         $threadName=$_POST['threadName'];
         $user_id=$_SESSION['user_id'];
         $actual_name = $_FILES["threadFile"]["name"];
         $dir = "../resources/ThreadImage";
        $newFile= time().$actual_name;
        copy ($_FILES['threadFile']['tmp_name'],"$dir/$newFile");
        
          $date= date("d/m/y");
       //date closed
        date_default_timezone_set("Asia/Dhaka");
        $time=date("h:i:sa");
        $date_time="On ".$date." at ".$time;
        
         if (empty($actual_name))
        {
           $threadIn= mysqli_query($con, "insert into thread values('','$user_id','$threadName','','$date_time','')");
            header("location: ../index.php");
        }
        else{
             $threadIn= mysqli_query($con, "insert into thread values('','$user_id','$threadName','$newFile','$date_time','')");
             header("location: ../index.php");
        }

     }

     public function threadUpdate()
        {
            $con= mysqli_connect("localhost", "root", "", "djit") or die("database not found.....");
            $user_id=$_GET['user_id'];
            $t_id=$_GET['t_id'];
            $thread=$_POST['thread'];
            $oldImage=$_POST['oldImage'];
            $actual_name = $_FILES["newImage"]["name"];
            
            $date= date("d/m/y");
       //date closed
        date_default_timezone_set("Asia/Dhaka");
        $time=date("h:i:sa");
        $date_time="On ".$date." at ".$time;
        
        if (empty($actual_name))
        {
            $update= mysqli_query($con, "update thread set thread='$thread', "
                    . "updated_at='$date_time' where user_id='$user_id' AND t_id='$t_id'");
            header("location: ../index.php");
        }
        else{
//            $comImageUnlink= mysqli_query($con, "select * from likecomment where user_id='$user_id' AND lc_id='$lc_id'");
//            $fetchComImageUnlink= mysqli_fetch_array($comImageUnlink);
            unlink("../resources/ThreadImage/".$oldImage);
            $dir = "../resources/ThreadImage";
        $newFile= time().$actual_name;
        copy ($_FILES['newImage']['tmp_name'],"$dir/$newFile");
        
        $update= mysqli_query($con, "update thread set thread='$thread', tImage='$newFile', "
                    . "updated_at='$date_time' where user_id='$user_id' AND t_id='$t_id'");
        header("location: ../index.php");
        }
        }
        
         public function deleteThread($user_id, $t_id)
        {
            $con= mysqli_connect("localhost", "root", "", "djit") or die("database not found.....");
//            $user_id=$_GET['user_id'];
//            $lc_id=$_GET['lc_id'];
            
            $comImageUnlink= mysqli_query($con, "select * from thread where user_id='$user_id' AND t_id='$t_id'");
            $fetchComImageUnlink= mysqli_fetch_array($comImageUnlink);
            $image=$fetchComImageUnlink['tImage'];
            unlink("../resources/ThreadImage/".$image);
            $delete= mysqli_query($con, "delete from thread where user_id='$user_id' AND t_id='$t_id'");
            $selectComment= mysqli_query($con, "select * from likecomment where thread_id='$t_id'");
            while ($fetchComment= mysqli_fetch_array($selectComment)){
                $imageunlink=$fetchComment['comment_image'];
                $lc_id=$fetchComment['lc_id'];
                unlink("../resources/Images/$imageunlink");
                $deletecomment=mysqli_query($con, "delete from likecomment where lc_id='$lc_id'");
                
            }
            header("location: ../index.php");
        
        }
 }