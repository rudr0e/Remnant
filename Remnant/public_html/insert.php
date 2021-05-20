<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['username']) && isset($_POST['email']) 
    && isset($_POST['password']) ) {
        
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];


        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "test";

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            $Select = "SELECT email FROM register WHERE email = ? LIMIT 1";
            $Insert = "INSERT INTO register(username, email, password) values(?, ?, ?)";

            $stmt = $conn->prepare($Select);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($resultEmail);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;

            if ($rnum == 0) {
                $stmt->close();

                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("sss",$username, $email, $password);
                if ($stmt->execute()) {
                       echo '<script>alert("Succesfully Registered")</script>';
                       echo '<script>window.location.href="loginpage.html"</script>';
                }
                else {
                    echo $stmt->error;
                }
            }
            else {
                  echo '<script>alert("Some else is already registered with this email")</script>';
                  echo '<script>window.location.href="loginpage.html"</script>';
            }
            $stmt->close();
            $conn->close();
        }
    }
    else {
        echo "All field are required.";
        die();
    }
}
else {
    echo "Submit button is not set";
}
?>