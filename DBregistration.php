<?php
    include("DBconnection.inc.php");
    session_start();

    // get user data from login area
    $myusername = $_POST['username'];
    $mypassword = $_POST['password'];
    $mypassword2 = $_POST['password2'];
    $encrypt = md5($mypassword);

    if(isset($myusername)){
        $sql = "SELECT username FROM users WHERE username = '$myusername'";
        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);
        if($count == 1) {
            echo "
                <script type=\"text/javascript\">
                alert('Username already exists!');
                window.location.replace('registration.php');
                </script>
            ";
        }else{
            if($mypassword == $mypassword2){
                $sql = "INSERT INTO users (username, password)
                        VALUES ('$myusername', '$encrypt')";

                if ($conn->query($sql) === TRUE) {
                    echo "
                        <script type=\"text/javascript\">
                        alert('User successfully created');
                        window.location.replace('login.php');
                        </script>
                    ";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();
            }
            else{
                echo "
                <script type=\"text/javascript\">
                alert('Your Passwords do not match!');
                window.location.replace('registration.php');
                </script>
                ";
            }
        } 
    }
?>