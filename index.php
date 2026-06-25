<?php
include 'config/koneksi.php';
include 'assets/header.php';
include 'assets/navigation.php';

$customer = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM customer"));
$produk = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM produk"));
$perusahaan = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM perusahaan"));
$penjualan = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM faktur"));


?>

<div class="main">

    <?php include 'assets/sidebar.php'; ?>

    <div class="content">

        <h2>Beranda</h2>

        <p>Aplikasi Penjualan.</p>

        <br>

        <table>

            <tr>
                <th>Data</th>
                <th>Jumlah</th>
            </tr>

            <tr>
                <td>Customer</td>
                <td><?= $customer ?></td>
            </tr>

            <tr>
                <td>Produk</td>
                <td><?= $produk ?></td>
            </tr>

            <tr>
                <td>Perusahaan</td>
                <td><?= $perusahaan ?></td>
            </tr>

            <tr>
                <td>Penjualan</td>
                <td><?= $penjualan ?></td>
            </tr>

        </table>

    </div>

</div>

<?php include 'assets/footer.php'; ?>