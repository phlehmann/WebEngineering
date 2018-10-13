<!DOCTYPE html>
<!--
author: Bodo Grütter
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="userprofile.css">
        <link rel="stylesheet" type="text/css" href="all.css">
        <title>Benutzerkonto</title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
        <form name="record" action="userprofile.php">
            Name<input type="text" name="name" value="" /><br/>
            Strasse<input type="text" name="strasse" value="" /><br/>
            PLZ<input type="text" name="plz" value="" /><br/>
            Ort<input type="text" name="ort" value="" /><br/>
            <input type="submit" value="Speichern" name="save" />
            <input type="reset" value="Zurücksetzen" name="save" />
        </form>
    </body>
</html>
