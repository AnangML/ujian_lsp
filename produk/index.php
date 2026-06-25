<?php
include '../config/koneksi.php';

include '../assets/header.php';
include '../assets/navigation.php';
?>

<div class="main">

    <?php include '../assets/sidebar.php'; ?>

    <div class="content">

        <h2>Data Produk</h2>

        <a href="tambah.php" class="btn btn-primary">
            Tambah Produk
        </a>

        <br><br>

        <table>

            <tr>
                <th>ID Produk</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Jenis</th>
                <th>Stock</th>
                <th>Aksi</th>
            </tr>

            <?php

            $query = mysqli_query(
                $koneksi,
                "SELECT * FROM produk"
            );

            while ($data = mysqli_fetch_assoc($query)) {
                ?>

                <tr>

                    <td><?= $data['id_produk']; ?></td>

                    <td><?= $data['nama_produk']; ?></td>

                    <td>Rp <?= number_format($data['price']); ?></td>

                    <td><?= $data['jenis']; ?></td>

                    <td><?= $data['stock']; ?></td>

                    <td>

                        <a href="edit.php?id=<?= $data['id_produk']; ?>" class="btn btn-warning">

                            Edit

                        </a>

                        <a href="delete.php?id=<?= $data['id_produk']; ?>" class="btn btn-danger"
                            onclick="return confirm('Yakin hapus data?')">

                            Delete

                        </a>

                    </td>

                </tr>

            <?php } ?>

        </table>

    </div>

</div>

<?php include '../assets/footer.php'; ?>