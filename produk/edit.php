<?php
include '../config/koneksi.php';

$id = $_GET['id'];

$data = mysqli_fetch_assoc(
    mysqli_query(
        $koneksi,
        "SELECT * FROM produk
        WHERE id_produk='$id'"
    )
);

if (isset($_POST['update'])) {
    mysqli_query(
        $koneksi,
        "UPDATE produk
        SET
            nama_produk='$_POST[nama_produk]',
            price='$_POST[price]',
            jenis='$_POST[jenis]',
            stock='$_POST[stock]'
        WHERE id_produk='$id'"
    );

    echo "
    <script>
        alert('Produk berhasil diupdate');
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

        <h2>Edit Produk</h2>

        <form method="POST">

            <table>

                <tr>
                    <td>ID Produk</td>
                    <td>
                        <input type="number" value="<?= $data['id_produk']; ?>" readonly>
                    </td>
                </tr>

                <tr>
                    <td>Nama Produk</td>
                    <td>
                        <input type="text" name="nama_produk" value="<?= $data['nama_produk']; ?>" required>
                    </td>
                </tr>

                <tr>
                    <td>Harga</td>
                    <td>
                        <input type="number" name="price" value="<?= $data['price']; ?>" required>
                    </td>
                </tr>

                <tr>
                    <td>Jenis</td>
                    <td>
                        <input type="text" name="jenis" value="<?= $data['jenis']; ?>" required>
                    </td>
                </tr>

                <tr>
                    <td>Stock</td>
                    <td>
                        <input type="number" name="stock" value="<?= $data['stock']; ?>" required>
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