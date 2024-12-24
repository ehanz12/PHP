<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Cafe Saya</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
        <div class="navbar-left">
            <span>Cafe Saya</span>
            <span><a href="karyawan.php">Karyawan</a></span>
        </div>
        <div class="navbar-right">
            <div class="dropdown">
                <span><?php echo $_SESSION['username']; ?></span>
                <div class="dropdown-content">
                    <a href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="dashboard-content">
        <h1>Selamat datang, <?php echo $_SESSION['username']; ?>!</h1>
    </div>
</body>
</html>
