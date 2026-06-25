<?php
include '../config/koneksi.php';

if (isset($_POST['simpan'])) {
    mysqli_query(
        $koneksi,
        "INSERT INTO produk
        (
            id_produk,
            nama_produk,
            price,
            jenis,
            stock
        )
        VALUES
        (
            '$_POST[id_produk]',
            '$_POST[nama_produk]',
            '$_POST[price]',
            '$_POST[jenis]',
            '$_POST[stock]'
        )"
    );

    echo "
    <script>
        alert('Produk berhasil ditambahkan');
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

        <h2>Tambah Produk</h2>

        <form method="POST">

            <table>

                <tr>
                    <td>ID Produk</td>
                    <td>
                        <input type="number" name="id_produk" required>
                    </td>
                </tr>

                <tr>
                    <td>Nama Produk</td>
                    <td>
                        <input type="text" name="nama_produk" required>
                    </td>
                </tr>

                <tr>
                    <td>Harga</td>
                    <td>
                        <input type="number" name="price" required>
                    </td>
                </tr>

                <tr>
                    <td>Jenis</td>
                    <td>
                        <input type="text" name="jenis" required>
                    </td>
                </tr>

                <tr>
                    <td>Stock</td>
                    <td>
                        <input type="number" name="stock" required>
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