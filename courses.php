<!DOCTYPE html>
<?php
    include 'includes/languageSession.inc.php';
    include("includes/DBconnection.inc.php");
?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title> Meine Kurse</title>
  <link rel="stylesheet" type="text/css" href="stylesheet/courses.css">

<script type="text/javascript">

</script>
</head>

<body>
    <div class="container">
            <div class="row">
                <h3><?php echo $lang['myCourses']?></h3>
            </div>
            <div class="row">              
                <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th><?php echo $lang['label']?></th>
                          <th><?php echo $lang['costs']?></th>
                          <th><?php echo $lang['attendance']?></th>
                          <th><?php echo $lang['startingDate']?></th>
                          <th><?php echo $lang['endDate']?></th>
                          <th><?php echo $lang['place']?></th>
                          <th><?php echo $lang['educationalInstitute']?></th>
                          <th><?php echo $lang['areaOfStudies']?></th>
                          <th><?php echo $lang['graduation']?></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                       mysqli_query($conn, "SET NAMES 'utf8'"); // ä, ö, ü richtig darstellen
                       $result = mysqli_query($conn, "select * from bildungsangebot");
                       while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row["ID"];
                                echo "\n\n<tr>"
                                . "<td><input class='text' name='id[$id]' value='" . $row['ID'] . "' size='8' /></td>"
                                . "<td><input class='text' name='bezeichnung[$id]' value='" . $row['Bezeichnung'] . "' size='6' /></td>"
                                . "<td><input class='text' name='kosten[$id]' value='" . $row['Kosten'] . "' size='6' /></td>"
                                . "<td><input class='text' name='max_teilnehmerzahl[$id]' value='" . $row['Max_Teilnehmerzahl'] . "' size='6' /></td>"
                                . "<td><input class='text' name='startdatum[$id]' value='" . $row['Startdatum'] . "' size='10' /></td>"
                                . "<td><input class='text' name='enddatum[$id]' value='" . $row['Enddatum'] . "' size='10' /></td>"
                                . "<td><input class='text' name='ort[$id]' value='" . $row['Ort'] . "' size='10' /></td>"
                                . "<td><input class='text' name='bildungsinstitut[$id]' value='" . $row['FK_Bildungsinstitut'] . "' size='10' /></td>"
                                . "<td><input class='text' name='fachbereich[$id]' value='" . $row['FK_Fachbereich'] . "' size='10' /></td>"
                                . "<td><input class='text' name='abschluss[$id]' value='" . $row['FK_Abschluss'] . "' size='10' /></td>"
                                . "<td><a class='btn btn-success' href='coursesUpdate.php?id=".$id."'><img border='0' alt='edit' src='images/edit.png' height='20' width='20' align='top'></a>"
                                . "<a class='btn btn-danger' href='coursesDelete.php?id=".$id."'><img border='0' alt='edit' src='images/delete.png' height='20' width='20' align='top'></a></td>"
                                . "</tr>";
                       }
                       echo "<tr><td valign='middle' colspan='2'><a href='create.php'><img class='add' border='0' alt='edit' src='images/add.png' height='20' width='20' align='top'>".$lang['addCourse']."</a></td></tr>";
                      ?>
                      </tbody>
                </table>
        </div>
    </div> <!-- /container -->
</body>
</html>
