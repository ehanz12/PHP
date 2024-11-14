<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'database');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

        // Cek apakah username sudah ada di database
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $error = "Username sudah digunakan!";
        } else {

             // Enkripsi password
             $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Masukkan data pengguna baru ke database
            $sql = "INSERT INTO users (username, password) VALUES ('$username', ' $hashed_password')";
            if ($conn->query($sql) === TRUE) {
                $_SESSION['username'] = $username;
                header("Location: dashboard.php");
                exit;
            } else {
                $error = "Pendaftaran gagal: " . $conn->error;
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login Animasi</title>
    <link rel="stylesheet" href="style4.css">
</head>
<body>
    <div class="box">
        <span class="borderLine"></span>
        <form action="" method="POST">
            <div class="inputBox">
                <h2>Daftar Akun</h2>
                <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
                <input type="text" required="required" name="username">
                <span>Username</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="password" required="required" name="password">
                <span>Password</span>
                <i></i>
            </div>
            <div class="links">
                <a href="#">Sudah Punya Akun</a>
                <a href="login.php">Login Disini!</a>
            </div>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>