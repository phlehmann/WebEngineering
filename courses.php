<!DOCTYPE html>
<?php
    include 'includes/translator.inc.php';
    include("includes/DBconnection.inc.php");
?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title> Meine Kurse</title>
  <link rel="stylesheet" type="text/css" href="stylesheet/courses.css">

<script type="text/javascript">
    //Zeile hinzufügen
    function addRow(){
        var tbl = document.getElementById("crudTable");
    	var lastRow = tbl.rows.length-1;
    	var tr = tbl.insertRow(lastRow);  
    	var td1 = tr.insertCell(0);
        var td2 = tr.insertCell(1);
        var td3 = tr.insertCell(2);
        var td4 = tr.insertCell(3);
        var td5 = tr.insertCell(4);
        var td6 = tr.insertCell(5);
        var td7 = tr.insertCell(6);
        var td8 = tr.insertCell(7);
        var td9 = tr.insertCell(8);
        var td10 = tr.insertCell(9);
        var td11 = tr.insertCell(10);
    	td1.innerHTML = "<input class='text' name='id[lastRow+1]' size='8'>";
        td2.innerHTML = "<input class='text' name='bezeichnung[lastRow+1]' size='6'>";
        td3.innerHTML = "<input class='text' name='kosten[lastRow+1]' size='6'>";
        td4.innerHTML = "<input class='text' name='max_teilnehmerzahl[lastRow+1]' size='6'>";
        td5.innerHTML = "<input class='text' name='startdatum[lastRow+1]' size='10'>";
        td6.innerHTML = "<input class='text' name='enddatum[lastRow+1]' size='10'>";
        td7.innerHTML = "<input class='text' name='ort[lastRow+1]' size='10'>";
        td8.innerHTML = "<input class='text' name='bildungsinstitut[lastRow+1]' size='10'>";
        td9.innerHTML = "<input class='text' name='fachbereich[lastRow+1]' size='10'>";
        td10.innerHTML = "<input class='text' name='abschluss[lastRow+1]' size='10'>";
        td11.innerHTML = "<a class='ok' href='courses.php?insert=true'><img border='0' alt='ok' src='images/ok.png' height='20' width='20' align='top'></a><a class='cancel' href='javascript:deleteRow("+lastRow+");'><img border='0' alt='cancel' src='images/cancel.png' height='20' width='20' align='top'></a>";
    }
    
    function deleteRow(actualRow){
        var tbl = document.getElementById("crudTable");
        tbl.deleteRow(actualRow);
    }
</script>
</head>

<body>
    <div class="container">
            <div class="row">
                <h3><?php echo $lang['myCourses']?></h3>
            </div>
            <div class="row">
                <form method="get">
                <table id="crudTable">
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
                                . "<td><a class='update' href='coursesUpdate.php?id=".$id."'><img border='0' alt='edit' src='images/edit.png' height='20' width='20' align='top'></a>"
                                . "<a class='delete' href='coursesDelete.php?id=".$id."'><img border='0' alt='delete' src='images/delete.png' height='20' width='20' align='top'></a></td>"
                                . "</tr>";
                       }
                       echo "<tr><td valign='middle' colspan='3'><a id='addLink' href='javascript:addRow()'><img class='add' border='0' alt='edit' src='images/add.png' height='20' width='20' align='top'>".$lang['addCourse']."</a></td></tr>";
                       
                       if (isset($_GET['insert'])){
                            //einfügen
                            $lastRow = 0;
                            while ($row = mysqli_fetch_array($result)){
                                   $lastRow++;
                                   echo $lastRow;
                            }
                       }
                       
                       
                      ?>
                      </tbody>
                </table>
                </form>
        </div>
    </div> <!-- /container -->
</body>
</html>
