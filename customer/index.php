<?php
include '../config/koneksi.php';

include '../assets/header.php';
include '../assets/navigation.php';
?>

<div class="main">

    <?php include '../assets/sidebar.php'; ?>

    <div class="content">

        <h2>Data Customer</h2>

        <a href="tambah.php" class="btn btn-primary">
            Tambah Customer
        </a>

        <a href="cetak.php" target="_blank" class="btn btn-success">
            Cetak PDF
        </a>

        <br><br>

        <table>

            <tr>
                <th>ID Customer</th>
                <th>Nama Customer</th>
                <th>Perusahaan</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>

            <?php

            $query = mysqli_query(
                $koneksi,
                "SELECT * FROM customer"
            );

            while ($data = mysqli_fetch_assoc($query)) {
                ?>

                <tr>

                    <td><?= $data['id_customer']; ?></td>

                    <td><?= $data['nama_customer']; ?></td>

                    <td><?= $data['perusahaan_cust']; ?></td>

                    <td><?= $data['alamat']; ?></td>

                    <td>

                        <a href="edit.php?id=<?= $data['id_customer']; ?>" class="btn btn-warning">
                            Edit
                        </a>

                        <a href="delete.php?id=<?= $data['id_customer']; ?>" class="btn btn-danger"
                            onclick="return confirm('Yakin ingin menghapus data ini?')">
                            Delete
                        </a>


                    </td>


                </tr>

            <?php } ?>

        </table>

    </div>

</div>

<?php include '../assets/footer.php'; ?>