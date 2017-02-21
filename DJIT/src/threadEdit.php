<?php
session_start();



if (!isset($_SESSION['user_id']))
{
    header("location: ../view/login.php");
}
 else {
     $con= mysqli_connect("localhost", "root", "", "djit") or die("database not found.....");
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
       $threadQ= mysqli_query($con, "select * from thread where t_id='$t_id' AND user_id='$user_id'");
       $fetchthread= mysqli_fetch_array($threadQ);
       ?>
<center>
    <form action="threadUpdate.php?t_id=<?php echo $t_id."&&"."user_id=".$user_id; ?>" method="POST" enctype="multipart/form-data">
        <table border="1">
            <thead>
                <tr>
                <th colspan="2"> Thread Update</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td>Thread</td>
                <td>
                    <!--<input type="text" name="thread" value="<?php echo $fetchthread['thread']; ?>">-->
                    <textarea style="width: 200px; height: 50px;" name="thread"><?php echo $fetchthread['thread']; ?></textarea>
                </td>
                </tr>
                <tr>
                <td>Previus Image</td>
                <td>
                    <img width="200" height="150" src="../resources/ThreadImage/<?php echo $fetchthread['tImage']; ?>">
                    <input type="hidden" name="oldImage" value="<?php echo $fetchthread['tImage']; ?>">
                </td>
                </tr>
                <tr>
                <td>New Image</td>
                <td><input type="file" name="newImage"></td>
                </tr>
                <tr>
                <td colspan="2"><center><input type="submit" value="UPDATE"></center></td>
                </tr>
            </tbody>
        </table>
        </form>
</center>

<?php
   }
 }
      