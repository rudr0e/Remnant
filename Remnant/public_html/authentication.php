<?php
    include('connection.php');
    $email = $_POST['email'];
    $password = $_POST['pass'];

        //to prevent from mysqli injection
        $email = stripcslashes($email);
        $password = stripcslashes($password);
        $email = mysqli_real_escape_string($con, $email);
        $password = mysqli_real_escape_string($con, $password);

        $sql = "select * from register where email = '$email' and password = '$password'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        if($count == 1){
            echo "Succes.";
            // redirection k liye h ,agr kuch issue ho to ise hta de sbse pehle, trial k liye
 echo '<script>alert("Successfully loggedin")</script>';           
 header("Location:HomePage.html");
           
        }
        else{
            echo '<script>alert("Incorrect Username or Password")</script>';
echo '<script>window.location.href="loginpage.html"</script>';
        }
?>
