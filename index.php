<!DOCTYPE html>
<?php 
    include 'languageSession.php';
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $lang['title']?></title>
        <link rel="stylesheet" type="text/css" href="stylesheet/all.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark"></nav>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#"><?php echo $lang['home']?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><?php echo $lang['about']?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><?php echo $lang['contact']?></a>
            </li>
        </ul>
        
        <div class="footer bg-dark">
            <a href="index.php?lang=en"><?php echo $lang['english']?></a> |
            <a href="index.php?lang=de"><?php echo $lang['german']?></a>
            
        </div>
    </body>

</html>
