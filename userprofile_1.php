<!--
author: Bodo Grütter
-->
<!DOCTYPE html>
<?php 
    include 'includes/translator.inc.php';
    include 'includes/session.inc.php';
    include 'includes/DBconnection.inc.php';
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $lang['title']?></title>
        <link rel="stylesheet" type="text/css" href="stylesheet/all.css">
    </head>
    <body>
        <nav>
            <a href="index.php"><div class="nav-link"><?php echo $lang['home']?></div></a>
            <a href="#"><div class="nav-link"><?php echo $lang['profile']?></div></a>
            <a href="#"><div class="nav-link"><?php echo $lang['login']?></div></a>
            <a href="logout.php"><div class="nav-link"><?php echo $lang['logout']?></div></a>
        </nav>
        <div id="content" style="overflow-y: scroll;">
            <?php
            $session_user = $_SESSION['login_user'];
            
            $sql = "SELECT * FROM bildungsinstitut WHERE FK_email='$session_user'";
    
            $r_query = mysqli_query($conn, $sql); 
            
            while ($row = mysqli_fetch_array($r_query)){
                echo $row[1];
                echo $row[2];
                echo $row[3];
                echo $row[4];
            }
            
            ?>
            
        </div>
        <footer>
            <div class="footer lang"><a href="index.php?lang=en"><?php echo $lang['english']?></a></div>
            <div class="footer lang"><a href="index.php?lang=de"><?php echo $lang['german']?></a></div>
        </footer>
    </body>
</html> 