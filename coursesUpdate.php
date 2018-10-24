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
                $id = 0;
                if ($_GET) {
                    // keep track post values
                    $id = $_GET['id'];
                } else if ($_POST) {
                    $id = $_POST['id'];
                    $update = "Update bildungsangebot set `Bezeichnung` = '" . $_POST['bezeichnung'] . "', `Kosten` = '" . $_POST['kosten'] . "', `Max_Teilnehmerzahl` = '" . $_POST['max_teilnehmerzahl'] . "', `Startdatum` = '" . $_POST['startdatum'] . "', `Enddatum` = '" . $_POST['enddatum'] . "', `Ort` = '" . $_POST['ort'] . "', `FK_Bildungsinstitut` = '" . $_POST['bildungsinstitut'] . "', `FK_Fachbereich`= '" . $_POST['fachbereich'] . "', `FK_Abschluss` = '" . $_POST['abschluss'] . "' where `ID` = '" . $_POST['id'] . "'"; //Just 4 Tests
                    if (mysqli_query($conn, $update)) {
                        header("Location:courses.php");
                    } else {
                        echo "Error: " . $update . "<br>" . mysqli_error($conn);
                    }
                    mysqli_close($conn);
                }
                //Query
                $select = "Select ID, Bezeichnung, Kosten, Max_Teilnehmerzahl, Startdatum, Enddatum, Ort, FK_Bildungsinstitut, FK_Fachbereich, FK_Abschluss from bildungsangebot where ID = '$id'"; //Just 4 Tests
                //$sql = "Select ID, Name, Strasse, Ort, Postleitzahl from bildungsinstitut where FK_email = '$myusername'"; //Im Einsatz
                //Ausführen
                $result = mysqli_query($conn, $select);
                $row = mysqli_fetch_array($result);
                $id = $row['ID'];
                $bezeichnung = $row['Bezeichnung'];
                $kosten = $row['Kosten'];
                $teilnehmerzahl = $row['Max_Teilnehmerzahl'];
                $startdatum = $row['Startdatum'];
                $enddatum = $row['Enddatum'];
                $ort = $row['Ort'];
                $bildungsinstitut = $row['FK_Bildungsinstitut'];
                $fachbereich = $row['FK_Fachbereich'];
                $abschluss = $row['FK_Abschluss'];

                //Formular anzeigen und mit Daten füllen
                echo "<tr><td>ID</td><td><input type='text' name='id' value='" . $id . "' /></td></tr>"
                . "<tr><td>Bezeichnung</td><td><input type='text' name='bezeichnung' value='" . $bezeichnung . "' /></td></tr>"
                . "<tr><td>Kosten</td><td><input type='text' name='kosten' value='" . $kosten . "' /></td></tr>"
                . "<tr><td>Teilnehmerzahl</td><td><input type='text' name='max_teilnehmerzahl' value='" . $teilnehmerzahl . "' /></td></tr>"
                . "<tr><td>Startdatum</td><td><input type='date' name='startdatum' value='" . $startdatum . "' /></td></tr>"
                . "<tr><td>Enddatum</td><td><input type='date' name='enddatum' value='" . $enddatum . "' /></td></tr>"
                . "<tr><td>Ort</td><td><input type='text' name='ort' value='" . $ort . "' /></td></tr>"
                . "<tr><td>Bildungsinstitut</td><td><input type='text' name='bildungsinstitut' value='" . $bildungsinstitut . "' /></td></tr>"
                . "<tr><td>Fachbereich</td><td><input type='text' name='fachbereich' value='" . $fachbereich . "' /></td></tr>"
                . "<tr><td>Abschluss</td><td><input type='text' name='abschluss' value='" . $abschluss . "' /></td></tr>"
                . "<tr><td><input type='submit' name'btnSubmit' value='Speichern'></td><td><input type='reset' name'btnReset' value='Reset'></td></tr>";
                ?>
            </table>
        </form>
    </body>
</html>