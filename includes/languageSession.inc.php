<!-- 
Author: Philipp Lehmann
URL: https://www.youtube.com/watch?v=cgvDMUrQ3vA
-->

<?php
    session_start();
    
    /*session_regenerate_id();
    if(!isset($_SESSION['login_user']))      // if there is no valid session
    {
            header("Location: login.php");
    }
    else{*/
        if(!isset($_SESSION['lang']))
             $_SESSION['lang'] = "en";
        else if(isset($_GET['lang']) && $_SESSION['lang'] != $_GET['lang'] && !empty($_GET['lang'])){
            if($_GET['lang'] == "en")
                $_SESSION['lang'] = "en";
            else if($_GET['lang'] == "de")
                $_SESSION['lang'] = "de";
        }

        require_once "languages/" . $_SESSION['lang'] . ".php";      
    //}
    
    
?>