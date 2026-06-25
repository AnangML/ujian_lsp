<?php
include '../config/koneksi.php';

if (isset($_POST['simpan'])) {

    $id_customer = $_POST['id_customer'];
    $nama_customer = $_POST['nama_customer'];
    $perusahaan_cust = $_POST['perusahaan_cust'];
    $alamat = $_POST['alamat'];

    $cek = mysqli_query(
        $koneksi,
        "SELECT * FROM customer
        WHERE id_customer='$id_customer'"
    );

    if (mysqli_num_rows($cek) > 0) {

        echo "
        <script>
            alert('ID Customer sudah digunakan!');
        </script>
        ";

    } else {

        mysqli_query(
            $koneksi,
            "INSERT INTO customer
            (
                id_customer,
                nama_customer,
                perusahaan_cust,
                alamat
            )
            VALUES
            (
                '$id_customer',
                '$nama_customer',
                '$perusahaan_cust',
                '$alamat'
            )"
        );

        echo "
        <script>
            alert('Data berhasil ditambahkan');
            window.location='index.php';
        </script>
        ";
    }
}

include '../assets/header.php';
include '../assets/navigation.php';
?>

<div class="main">

    <?php include '../assets/sidebar.php'; ?>

    <div class="content">

        <h2>Tambah Customer</h2>

        <form method="POST">

            <table>

                <tr>
                    <td>ID Customer</td>
                    <td>
                        <input type="number" name="id_customer" required>
                    </td>
                </tr>

                <tr>
                    <td>Nama Customer</td>
                    <td>
                        <input type="text" name="nama_customer" required>
                    </td>
                </tr>

                <tr>
                    <td>Perusahaan</td>
                    <td>
                        <input type="text" name="perusahaan_cust" required>
                    </td>
                </tr>

                <tr>
                    <td>Alamat</td>
                    <td>
                        <textarea name="alamat" rows="4" required></textarea>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>

                        <button type="submit" name="simpan" class="btn btn-success">
                            Simpan
                        </button>

                        <a href="index.php" class="btn">
                            Kembali
                        </a>

                    </td>
                </tr>

            </table>

        </form>

    </div>

</div>

<?php include '../assets/footer.php'; ?>