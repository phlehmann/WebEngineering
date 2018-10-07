<?php
    include("connectdb.php");
    session_start();

    // get user data from login area
    $myusername = $_REQUEST['username'];
    $mypassword = $_REQUEST['password'];
    $encrypt = md5($mypassword);

    // get database user
    $sql = "SELECT id,username,password FROM users WHERE username = '$myusername' AND password = '$encrypt'";
    $result = $conn->query($sql);

    $count = mysqli_num_rows($result);

    if($count == 1) {
        $_SESSION['login_user'] = $myusername;

        header("location: index.php");
    }else {
        echo "
            <script type=\"text/javascript\">
            alert('Username or Password invalid');
            window.location.replace('login.php');
            </script>
        ";
    }
	
	$conn->close();
?>