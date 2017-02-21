
<?php
session_start();
$search=$_GET['search'];
$con= mysqli_connect("localhost", "root", "", "djit") or die("database not found.....");
$selectSearch= mysqli_query($con, "select distinct * from user where name like '%$search' OR name like '$search%' OR name like '%$search%'");
while ($fetchSearch= mysqli_fetch_array($selectSearch)){
    
    //echo $fetchSearch['name']."<br/>";
    ?>
<center>
    <h2>Search Result</h2>
 <table>
                         <?php
                          $select=mysqli_query($con, "Select * from thread");
                              while ($fetch= mysqli_fetch_array($select)){
                                  $thread_id=$fetch['t_id'];
                                  $user_id=$fetch['user_id'];
                                  $tImage=$fetch['tImage'];
                                  
                                  $userFind= mysqli_query($con, "select * from user where user_id='$user_id'");
                                  $userFetch= mysqli_fetch_array($userFind);
                                  $userName=$userFetch['name'];
                                  $date=$fetch['created_at'];
                         ?>
                         <tr>
                         <td colspan="3">
                             <abbr title=" <?php echo "Updated on ".$fetch['updated_at']; ?>"><?php echo $userName." Posted his Mind ".$date; ?></abbr>
                         </td>
                         </tr>
                         <tr>
                             <td colspan="3" >
                                 <font size="5">
                                     <?php echo $fetch['thread']; ?>
                                 </font><br/> 
                                 <a href="../src/threadEdit.php?t_id=<?php echo $thread_id."&&"."user_id=".$user_id;?>">Edit</a> 
                                 || <a href="../src/deleteThread.php?t_id=<?php echo $thread_id."&&"."user_id=".$user_id;?>">Delete</a><br/>
                                 <?php if(!empty($tImage)){ ?>
                                 <img width="300" height="250" src="../resources/ThreadImage/<?php echo $tImage; ?>">
                                  <?php   
                                    }
                                 
                                   ?>
                             </td>
                             
                         </tr>
                         <tr>
                         <td>
                             <?php
                             
                             if (isset($_SESSION['user_id']))
                             {
                                 $user_id=$_SESSION['user_id'];
                                 $like= mysqli_query($con, "select * from likecomment where user_id='$user_id' AND thread_id='$thread_id'");
                                 $likefetch= mysqli_fetch_array($like);
                                 $interest=$likefetch['interest'];
                                 if ($interest=="YES"){
                             
                             ?>
                             <a href="../src/like.php?t_id=<?php echo $thread_id; ?>"><font color="green">Like</font></a> || <?php }  else{?>
                              <a href="../src/like.php?t_id=<?php echo $thread_id; ?>"><font color="black">Like</font></a> ||<?php }} else{ ?>
                              <a href="../src/like.php?t_id=<?php echo $thread_id; ?>"><font color="black">Like</font></a> ||<?php }?>
                         </td>
                             <td><label for="com" class="label"><a href="">Comment</a></label> || </td>
                             <td><a href="">Share</a></td>
                             
                         </tr>
                         <tr>
                             <td colspan="3" id="com" class="com">
                                 <form action="../src/comment.php?t_id=<?php echo $thread_id; ?>" method="POST" enctype="multipart/form-data">
                                     <textarea id="com" class="comment" name="comment"></textarea><br/>
                                 <input type="file" name="file"><br/>
                                 <input type="submit">
                                 </form>
                             </td>
                             
                         </tr>
                         <tr>
                             <td colspan="3"><b>Comments:</b></td>
                             
                         </tr>
                         <?php
                               $comments= mysqli_query($con, "select * from likecomment where thread_id=$thread_id");
                               while($fetch1= mysqli_fetch_array($comments))
                               {
                                   $user_id=$fetch1['user_id'];
                                   $created_at=$fetch1['created_at'];
                                   $likecomment_id=$fetch1['lc_id'];
                                   $image=$fetch1['comment_image'];
                                   $user= mysqli_query($con, "select * from user where user_id=$user_id");
                                   $fetch_user= mysqli_fetch_array($user);
                             ?>
                         <tr>
                             
                             <td colspan="3">
                                 <?php
                                   if(!empty($image)){
                                 ?>
                                   <?php echo "<abbr title='Commented $created_at'><font color='green'><b>".$fetch_user['name'].":"."</b></font>"
                                           .$fetch1['comments']."</abbr>"
                                           ."|| <font size='2'><a href='../src/editcomment.php?lc_id=$likecomment_id && user_id=$user_id'>Edit</a></font> || "
                                           ."<font size='2'> <a href='../src/commentDelete.php?lc_id=$likecomment_id && user_id=$user_id'>Delete</a></font> ||"."<br/>"
                                           ."<img width='200' height='200' src='../resources/Images/$image'>"
                                           ."<br/>"; } else{ if(!empty($fetch1['comments'])){  ?>
                                 <?php echo "<abbr title='Commented $created_at'><font color='green'><b>".$fetch_user['name'].":"
                                         ."</b></font>".$fetch1['comments']."</abbr>"." || <font size='2'><a href='../src/editcomment.php?lc_id=$likecomment_id && user_id=$user_id'>Edit</a></font> || "
                                           ." || <font size='2'><a href='../src/commentDelete.php?lc_id=$likecomment_id && user_id=$user_id'>Delete</a></font> || "."<br/>";} } ?>
                             </td>
                             
                         </tr>
                        
                               <?php  }?>
                          <tr>
                              <td colspan="3"><hr/></td>
                              
                         </tr>
                         <?php }?>
                     </table>
                 </center>
<?php
}