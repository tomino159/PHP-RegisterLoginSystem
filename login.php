<?php
    session_start();

    $server = "localhost";
    $dbname = "prihlasovanie";
    $username = "root";
    $password = "";

    $conn = new mysqli($server, $username, $password, $dbname);

    if($conn->connect_error) {
        die("Connection failed: ". $conn->connect_error);
    }

    if(isset($_POST["submit"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM uzivatelia WHERE email='$email'";
        $result = $conn -> query($sql);

        if($result -> num_rows > 0) {
            $user = $result -> fetch_assoc();

            if(password_verify($password, $user['heslo'])) {
                $_SESSION['uzivatel'] = $user['meno'];
                header("Location: profile.php");
                exit();
            } else {
                echo "Bad password!";
            }
        } else {
            echo "User with this email doesnt exist!";
        }
    }
$conn->close();