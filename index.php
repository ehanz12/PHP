<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'database');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Cek apakah password dan konfirmasi password sama
    if ($password != $confirm_password) {
        $error = "Password dan konfirmasi password tidak sama!";
    } else {
        // Cek apakah username sudah ada di database
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $error = "Username sudah digunakan!";
        } else {
            // Enkripsi password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Masukkan data pengguna baru ke database
            $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
            if ($conn->query($sql) === TRUE) {
                $_SESSION['username'] = $username;
                header("Location: dashboard.php");
                exit;
            } else {
                $error = "Pendaftaran gagal: " . $conn->error;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Cafe Saya</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="card-container">
        <h2>Daftar Akun Baru</h2>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="password" name="confirm_password" placeholder="Konfirmasi Password" required><br>
            <button type="submit">Daftar</button>
        </form>
        <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
    </div>
</body>
</html>
