<!DOCTYPE html>
<?php
session_start();
session_regenerate_id();
if(!isset($_SESSION['login_user']))      // if there is no valid session
{
        header("Location: login.php");
}
?>
<html>
	<head>
		<title>HomePage</title>
                <link rel="stylesheet" type="text/css" href="stylesheet/all.css">
		
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="jquery_selectMenu/jquery-ui.css">		
		<style>
			fieldset {
			  border: 0;
			}
			label {
			  display: block;
			  margin: 30px 0 0 0;
			}
			.overflow {
			  height: 00px;
			}
		</style>
		<script src="jquery_selectMenu/external/jquery/jquery.js"></script>
		<script src="jquery_selectMenu/jquery-ui.js"></script>
		<script>
			$( function() {
				$( "#speed" ).selectmenu();

				$( "#files" ).selectmenu();

				$( "#number" )
				.selectmenu()
				.selectmenu( "menuWidget" )
				.addClass( "overflow" );
			} );
		</script>
	</head>
	<body>
		<div id="main">
                    <div id="menu">
                            <a href="#"><div class="menu_buttons" id="btn_homepage">Homepage</div></a>
                            <a href="logout.php"><div class="menu_buttons" id="btn_logout">Logout</div></a>
                    </div>
                    <div id="list">
                        <?php
                            include("DBconnection.inc.php");

                             // get database user
                            $sql = "SELECT * FROM classes";
                            $result = $conn->query($sql);

                            $count = mysqli_num_rows($result);

                        ?>

                        <table style='width:100%'>
                            <tr>
                              <th>Universität</th>
                              <th>Modul</th> 
                              <th>Anzahl Semester</th>
                            </tr>

                            <?php
                            for($i=1; $i <= $count; $i++){
                                $row = $result->fetch_array(1);
                            ?>

                            <tr>
                                <td><?php echo $row['ClassName'] ?></td>
                                <td><?php echo $row['Degree'] ?></td> 
                                <td><?php echo $row['TotSemesters'] ?></td>
                            </tr>

                            <?php
                            }
                            ?>
                        </table>


                        <?php
                        $conn->close();
                        ?>
                    </div>
                    
                    
		</div>
	</body>
</html>
