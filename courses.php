<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title> DB-Bearbeitung l&ouml;schen, editieren und erfassen in einem File </title>
  <link rel="stylesheet" type="text/css" href="courses.css">
  <link rel="stylesheet" type="text/css" href="all.css">

<script type="text/javascript">
function send(ak,id)
{
   if(ak==0)
       document.f.ak.value = "in";
   else if(ak==1)
       document.f.ak.value = "up";
   else if(ak==2)
   {
       if (confirm("Datensatz mit id " + id + unescape(" l%F6schen?")))  // siehe Umlaute in Javascript
          document.f.ak.value = "de";
       else
          return;
   }
   document.f.id.value = id;
   document.f.submit();
}
</script>
</head>

<body>
<?php
   include("includes/DBconnection.inc.php");

   /* Formular-Beginn */
   echo "<form name='f' action='courses.php'
               method='post'>";
   echo "<input name='ak' type='hidden' />";
   echo "<input name='id' type='hidden' />";

   /* Tabellen-Beginn */
   echo "\n\n<table border>"
    . "<tr>"
    . "<td>ID</td>"
    . "<td>Bezeichnung</td>"
    . "<td>Kosten</td>"
    . "<td>Max_Teilnehmerteilzahl</td>"
    . "<td>Startdatum</td>"
    . "<td>Enddatum</td>"
    . "<td>Ort</td>"
    . "<td>Bildungsinstitut</td>"
    . "<td>Fachbereich</td>"
    . "<td>Abschluss</td>"
    . "</tr>";

   /* Neuer Eintrag */
   echo "\n\n<tr>"
    . "<td><input name='id[0]' size='8' /></td>"
    . "<td><input name='bezeichnung[0]' size='6' /></td>"
    . "<td><input name='kosten[0]' size='6' /></td>"
    . "<td><input name='max_teilnehmerzahl[0]' size='6' /></td>"
    . "<td><input name='startdatum[0]' size='10' /></td>"
    . "<td><input name='enddatum[0]' size='10' /></td>"
    . "<td><input name='ort[0]' size='10' /></td>"
    . "<td><input name='bildungsinstitut[0]' size='10' /></td>"
    . "<td><input name='fachbereich[0]' size='10' /></td>"
    . "<td><input name='abschluss[0]' size='10' /></td>"
    . "<td><a href='javascript:send(0,0);'>neu eintragen</a></td>"
    . "</tr>";

   /* Anzeigen */
   $result = mysqli_query($conn, "select * from bildungsangebot");

   /* Alle vorhandenen Datensätze */
   while ($row = mysqli_fetch_assoc($result))
   {
      $id = $row["ID"];
      echo "\n\n<tr>"
       . "<td><input name='id[$id]' value='" . $row['ID'] . "' size='8' /></td>"
       . "<td><input name='bezeichnung[$id]' value='" . $row['Bezeichnung'] . "' size='6' /></td>"
       . "<td><input name='kosten[$id]' value='" . $row['Kosten'] . "' size='6' /></td>"
       . "<td><input name='max_teilnehmerzahl[$id]' value='" . $row['Max_Teilnehmerzahl'] . "' size='6' /></td>"
       . "<td><input name='startdatum[$id]' value='" . $row['Startdatum'] . "' size='10' /></td>"
       . "<td><input name='enddatum[$id]' value='" . $row['Enddatum'] . "' size='10' /></td>"
       . "<td><input name='ort[$id]' value='" . $row['Ort'] . "' size='10' /></td>"
       . "<td><input name='bildungsinstitut[$id]' value='" . $row['FK_Bildungsinstitut'] . "' size='10' /></td>"
       . "<td><input name='fachbereich[$id]' value='" . $row['FK_Fachbereich'] . "' size='10' /></td>"
       . "<td><input name='abschluss[$id]' value='" . $row['FK_Abschluss'] . "' size='10' /></td>"
       . "<td><a href='javascript:send(1,$id);'>&auml;ndern</a>"
       . " <a href='javascript:send(2,$id);'>l&ouml;schen</a></td>"
       . "</tr>";
   }
   echo "</table>";
   echo "</form>";
   
      /* Aktion ausführen */
   if(isset($_POST["ak"]))
   {
      /* neu eintragen */
      if($_POST["ak"]=="in")
      {
         $sqlab = "INSERT INTO bildungsangebot"
           . "(`ID`, `Bezeichnung`, `Kosten`, `Max_Teilnehmerzahl`,"
           . " `Startdatum`, `Enddatum`, `Ort`, `FK_Bildungsinstitut`,"
           . " `FK_Fachbereich`, `FK_Abschluss`) VALUES ('', '"
           . $_POST["bezeichnung"][0] . "', '"
           . $_POST["kosten"][0] . "', '"
           . $_POST["max_teilnehmerzahl"][0] . "', '"
           . $_POST["startdatum"][0] . "', '"
           . $_POST["enddatum"][0] . "', '"
           . $_POST["ort"][0] . "', '"
           . $_POST["bildungsinstitut"][0] . "', '"
           . $_POST["fachbereich"][0] . "', '"
           . $_POST["abschluss"][0] . "')";
         $num=mysqli_query($conn, $sqlab);
//	     if ($num==1) {echo "Datensatz eingefügt";}
//		 else {echo "Insert hat nicht funktioniert";}
      }

      /* ändern */
      else if($_POST["ak"]=="up")
      {
         $id = $_POST["id"];
         //ANPASSEN   
         $sqlab = "UPDATE personen SET "
           . "`Bezeichnung` = '" . $_POST["bezeichnung"][$id] . "', "
           . "`Kosten` = '" . $_POST["kosten"][$id] . "', "
           . "`Max_Teilnehmerzahl` = '" . $_POST["max_teilnehmerzahl"][$id] . "', "
           . "`Startdatum` = '" . $_POST["startdatum"][$id] . "', "
           . "`Enddatum` = '" . $_POST["enddatum"][$id] . "', "
           . "`Ort` = '" . $_POST["ort"][$id] . "', "
           . "`FK_Bildungsinstitut` = '" . $_POST["bildungsinstitut"][$id] . "', "
           . "`FK_Fachbereich` = '" . $_POST["fachbereich"][$id] . "', "
           . "`FK_Abschluss` = '" . $_POST["abschluss"][$id] . "'"
           . " WHERE `ID` = '$id'";
         $num=mysqli_query($conn, $sqlab);
//		 if ($num==1) {echo "Datensatz angepasst";}
//		 else {echo "hat nicht funktioniert";}
          
      }
      
      /* löschen */
      else if($_POST["ak"]=="de")
      {
         $sqlab = "delete from bildungsangebot WHERE `ID` = " . $_POST["id"];
         mysqli_query($conn, $sqlab);
      }
   }
?>
</body>
</html>
