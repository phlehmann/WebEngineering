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
    $dbHost = "127.0.0.1";		//Location Of Database
    $dbUser = "root";			//Database User Name 
    $dbPass = "";			//Database Password 
    $dbDatabase = "webengdb";		//Database Name

    // Verbindung mit DB-Server aufbauen 
   $link=mysqli_connect('localhost', $dbUser, $dbPass);
   mysqli_select_db($link, $dbDatabase);
   
    // UTF-8 Codierung für ä,ö,ü
    mysqli_query($link, "SET NAMES 'utf8'");

   /* Aktion ausführen */
   if(isset($_POST["ak"]))
   {
      /* neu eintragen */
      if($_POST["ak"]=="in")
      {
         $sqlab = "INSERT INTO bildungsangebot"
           . "(`ID`, `Bezeichnung`, `Kosten`, `Max_Teilnehmeranzahl`,"
           . " `Startdatum`, `Enddatum`, `Ort`, `FK_Bildungsinstitut`,"
           . " `FK_Fachbereich`, `FK_Abschluss`) VALUES ('', '"
           . $_POST["bezeichnung"][0] . "', '"
           . $_POST["kosten"][0] . "', '"
           . $_POST["max_teilnehmeranzahl"][0] . "', '"
           . $_POST["startdatum"][0] . "', '"
           . $_POST["enddatum"][0] . "', '"
           . $_POST["ort"][0] . "', '"
           . $_POST["bildungsinstitut"][0] . "', '"
           . $_POST["fachbereich"][0] . "', '"
           . $_POST["abschluss"][0] . "')";
         $num=mysqli_query($link, $sqlab);
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
           . "`Max_Teilnehmeranzahl` = '" . $_POST["max_teilnehmeranzahl"][$id] . "', "
           . "`Startdatum` = '" . $_POST["startdatum"][$id] . "', "
           . "`Enddatum` = '" . $_POST["enddatum"][$id] . "', "
           . "`Ort` = '" . $_POST["ort"][$id] . "', "
           . "`FK_Bildungsinstitut` = '" . $_POST["bildungsinstitut"][$id] . "', "
           . "`FK_Fachbereich` = '" . $_POST["fachbereich"][$id] . "', "
           . "`FK_Abschluss` = '" . $_POST["abschluss"][$id] . "'"
           . " WHERE `ID` = '$id'";
         $num=mysqli_query($link, $sqlab);
//		 if ($num==1) {echo "Datensatz angepasst";}
//		 else {echo "hat nicht funktioniert";}
      }
      
      /* löschen */
      else if($_POST["ak"]=="de")
      {
         $sqlab = "delete from bildungsangebot WHERE `ID` = " . $_POST["id"];
         mysqli_query($link, $sqlab);
      }
   }

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
    . "<td>Max_Teilnehmeranzahl</td>"
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
    . "<td><input name='max_teilnehmeranzahl[0]' size='6' /></td>"
    . "<td><input name='startdatum[0]' size='10' /></td>"
    . "<td><input name='enddatum[0]' size='10' /></td>"
    . "<td><input name='ort[0]' size='10' /></td>"
    . "<td><input name='bildungsinstitut[0]' size='10' /></td>"
    . "<td><input name='fachbereich[0]' size='10' /></td>"
    . "<td><input name='abschluss[0]' size='10' /></td>"
    . "<td><a href='javascript:send(0,0);'>neu eintragen</a></td>"
    . "</tr>";

   /* Anzeigen */
   $res = mysqli_query($link, "select * from personen");

   /* Alle vorhandenen Datensätze */
   while ($dsatz = mysqli_fetch_assoc($res))
   {
      $id = $dsatz["ID"];
      echo "\n\n<tr>"
       . "<td><input name='id[$id]' value='" . $dsatz['ID'] . "' size='8' /></td>"
       . "<td><input name='bezeichnung[$id]' value='" . $dsatz['Bezeichnung'] . "' size='6' /></td>"
       . "<td><input name='kosten[$id]' value='" . $dsatz['Kosten'] . "' size='6' /></td>"
       . "<td><input name='max_teilnehmeranzahl[$id]' value='" . $dsatz['Max_Teilnehmeranzahl'] . "' size='6' /></td>"
       . "<td><input name='startdatum[$id]' value='" . $dsatz['Startdatum'] . "' size='10' /></td>"
       . "<td><input name='enddatum[$id]' value='" . $dsatz['Enddatum'] . "' size='10' /></td>"
       . "<td><input name='ort[$id]' value='" . $dsatz['Ort'] . "' size='10' /></td>"
       . "<td><input name='bildungsinstitut[$id]' value='" . $dsatz['FK_Bildungsinstitut'] . "' size='10' /></td>"
       . "<td><input name='fachbereich[$id]' value='" . $dsatz['FK_Fachbereich'] . "' size='10' /></td>"
       . "<td><input name='abschluss[$id]' value='" . $dsatz['FK_Abschluss'] . "' size='10' /></td>"
       . "<td><a href='javascript:send(1,$id);'>&auml;ndern</a>"
       . " <a href='javascript:send(2,$id);'>l&ouml;schen</a></td>"
       . "</tr>";
   }
   echo "</table>";
   echo "</form>";
?>
</body>
</html>
