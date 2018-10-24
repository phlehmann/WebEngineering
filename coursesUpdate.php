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
            // keep track post values
            $id = $_GET['id'];
            
            //Query
            $select = "Select ID, Bezeichnung, Kosten, Max_Teilnehmerzahl, Startdatum, Enddatum, Ort, FK_Bildungsinstitut, FK_Fachbereich, FK_Abschluss from bildungsangebot where ID = '$id'"; //Just 4 Tests
            //$sql = "Select ID, Name, Strasse, Ort, Postleitzahl from bildungsinstitut where FK_email = '$myusername'"; //Im Einsatz
            //Ausführen
                $result = mysqli_query($conn, $select);
                $row = mysqli_fetch_array($result);
                $bezeichnung = $row['Bezeichnung'];
                $teilnehmerzahl = $row['Max_Teilnehmerzahl'];
                $startdatum = $row['Startdatum'];
                $enddatum = $row['Enddatum'];
                $ort = $row['Ort'];
                $bildungsinstitut = $row['FK_Bildungsinstitut'];
                $fachbereich = $row['FK_Fachbereich'];
                $abschluss = $row['FK_Abschluss'];
    

            //Formular anzeigen und mit Daten füllen
            echo "<tr><td>Bezeichnung</td><td><input type='text' name='name' value='".$bezeichnung."' /></td></tr>"
            ."<tr><td>Teilnehmerzahl</td><td><input type='text' name='strasse' value='".$teilnehmerzahl."' /></td></tr>"
            ."<tr><td>Startdatum</td><td><input type='text' name='ort' value='".$startdatum."' /></td></tr>"
            ."<tr><td>Enddatum</td><td><input type='text' name='plz' value='".$enddatum."' /></td></tr>"
            ."<tr><td>Ort</td><td><input type='text' name='email' value='".$ort."' /></td></tr>"
            ."<tr><td>Bildungsinstitut</td><td><input type='text' name='email' value='".$bildungsinstitut."' /></td></tr>"
            ."<tr><td>Fachbereich</td><td><input type='text' name='email' value='".$fachbereich."' /></td></tr>"
            ."<tr><td>Abschluss</td><td><input type='text' name='email' value='".$abschluss."' /></td></tr>"
            ."<tr><td><input type='submit?id=.$id.' name'btnSubmit' value='Speichern'></td><td><input type='reset' name'btnReset' value='Reset'></td></tr>";
            
        ?>
            </table>
        </form>
    </body>
</html>
