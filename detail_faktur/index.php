<?php
include '../config/koneksi.php';

include '../assets/header.php';
include '../assets/navigation.php';
?>

<div class="main">

    <?php include '../assets/sidebar.php'; ?>

    <div class="content">

        <h2>Data Detail Penjualan</h2>

        <a href="tambah.php" class="btn btn-primary">
            Tambah Detail Penjualan
        </a>

        <a href="cetak.php" target="_blank" class="btn btn-success">
            Cetak PDF
        </a>

        <br><br>

        <table>

            <tr>
                <th>No Faktur</th>
                <th>Produk</th>
                <th>Qty</th>
                <th>Harga</th>
                <th>Subtotal</th>
                <th>Aksi</th>
            </tr>

            <?php

            $query = mysqli_query(
                $koneksi,
                "SELECT df.*,
    p.nama_produk
    FROM detail_faktur df
    JOIN produk p
    ON df.id_produk = p.id_produk"
            );

            while ($data = mysqli_fetch_assoc($query)) {
                $subtotal = $data['qty'] * $data['price'];
                ?>

                <tr>

                    <td><?= $data['no_faktur']; ?></td>

                    <td><?= $data['nama_produk']; ?></td>

                    <td><?= $data['qty']; ?></td>

                    <td>Rp <?= number_format($data['price']); ?></td>

                    <td>Rp <?= number_format($subtotal); ?></td>

                    <td>

                        <a href="edit.php?faktur=<?= $data['no_faktur']; ?>&produk=<?= $data['id_produk']; ?>" class="btn btn-warning">
                            Edit
                        </a>

                        <a href="delete.php?faktur=<?= $data['no_faktur']; ?>&produk=<?= $data['id_produk']; ?>"
                            class="btn btn-danger" onclick="return confirm('Yakin hapus data?')">
                            Delete
                        </a>

                    </td>

                </tr>

            <?php } ?>

        </table>

    </div>

</div>

<?php include '../assets/footer.php'; ?>