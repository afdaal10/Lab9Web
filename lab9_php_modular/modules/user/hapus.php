<?php
// modules/user/delete.php
if (!isset($_GET['id'])) {
    header("Location: /lab9_php_modular/index.php?page=user/list");
    exit;
}
$id = (int)$_GET['id'];

// ambil nama gambar dulu untuk dihapus file-nya (opsional)
$q = mysqli_query($conn, "SELECT gambar FROM data_barang WHERE id_barang = $id");
if ($q && $r = mysqli_fetch_assoc($q)) {
    if (!empty($r['gambar'])) {
        $f = __DIR__ . '/../../gambar/' . $r['gambar'];
        if (file_exists($f)) unlink($f);
    }
}

mysqli_query($conn, "DELETE FROM data_barang WHERE id_barang = $id");
header("Location: /lab9_php_modular/index.php?page=user/list");
exit;
