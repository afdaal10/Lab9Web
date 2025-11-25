<?php
// modules/user/add.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $harga_beli = (int)$_POST['harga_beli'];
    $harga_jual = (int)$_POST['harga_jual'];
    $stok = (int)$_POST['stok'];

    $gambar = '';
    if (isset($_FILES['file_gambar']) && $_FILES['file_gambar']['error'] === 0) {
        $fn = str_replace(' ', '_', $_FILES['file_gambar']['name']);
        $dest = __DIR__ . '/../../gambar/' . $fn;
        if (move_uploaded_file($_FILES['file_gambar']['tmp_name'], $dest)) {
            $gambar = $fn;
        }
    }

    $sql = "INSERT INTO data_barang (kategori, nama, gambar, harga_beli, harga_jual, stok)
            VALUES ('$kategori', '$nama', '$gambar', '$harga_beli', '$harga_jual', '$stok')";
    mysqli_query($conn, $sql);
    header("Location: /lab9_php_modular/index.php?page=user/list");
    exit;
}
?>
<div class="content">
    <h2>Tambah Barang</h2>
    <form method="post" enctype="multipart/form-data">
        <label>Nama</label><input type="text" name="nama" required><br>
        <label>Kategori</label><input type="text" name="kategori" required><br>
        <label>Harga Beli</label><input type="number" name="harga_beli" required><br>
        <label>Harga Jual</label><input type="number" name="harga_jual" required><br>
        <label>Stok</label><input type="number" name="stok" required><br>
        <label>Gambar</label><input type="file" name="file_gambar" accept="image/*"><br>
        <button type="submit">Simpan</button>
    </form>
</div>
