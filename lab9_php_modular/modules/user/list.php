<?php
// modules/user/list.php
// menggunakan $conn dari config/database.php (sudah di-include di index.php)
$sql = "SELECT * FROM data_barang ORDER BY id_barang DESC";
$result = mysqli_query($conn, $sql);
?>
<div class="content">
    <h2>Data Barang</h2>
    <p><a href="/lab9_php_modular/index.php?page=user/add">Tambah Data</a></p>
    <table class="table">
        <tr>
            <th>Gambar</th><th>Nama</th><th>Kategori</th><th>Harga Beli</th><th>Harga Jual</th><th>Stok</th><th>Aksi</th>
        </tr>
        <?php if ($result && mysqli_num_rows($result) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td>
                        <?php if(!empty($row['gambar']) && file_exists(__DIR__ . '/../../gambar/' . $row['gambar'])): ?>
                            <img src="/lab9_php_modular/gambar/<?= htmlspecialchars($row['gambar']); ?>" alt="" style="width:80px;">
                        <?php else: ?>
                            (tidak ada gambar)
                        <?php endif; ?>
                    </td>
                    <td><?= htmlspecialchars($row['nama']); ?></td>
                    <td><?= htmlspecialchars($row['kategori']); ?></td>
                    <td><?= htmlspecialchars($row['harga_beli']); ?></td>
                    <td><?= htmlspecialchars($row['harga_jual']); ?></td>
                    <td><?= htmlspecialchars($row['stok']); ?></td>
                    <td>
                        <a href="/lab9_php_modular/modules/user/edit.php?id=<?= $row['id_barang']; ?>">Ubah</a> |
                        <a href="/lab9_php_modular/modules/user/delete.php?id=<?= $row['id_barang']; ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="7">Belum ada data</td></tr>
        <?php endif; ?>
    </table>
</div>
