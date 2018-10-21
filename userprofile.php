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
            include("includes/DBconnection.inc.php");
            //$myusername = $_REQUEST['email']; //Fehler?
            
            //Query
            $select = "Select ID, Name, Strasse, Ort, Postleitzahl, FK_email from bildungsinstitut where ID = 1"; //Just 4 Tests
            //$sql = "Select ID, Name, Strasse, Ort, Postleitzahl from bildungsinstitut where FK_email = '$myusername'"; //Im Einsatz
            //Ausführen
            $result = mysqli_query($conn, $select);
            
            echo "<h3>Benutzerprofil</h3>";
            
            //Formular anzeigen und mit Daten füllen
            $row = mysqli_fetch_array($result);
            $name = $row['Name'];
            $strasse = $row['Strasse'];
            $ort = $row['Ort'];
            $plz = $row['Postleitzahl'];
            $email = $row['FK_email'];
            
            echo "<form action='<?php ".$_SERVER['PHP_SELF']."; ?>' method='post'>";
            echo "\n\n<table>"
            ."<tr><td>Name</td><td><input type='text' name='name' value='".$name."' /></td></tr>"
            ."<tr><td>Strasse</td><td><input type='text' name='strasse' value='".$strasse."' /></td></tr>"
            ."<tr><td>Ort</td><td><input type='text' name='ort' value='".$ort."' /></td></tr>"
            ."<tr><td>PLZ</td><td><input type='text' name='plz' value='".$plz."' /></td></tr>"
            ."<tr><td>Email</td><td><input type='text' name='email' value='".$email."' /></td></tr>"
            ."<tr><td><input type='submit' name'btnSubmit' value='Speichern'></td><td><input type='reset' name'btnReset' value='Reset'></td></tr>"
            ."</table>";
            echo "</form>";
            
            $update = "Update bildungsinstitut set `Name` = '$name', `Strasse` = '$strasse', `Ort` = '$ort', `Postleitzahl` = '$plz', `email` = '$email'";
            mysqli_query($conn, $update);
            mysqli_close($conn);
        ?>
        
    </body>
</html>
