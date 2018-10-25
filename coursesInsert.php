<!DOCTYPE html>
<?php
    include 'includes/translator.inc.php';
    include("includes/DBconnection.inc.php");
?>
<html>
    <head>
		<meta charset="UTF-8">
		<title><?php echo $lang['addCourse']?></title>
		<link rel="stylesheet" type="text/css" href="css.inc.css">
    </head>
    <body>
    <?php
	if (!empty($_POST))
	{
                        
            // Formularinhalte in Variablen schreiben
            $feld2 = $_POST['bezeichnung'];
            $feld3 = $_POST['kosten'];
            $feld4 = $_POST['max_teilnehmerzahl'];
            $feld5 = $_POST['startdatum'];
            $feld6 = $_POST['enddatum'];
            $feld7 = $_POST['ort'];
            $feld8 = $_POST['bildungsinstitut'];
            $feld9 = $_POST['fachbereich'];
            $feld10 = $_POST['abschluss'];

            $insert="INSERT INTO `bildungsangebot` (`ID`, `Bezeichnung`, `Kosten`, `Max_Teilnehmerzahl`, `Startdatum`, `Enddatum`, `Ort`, `FK_Bildungsinstitut`, `FK_Fachbereich`, `FK_Abschluss`) VALUES ('', '$feld2', '$feld3', '$feld4', '$feld5', '$feld6', '$feld7', '$feld8', '$feld9', '$feld10')";
            
            if (mysqli_query($conn, $insert)) {
                header("Location:courses.php");
            } else {
                echo "Error: " . $insert . "<br>" . mysqli_error($conn);
            }
            echo "<meta http-equiv='refresh' content='0'>";
            mysqli_close($conn);
	}
	?>
    
	<h3><?php echo $lang['addCourse']?> </h3>
	<form action="coursesInsert.php" method="post">

	<table border="0">
		<tr>
			<td>ID </td>
			<td><input type="text" name="id" size="30" maxlength="40" value="<?php $result = mysqli_query($conn, "
                        SHOW TABLE STATUS LIKE 'bildungsangebot'");
                        $data = mysqli_fetch_assoc($result);
                        echo $data['Auto_increment'];?>" disabled></td>
		</tr>
		<tr>
			<td><?php echo $lang['label']?> </td>
			<td><input type="text" name="bezeichnung" size="30" maxlength="40"></td>
		</tr>
		<tr>
			<td><?php echo $lang['costs']?> </td>
			<td><input type="text" name="kosten" size="30" maxlength="40"></td>
		</tr>
		<tr>
			<td><?php echo $lang['attendance']?> </td>
			<td><input type="text" name="max_teilnehmerzahl" size="30" maxlength="40"></td>
		</tr>
		<tr>
			<td><?php echo $lang['startingDate']?> </td>
			<td><input type="date" name="startdatum" size="30" maxlength="40"></td>
		</tr>
		<tr>
			<td><?php echo $lang['endDate']?> </td>
			<td><input type="date" name="enddatum" size="30" maxlength="40"></td>
		</tr>
                <tr>
			<td><?php echo $lang['place']?> </td>
			<td><input type="text" name="ort" size="30" maxlength="40"></td>
		</tr>
                <tr>
			<td><?php echo $lang['educationalInstitute']?> </td>
                        <td><select name="bildungsinstitut" maxlength="40">
                            <option disabled selected value></option><?php 
                            $select = "Select ID, Name from bildungsinstitut";
                            if(mysqli_query($conn, $select)){
                                $result = mysqli_query($conn, $select);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row["ID"];
                                    $name = $row["Name"];
                                    echo '<option value="'.$id.'">'.$name.'</option>';
                                }
                            }
                        ?></select></td>
		</tr>
                <tr>
			<td><?php echo $lang['areaOfStudies']?> </td>
			<td><select name="fachbereich" maxlength="40">
                            <option disabled selected value></option><?php 
                            $select = "Select ID, Bezeichnung from fachbereich";
                             if(mysqli_query($conn, $select)){
                                $result = mysqli_query($conn, $select);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row["ID"];
                                    $name = $row["Bezeichnung"];
                                    echo '<option value="'.$id.'">'.$name.'</option>';
                                }
                            }
                        ?><</select></td>
		</tr>
                <tr>
			<td><?php echo $lang['graduation']?> </td>
                        <td><select name="abschluss" maxlength="40">
                            <option disabled selected value></option><?php 
                            $select = "Select ID, Bezeichnung from abschluss";
                            if(mysqli_query($conn, $select)){
                                $result = mysqli_query($conn, $select);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row["ID"];
                                    $name = $row["Bezeichnung"];
                                    echo '<option value="'.$id.'">'.$name.'</option>';
                                }
                            }
                        ?><</select></td>
		</tr>
	</table>
	<br/>
        <input type="Submit" name="save" value="<?php echo $lang['save']?>"/>
        <input type="button" name="cancel" value="<?php echo $lang['cancel']?>" onclick="location.href='courses.php'"/>
	</form>
	<br/>
   </body>   
</html>
