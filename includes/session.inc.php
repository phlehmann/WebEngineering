<!-- 
Author: Philipp Lehmann
URL: https://www.youtube.com/watch?v=cgvDMUrQ3vA
-->

<?php
    session_start();
    session_regenerate_id();
    
    if(!isset($_SESSION['login_user']))      // if there is no valid session
    {
            header("Location: login.php");
    }    
?>