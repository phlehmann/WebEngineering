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
        <script type="text/javascript">
            function edit(id){
                
            }
        </script>
    </head>
    <body>
        <?php
        // put your code here
        ?>
        <h3>Benutzerprofil</h3>
        <table>
        <form name="record" action="userprofile.php">
            <tr><td>Name</td><td><input type="text" name="name" value="" /></td></tr>
            <tr><td>Strasse</td><td><input type="text" name="strasse" value="" /></td><td><a href='javascript:edit($id);'><img src="../images/edit.png" alt="edit"></a></td></tr>
            <tr><td>PLZ</td><td><input type="text" name="plz" value="" /></td><td><a href='javascript:edit($id);'><img src="../images/edit.png" alt="edit"></a></td></tr>
            <tr><td>Ort</td><td><input type="text" name="ort" value="" /></td><td><a href='javascript:edit($id);'><img src="../images/edit.png" alt="edit"></a></td></tr>
            <tr><td><input type="submit" value="Speichern" name="save" /></td>
            <td><input type="reset" value="Zurücksetzen" name="save" /></td></tr>
        </form>
        </table>
    </body>
</html>
