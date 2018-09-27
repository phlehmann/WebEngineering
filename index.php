<!DOCTYPE html>
<?php
session_start();
session_regenerate_id();
if(!isset($_SESSION['login_user']))      // if there is no valid session
{
        header("Location: login.php");
}
echo session_id();
?>
<html>
	<head>
		<title>HomePage</title>
		<link rel="stylesheet" type="text/css" href="all.css">
		
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
				<a href="logout.php"><div id="btn_logout">Logout</div></a>
			</div>
			<div id="left-select">
				<form action="#">
					<fieldset>
						<label for="speed">Select a school</label>
						<select name="speed" id="speed">
							<option>Slower</option>
							<option>Slow</option>
							<option selected="selected">Medium</option>
							<option>Fast</option>
							<option>Faster</option>
						</select>
					</fieldset>
				</form>
			</div>
			<div id="center-select">
				<form action="#">
					<fieldset>
						<label for="files">Select a course</label>
						<select name="files" id="files">
							<option>Slower</option>
							<option>Slow</option>
							<option selected="selected">Medium</option>
							<option>Fast</option>
							<option>Faster</option>
						</select>
					</fieldset>
				</form>
			</div>	
		</div>
	</body>
</html>
