<?php
include_once "database.php";
include_once "fungsi.php";

// Ambil ID dari parameter GET
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Ambil data berdasarkan ID
$query = $conn->prepare("SELECT * FROM data_latih WHERE id = ?");
$query->bind_param("i", $id);
$query->execute();
$result = $query->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    echo "Data tidak ditemukan.";
    exit;
}

// Proses update data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Contoh field: nama, nilai, label (ubah sesuai struktur tabel Anda)
    $nama = $_POST['nama'];
    $nilai = $_POST['nilai'];
    $label = $_POST['label'];

    $update = $conn->prepare("UPDATE data_latih SET nama=?, nilai=?, label=? WHERE id=?");
    $update->bind_param("sssi", $nama, $nilai, $label, $id);

    if ($update->execute()) {
        echo "<script>alert('Data berhasil diupdate');window.location='data_latih.php';</script>";
    } else {
        echo "Gagal mengupdate data.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Latih</title>
</head>
<body>
    <h2>Edit Data Latih</h2>
    <form method="post">
        <label>Nama:</label><br>
        <input type="text" name="nama" value="<?php echo htmlspecialchars($data['nama']); ?>" required><br><br>
        <label>Nilai:</label><br>
        <input type="text" name="nilai" value="<?php echo htmlspecialchars($data['nilai']); ?>" required><br><br>
        <label>Label:</label><br>
        <input type="text" name="label" value="<?php echo htmlspecialchars($data['label']); ?>" required><br><br>
        <input type="submit" value="Update">
        <a href="data_latih.php">Batal</a>
    </form>
</body>
</html>