<?php
session_start();
if (!isset($_SESSION['user_id']))
{
         echo '<script>';
         echo "alert('You have to login First....');";
         echo "window.location.replace('../view/login.php')";
         echo '</script>'; 
    //header("location: ../index.php");
}
 else {
   $user_id=$_GET['user_id'];
   $lc_id=$_GET['lc_id'];
   if($user_id!=$_SESSION['user_id'])
   {
        echo '<script>';
         echo "alert('You are not Permitted to Update This Comment');";
         echo "window.location.replace('../index.php')";
         echo '</script>';  
   }
   else{
        $con= mysqli_connect("localhost", "root", "", "djit") or die("database not found.....");
       $commentUpdate= mysqli_query($con, "select * from likecomment where user_id='$user_id' AND lc_id='$lc_id'");
       $fetchUpdate= mysqli_fetch_array($commentUpdate);
       ?>

        <center>
            <form action="commentUpdate.php?user_id=<?php echo $user_id."&&"."lc_id=".$lc_id?>" method="POST" enctype="multipart/form-data">
        <table border="1">
            <thead>
                <tr>
                <th colspan="2">Please Update your Details..</th>
                
                </tr>
            </thead>
            <tbody>
                <tr>
                <td>Comment</td>
                <td><textarea name="comment"><?php echo $fetchUpdate['comments']; ?></textarea></td>
                </tr>
                <tr>
                <td>Old Image</td>
                <td>
                    <img width="200" height="180" src="../resources/Images/<?php echo $fetchUpdate['comment_image']; ?>"> 
                    <input type="hidden" name="oldImage" value="<?php echo $fetchUpdate['comment_image'];?>">
                </td>
                </tr>
                <tr>
                <td>New Image</td>
                <td><input type="file" name="newImage"></td>
                </tr>
                <tr>
                
                <td colspan="2"><center><input type="submit" value="SUBMIT"></center></td>
                </tr>
            </tbody>
        </table>
            </form>
        </center>

<?php
   }
   
}