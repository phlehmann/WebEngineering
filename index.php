<!DOCTYPE html>
<?php 
    include 'includes/languageSession.inc.php';
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $lang['title']?></title>
        <link rel="stylesheet" type="text/css" href="stylesheet/all.css">
    </head>
    <body>
        <nav>
            <div class="nav-link"><a href="#"><?php echo $lang['home']?></a></div>
            <div class="nav-link"><a href="#"><?php echo $lang['about']?></a></div>
            <div class="nav-link"><a href="#"><?php echo $lang['contact']?></a></div>
            <div class="nav-link"><a href="login.php"><?php echo $lang['login']?></a></div>
        </nav>
        <footer>
            <div class="footer lang"><a href="index.php?lang=en"><?php echo $lang['english']?></a></div>
            <div class="footer lang"><a href="index.php?lang=de"><?php echo $lang['german']?></a></div>
        </footer>
    </body>
</html> 