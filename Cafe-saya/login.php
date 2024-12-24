<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'database');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk mengambil data pengguna
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            header("Location: dashboard.php");
            exit();
        } else {
            $error =("Password salah!");
        }
    } else {
         $error =("Username tidak ditemukan!");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Cafe Saya</title>
    <link rel="stylesheet" href="style4.css">
</head>
<body>
<div class="box">
        <span class="borderLine"></span>
        <form action="" method="post">
            <div class="inputBox">
                <h2>Masuk</h2>
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
                <a href="#">Tidak Punya Akun?</a>
                <a href="index.php">Register Disini!</a>
            </div>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
