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
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="card-container">
        <h2>Masukan Akun </h2>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="password" name="confirm_password" placeholder="Konfirmasi Password" required><br>
            <button type="submit">Daftar</button>
        </form>
        <p>Tidak punya akun? <a href="index.php">Register di sini</a></p>
    </div>
</body>
</html>
