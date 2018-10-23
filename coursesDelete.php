<?php   
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( !empty($_POST)) {
        // keep track post values
        $id = $_POST['id'];
         
        // delete data
        include("includes/DBconnection.inc.php");
        mysqli_query($conn, "SET NAMES 'utf8'"); // ä, ö, ü richtig darstellen
        $update = "DELETE FROM bildungsangebot  WHERE ID = ".$id;
        mysqli_query($conn, "DELETE FROM bildungsangebot  WHERE ID = ".$id);
        echo $id;
        header("Location: courses.php");
    }
    
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
     <link rel="stylesheet" type="text/css" href="stylesheet/courses.css">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Delete a course</h3>
                    </div>
                     
                    <form class="form-horizontal" action="coursesDelete.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $id;?>"/>
                      <p class="alert alert-error">Are you sure to delete ?</p>
                      <div class="form-actions">
                          <button type="submit" class="button">Yes</button>
                          <a class="button" href="courses.php">No</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>