<?php
include '../config/koneksi.php';

$no_faktur = $_GET['faktur'];
$id_produk = $_GET['produk'];

$data = mysqli_fetch_assoc(
    mysqli_query(
        $koneksi,
        "SELECT *
        FROM detail_faktur
        WHERE no_faktur='$no_faktur'
        AND id_produk='$id_produk'"
    )
);

$produk = mysqli_query(
    $koneksi,
    "SELECT * FROM produk"
);

if (isset($_POST['id_produk'])) {
    $produkDipilih = mysqli_fetch_assoc(
        mysqli_query(
            $koneksi,
            "SELECT * FROM produk
            WHERE id_produk='$_POST[id_produk]'"
        )
    );

    $harga = $produkDipilih['price'];
} else {
    $harga = $data['price'];
}

if (isset($_POST['update'])) {
    mysqli_query(
        $koneksi,
        "UPDATE detail_faktur
        SET
            id_produk='$_POST[id_produk]',
            qty='$_POST[qty]',
            price='$_POST[price]'
        WHERE
            no_faktur='$no_faktur'
        AND
            id_produk='$id_produk'"
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

        <h2>Edit Detail Penjualan</h2>

        <form method="POST">

            <table>

                <tr>
                    <td>No Faktur</td>
                    <td>
                        <input type="number" value="<?= $data['no_faktur']; ?>" readonly>
                    </td>
                </tr>

                <tr>
                    <td>Produk</td>
                    <td>

                        <select name="id_produk" onchange="this.form.submit()">

                            <?php while ($p = mysqli_fetch_assoc($produk)) { ?>

                                <option value="<?= $p['id_produk']; ?>" <?= ($p['id_produk'] == $data['id_produk']) ? 'selected' : ''; ?>>

                                    <?= $p['nama_produk']; ?>

                                </option>

                            <?php } ?>

                        </select>

                    </td>
                </tr>

                <tr>
                    <td>Qty</td>
                    <td>
                        <input type="number" name="qty" value="<?= $data['qty']; ?>" required>
                    </td>
                </tr>

                <tr>
                    <td>Harga</td>
                    <td>
                        <input type="number" name="price" value="<?= $harga; ?>" readonly>
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