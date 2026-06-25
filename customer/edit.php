<?php
include '../config/koneksi.php';

$id = $_GET['id'];

$data = mysqli_fetch_assoc(
    mysqli_query(
        $koneksi,
        "SELECT * FROM customer
        WHERE id_customer='$id'"
    )
);

if (isset($_POST['update'])) {
    mysqli_query(
        $koneksi,
        "UPDATE customer
        SET
            nama_customer='$_POST[nama_customer]',
            perusahaan_cust='$_POST[perusahaan_cust]',
            alamat='$_POST[alamat]'
        WHERE id_customer='$id'"
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

        <h2>Edit Customer</h2>

        <form method="POST">

            <table>

                <tr>
                    <td>ID Customer</td>
                    <td>
                        <input type="number" value="<?= $data['id_customer']; ?>" readonly>
                    </td>
                </tr>

                <tr>
                    <td>Nama Customer</td>
                    <td>
                        <input type="text" name="nama_customer" value="<?= $data['nama_customer']; ?>" required>
                    </td>
                </tr>

                <tr>
                    <td>Perusahaan</td>
                    <td>
                        <input type="text" name="perusahaan_cust" value="<?= $data['perusahaan_cust']; ?>" required>
                    </td>
                </tr>

                <tr>
                    <td>Alamat</td>
                    <td>
                        <textarea name="alamat" rows="4" required><?= $data['alamat']; ?></textarea>
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