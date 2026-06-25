<?php
include '../config/koneksi.php';

if (isset($_POST['simpan'])) {
    mysqli_query(
        $koneksi,
        "INSERT INTO perusahaan
        (
            id_perusahaan,
            nama_perusahaan,
            alamat,
            no_telp,
            tax
        )
        VALUES
        (
            '$_POST[id_perusahaan]',
            '$_POST[nama_perusahaan]',
            '$_POST[alamat]',
            '$_POST[no_telp]',
            '$_POST[tax]'
        )"
    );

    echo "
    <script>
        alert('Data berhasil ditambahkan');
        window.location='index.php';
    </script>
    ";
}

include '../assets/header.php';
include '../assets/navigation.php';
?>

<div class="main">

    <?php include '../assets/sidebar.php'; ?>

    <div class="content">

        <h2>Tambah Perusahaan</h2>

        <form method="POST">

            <table>

                <tr>
                    <td>ID Perusahaan</td>
                    <td>
                        <input type="number" name="id_perusahaan" required>
                    </td>
                </tr>

                <tr>
                    <td>Nama Perusahaan</td>
                    <td>
                        <input type="text" name="nama_perusahaan" required>
                    </td>
                </tr>

                <tr>
                    <td>Alamat</td>
                    <td>
                        <textarea name="alamat" rows="4" required></textarea>
                    </td>
                </tr>

                <tr>
                    <td>No Telp</td>
                    <td>
                        <input type="text" name="no_telp" required>
                    </td>
                </tr>

                <tr>
                    <td>Tax</td>
                    <td>
                        <input type="text" name="tax" required>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>

                        <button type="submit" name="simpan" class="btn btn-success">

                            Simpan

                        </button>

                        <a href="index.php" class="btn btn-primary">

                            Kembali

                        </a>

                    </td>
                </tr>

            </table>

        </form>

    </div>

</div>

<?php include '../assets/footer.php'; ?>