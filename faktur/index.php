<?php
include '../config/koneksi.php';

include '../assets/header.php';
include '../assets/navigation.php';
?>

<div class="main">

    <?php include '../assets/sidebar.php'; ?>

    <div class="content">

        <h2>Data Penjualan</h2>

        <a href="tambah.php" class="btn btn-primary">
            Tambah Penjualan
        </a>

        <a href="cetak.php" target="_blank" class="btn btn-success">
            Cetak PDF
        </a>

        <br><br>

        <table>

            <tr>
                <th>No Faktur</th>
                <th>Tanggal</th>
                <th>Due Date</th>
                <th>Customer</th>
                <th>Perusahaan</th>
                <th>Metode Bayar</th>
                <th>Grand Total</th>
                <th>Aksi</th>
            </tr>

            <?php

            $query = mysqli_query(
                $koneksi,
                "SELECT f.*,
    c.nama_customer,
    p.nama_perusahaan
    FROM faktur f
    JOIN customer c
    ON f.id_customer = c.id_customer
    JOIN perusahaan p
    ON f.id_perusahaan = p.id_perusahaan"
            );

            while ($data = mysqli_fetch_assoc($query)) {
                ?>

                <tr>

                    <td><?= $data['no_faktur']; ?></td>
                    <td><?= $data['tgl_faktur']; ?></td>
                    <td><?= $data['due_date']; ?></td>
                    <td><?= $data['nama_customer']; ?></td>
                    <td><?= $data['nama_perusahaan']; ?></td>
                    <td><?= $data['metode_bayar']; ?></td>
                    <td>Rp <?= number_format($data['grand_total']); ?></td>

                    <td>

                        <a href="edit.php?id=<?= $data['no_faktur']; ?>" class="btn btn-warning">
                            Edit
                        </a>

                        <a href="delete.php?id=<?= $data['no_faktur']; ?>" class="btn btn-danger"
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