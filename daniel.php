<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Elitphoto</title>
    <link rel="stylesheet" href=".css">
</head>
<body>
<div class="container">
<h2>Pemesanan Elitphoto</h2>

<?php
// Array untuk menyimpan data paket fotografi
$paketFotografi = array(
    "basic" => array("Harga" => 10000, "Deskripsi" => "1 foto standar"),
    "standard" => array("Harga" => 15000, "Deskripsi" => "1 foto standar dan 1 foto editing"),
    "premium" => array("Harga" => 20000, "Deskripsi" => "1 foto standar, 1 foto editing, dan 1 foto cetak besar"),
);

// Menampilkan pilihan paket fotografi
echo "<p>Pilih paket fotografi:</p>";
echo "<ul>";
foreach ($paketFotografi as $jenisPaket => $dataPaket) {
    echo "<li>$jenisPaket - Harga: Rp" . $dataPaket["Harga"] . " - " . $dataPaket["Deskripsi"] . "</li>";
}
echo "</ul>";

// Menangani formulir ketika disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai dari formulir
    $jenisPaket = $_POST["jenis_paket"];
    $jumlahFoto = $_POST["jumlah_foto"];

    // Memastikan paket yang dipilih valid
    if (isset($paketFotografi[$jenisPaket])) {
        // Menghitung total biaya
        $hargaPerFoto = $paketFotografi[$jenisPaket]["Harga"];
        $totalBiaya = $jumlahFoto * $hargaPerFoto;

        // Menampilkan hasil perhitungan
        echo "<p>Total biaya untuk $jumlahFoto foto dengan paket $jenisPaket: Rp $totalBiaya</p>";
    } else {
        echo "<p>Error: Pilihan paket tidak valid.</p>";
    }
}
?>

<!-- Formulir untuk memilih paket dan memasukkan jumlah foto -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="jenis_paket">Jenis Paket:</label>
    <select name="jenis_paket" required>
        <?php
        // Menampilkan pilihan paket fotografi dalam dropdown
        foreach ($paketFotografi as $jenisPaket => $dataPaket) {
            echo "<option value='$jenisPaket'>$jenisPaket</option>";
        }
        ?>
    </select>

    <label for="jumlah_foto">Jumlah Foto:</label>
    <input type="number" name="jumlah_foto" required>

    <input type="submit" value="Hitung Biaya">
</form>
</div>
</body>
</html>
