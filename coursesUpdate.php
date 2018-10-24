<!DOCTYPE html>
<!--
author: Bodo Grütter
-->
<?php 
    include 'includes/translator.inc.php';
    include("includes/DBconnection.inc.php");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="userprofile.css">
        <link rel="stylesheet" type="text/css" href="all.css">
        <title>Benutzerkonto</title>
    </head>
    <body>
        <h3>Benutzerprofil</h3>
        <form action="coursesUpdate.php" method="post">
            <table>
        <?php 
            //$myusername = $_REQUEST['email']; //Fehler?
            $id = $_POST['id'];
            //Query
            $select = "Select ID, Bezeichnung, Kosten, Max_Teilnehmerzahl, Startdatum, Enddatum, Ort, FK_Bildungsinstitut, FK_Fachbereich, FK_Abschluss from bildungsangebot where ID = '$id'"; //Just 4 Tests
            //$sql = "Select ID, Name, Strasse, Ort, Postleitzahl from bildungsinstitut where FK_email = '$myusername'"; //Im Einsatz
            //Ausführen
            $result = mysqli_query($conn, $select);
            
            echo 
            
            //Formular anzeigen und mit Daten füllen
            $row = mysqli_fetch_array($result);
            $name = $row['Name'];
            $strasse = $row['Strasse'];
            $ort = $row['Ort'];
            $plz = $row['Postleitzahl'];
            $email = $row['FK_email'];
            
            echo "<tr><td>Name</td><td><input type='text' name='name' value='".$name."' /></td></tr>"
            ."<tr><td>Strasse</td><td><input type='text' name='strasse' value='".$strasse."' /></td></tr>"
            ."<tr><td>Ort</td><td><input type='text' name='ort' value='".$ort."' /></td></tr>"
            ."<tr><td>PLZ</td><td><input type='text' name='plz' value='".$plz."' /></td></tr>"
            ."<tr><td>Email</td><td><input type='text' name='email' value='".$email."' /></td></tr>"
            ."<tr><td><input type='submit' name'btnSubmit' value='Speichern'></td><td><input type='reset' name'btnReset' value='Reset'></td></tr>";
            
            $update = "Update bildungsinstitut set `Name` = '$name', `Strasse` = '$strasse', `Ort` = '$ort', `Postleitzahl` = '$plz', `email` = '$email'";
            mysqli_query($conn, $update);
            mysqli_close($conn);
        ?>
            </table>
        </form>
    </body>
</html>
