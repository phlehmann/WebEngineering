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
            
            $query = "Select ID, Name, Strasse, Ort, Postleitzahl from bildungsinstitut where ID = 1"; //Just 4 Tests
            //$sql = "Select ID, Name, Strasse, Ort, Postleitzahl from bildungsinstitut where FK_email = '$myusername'"; //Im Einsatz
            $result = mysqli_query($conn, $query);
            
            echo "<h3>Benutzerprofil</h3>";
            echo "\n\n<table>"
            ."<tr><td>Name</td><td><input type='text' name='name[0]' value='' /></td></tr>"
            ."<tr><td>Strasse</td><td><input type='text' name='strasse[0]' value='' /></td></tr>"
            ."<tr><td>PLZ</td><td><input type='text' name='plz[0]' value='' /></td></tr>"
            ."<tr><td>Ort</td><td><input type='text' name='ort[0]' value='' /></td></tr>"
            ."<tr><td>Email</td><td><input type='text' name='email[0]' value='' /></td></tr>"
            ."<tr><td><input type='submit' name'btnSubmit' value='Speichern'></td><td><input type='reset' name'btnReset' value='Reset'></td></tr>"
            ."</table>";
            
            while($row= mysqli_fetch_array($result)){
                echo "<tr><td>Name</td><td><input type='text' name='name[0]' value='".$result['Name']."' /></td></tr>"
            ."<tr><td>Strasse</td><td><input type='text' name='strasse[0]' value='".$result['Strasse']."' /></td></tr>"
            ."<tr><td>PLZ</td><td><input type='text' name='plz[0]' value='".$result['PLZ']."' /></td></tr>"
            ."<tr><td>Ort</td><td><input type='text' name='ort[0]' value='".$result['Ort']."' /></td></tr>"
            ."<tr><td>Email</td><td><input type='text' name='email[0]' value='".$result['FK_email']."' /></td></tr>";
            }
        ?>
        
    </body>
</html>
