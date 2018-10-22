<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title> Meine Kurse</title>
  <link rel="stylesheet" type="text/css" href="courses.css">
  <link rel="stylesheet" type="text/css" href="all.css">

<script type="text/javascript">

</script>
</head>

<body>
    <div class="container">
            <div class="row">
                <h3>PHP CRUD Grid</h3>
            </div>
            <div class="row">
                <p>
                    <a href="create.php" class="btn btn-success">Create</a>
                </p>
                 
                <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Bezeichnung</th>
                          <th>Kosten</th>
                          <th>Teilnehmerzahl</th>
                          <th>Startdatum</th>
                          <th>Enddatum</th>
                          <th>Ort</th>
                          <th>Bildungsinstitut</th>
                          <th>Fachbereich</th>
                          <th>Abschluss</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                       include("includes/DBconnection.inc.php");
                       mysqli_query($conn, "SET NAMES 'utf8'"); // ä, ö, ü richtig darstellen
                       $result = mysqli_query($conn, "select * from bildungsangebot");
                       while ($row = mysqli_fetch_assoc($result)) {
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
                      ?>
                      </tbody>
                </table>
        </div>
    </div> <!-- /container -->
</body>
</html>
