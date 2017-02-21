<?php

require 'Comclass.php';
use App\Comclass\Comclass;

if (isset($_SESSION['user_id'])){
    $users = new Comclass();
    $users->comment();
}
 else {
     echo '<script>';
         echo "alert('You have to login First....');";
         echo "window.location.replace('../view/login.php')";
         echo '</script>'; 
    //header("location: ../view/login.php");
}