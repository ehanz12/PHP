<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Bujur Sangkar</title>
</head>
<body>
    <h1>Hitung Luas dan Keliling Bujur Sangkar</h1>
    <form method="POST" action="">
        <label for="sisi">Masukkan panjang sisi:</label>
        <input type="number" name="sisi" id="sisi" step="0.01" required>
        <button type="submit">Hitung</button>
    </form>

    <?php
    // Mengecek apakah form sudah di-submit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Definisi class
        class BujurSangkar {
            private $sisi;

            public function __construct($sisi) {
                $this->sisi = $sisi;
            }

            public function hitungLuas() {
                return $this->sisi * $this->sisi;
            }

            public function hitungKeliling() {
                return 4 * $this->sisi;
            }
        }

        // Mengambil input dari form
        $sisi = $_POST['sisi'];

        // Membuat object
        $bujurSangkar = new BujurSangkar($sisi);

        // Menampilkan hasil
        echo "<h2>Hasil Perhitungan:</h2>";
        echo "<p>Luas bujur sangkar: " . $bujurSangkar->hitungLuas() . "</p>";
        echo "<p>Keliling bujur sangkar: " . $bujurSangkar->hitungKeliling() . "</p>";
    }
    ?>
</body>
</html>