<?php
include '../config/koneksi.php';

include '../assets/header.php';
include '../assets/navigation.php';
?>

<div class="main">

    <?php include '../assets/sidebar.php'; ?>

    <div class="content">

        <h2>Data Perusahaan</h2>

        <a href="tambah.php" class="btn btn-primary">
            Tambah Perusahaan
        </a>

        <br><br>

        <table>

            <tr>
                <th>ID</th>
                <th>Nama Perusahaan</th>
                <th>Alamat</th>
                <th>No Telp</th>
                <th>Tax</th>
                <th>Aksi</th>
            </tr>

            <?php

            $query = mysqli_query(
                $koneksi,
                "SELECT * FROM perusahaan"
            );

            while ($data = mysqli_fetch_assoc($query)) {
                ?>

                <tr>

                    <td><?= $data['id_perusahaan']; ?></td>

                    <td><?= $data['nama_perusahaan']; ?></td>

                    <td><?= $data['alamat']; ?></td>

                    <td><?= $data['no_telp']; ?></td>

                    <td><?= $data['tax']; ?></td>

                    <td>

                        <a href="edit.php?id=<?= $data['id_perusahaan']; ?>" class="btn btn-warning">

                            Edit

                        </a>

                        <a href="delete.php?id=<?= $data['id_perusahaan']; ?>" class="btn btn-danger"
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