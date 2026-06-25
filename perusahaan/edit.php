<?php
include '../config/koneksi.php';

$id = $_GET['id'];

$data = mysqli_fetch_assoc(
    mysqli_query(
        $koneksi,
        "SELECT * FROM perusahaan
        WHERE id_perusahaan='$id'"
    )
);

if (isset($_POST['update'])) {
    mysqli_query(
        $koneksi,
        "UPDATE perusahaan
        SET
            nama_perusahaan='$_POST[nama_perusahaan]',
            alamat='$_POST[alamat]',
            no_telp='$_POST[no_telp]',
            tax='$_POST[tax]'
        WHERE id_perusahaan='$id'"
    );

    echo "
    <script>
        alert('Data berhasil diupdate');
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

        <h2>Edit Perusahaan</h2>

        <form method="POST">

            <table>

                <tr>
                    <td>ID Perusahaan</td>
                    <td>
                        <input type="number" value="<?= $data['id_perusahaan']; ?>" readonly>
                    </td>
                </tr>

                <tr>
                    <td>Nama Perusahaan</td>
                    <td>
                        <input type="text" name="nama_perusahaan" value="<?= $data['nama_perusahaan']; ?>" required>
                    </td>
                </tr>

                <tr>
                    <td>Alamat</td>
                    <td>
                        <textarea name="alamat" rows="4" required><?= $data['alamat']; ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td>No Telp</td>
                    <td>
                        <input type="text" name="no_telp" value="<?= $data['no_telp']; ?>" required>
                    </td>
                </tr>

                <tr>
                    <td>Tax</td>
                    <td>
                        <input type="text" name="tax" value="<?= $data['tax']; ?>" required>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>

                        <button type="submit" name="update" class="btn btn-success">
                            Update
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