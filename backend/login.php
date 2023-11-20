<?php

require './../config/db.php';

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = mysqli_query($db_connect, "SELECT * FROM users WHERE email = '$email'");
    if (mysqli_num_rows($user) > 0) {
        $data = mysqli_fetch_assoc($user);

        if (password_verify($password, $data['password'])) {
            // Selamat datang pesan
            $welcomeMessage = "Selamat datang " . $data['name'];
        } else {
            // Pesan kesalahan password
            $errorMessage = "Password salah";
        }
    } else {
        // Pesan kesalahan email atau password
        $errorMessage = "Email atau password salah";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            text-align: center;
        }

        .message {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        if (isset($welcomeMessage)) {
            echo "<div class='message'>$welcomeMessage</div>";
        } elseif (isset($errorMessage)) {
            echo "<div class='message' style='color: red;'>$errorMessage</div>";
        }
        ?>
    </div>
</body>
</html>
