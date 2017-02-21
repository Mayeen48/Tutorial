<?php
namespace App\Comclass;
session_start();
 class Comclass{
     
     public function __construct() {
         echo "Please wait....."."<br/>";
         
     }
     public function comment(){
         $con= mysqli_connect("localhost", "root", "", "djit") or die("database not found.....");
         $user_id= $_SESSION['user_id'];
         $t_id=$_GET['t_id'];
         $comment=$_POST['comment'];
         
        $date= date("d/m/y");
       //date closed
        date_default_timezone_set("Asia/Dhaka");
        $time=date("h:i:sa");
        $date_time="On ".$date." at ".$time;
        
        $actual_name = $_FILES["file"]["name"];
        
        if (empty($actual_name))
        {
            $insert= mysqli_query($con, "insert into likecomment values('','$user_id','$t_id','$comment','','','$date_time','')");
            header("location: ../index.php");
        }
        else{
        $dir = "../resources/Images";
        $file= time().$actual_name;
        copy ($_FILES['file']['tmp_name'],"$dir/$file");
        
        $insert= mysqli_query($con, "insert into likecomment values('','$user_id','$t_id','$comment','$file','','$date_time','')");
        header("location: ../index.php");
        }
     
        }
        public function commentUpdate()
        {
            $con= mysqli_connect("localhost", "root", "", "djit") or die("database not found.....");
            $user_id=$_GET['user_id'];
            $lc_id=$_GET['lc_id'];
            $comment=$_POST['comment'];
            $oldImage=$_POST['oldImage'];
            $actual_name = $_FILES["newImage"]["name"];
            
            $date= date("d/m/y");
       //date closed
        date_default_timezone_set("Asia/Dhaka");
        $time=date("h:i:sa");
        $date_time="On ".$date." at ".$time;
        
        if (empty($actual_name))
        {
            $update= mysqli_query($con, "update likecomment set comments='$comment', "
                    . "updated_at='$date_time' where user_id='$user_id' AND lc_id='$lc_id'");
            header("location: ../index.php");
        }
        else{
//            $comImageUnlink= mysqli_query($con, "select * from likecomment where user_id='$user_id' AND lc_id='$lc_id'");
//            $fetchComImageUnlink= mysqli_fetch_array($comImageUnlink);
            unlink("../resources/Images/".$oldImage);
            $dir = "../resources/Images";
        $newFile= time().$actual_name;
        copy ($_FILES['newImage']['tmp_name'],"$dir/$newFile");
        
        $update= mysqli_query($con, "update likecomment set comments='$comment', comment_image='$newFile', "
                    . "updated_at='$date_time' where user_id='$user_id' AND lc_id='$lc_id'");
        header("location: ../index.php");
        }
        }
        public function commentDelete($user_id, $lc_id)
        {
            $con= mysqli_connect("localhost", "root", "", "djit") or die("database not found.....");
//            $user_id=$_GET['user_id'];
//            $lc_id=$_GET['lc_id'];
            
            $comImageUnlink= mysqli_query($con, "select * from likecomment where user_id='$user_id' AND lc_id='$lc_id'");
            $fetchComImageUnlink= mysqli_fetch_array($comImageUnlink);
            $image=$fetchComImageUnlink['comment_image'];
            unlink("../resources/Images/".$image);
            $delete= mysqli_query($con, "delete from likecomment where user_id='$user_id' AND lc_id='$lc_id'");
            header("location: ../index.php");
        
        }
 }