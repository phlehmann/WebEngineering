<!--
author: Philipp Lehmann
Source: https://www.w3schools.com/howto/howto_js_filter_table.asp
-->
<!DOCTYPE html>
<?php 
    include 'includes/translator.inc.php';
    include 'includes/DBconnection.inc.php';

?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $lang['title']?></title>
        <link rel="stylesheet" type="text/css" href="stylesheet/all.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
    </head>
    <body>
        <nav>
            <a href="#"><div class="nav-link"><?php echo $lang['home']?></div></a>
            <a href="userprofile.php"><div class="nav-link"><?php echo $lang['profile']?></div></a>
            <a href="registration.php"><div class="nav-link"><?php echo $lang['register']?></div></a>
            <a href="logout.php"><div class="nav-link"><?php echo $lang['logout']?></div></a>
        </nav>
        <footer>
            <div class="footer lang"><a href="index.php?lang=en"><?php echo $lang['english']?></a></div>
            <div class="footer lang"><a href="index.php?lang=de"><?php echo $lang['german']?></a></div>
        </footer>
    </body>
</html> 