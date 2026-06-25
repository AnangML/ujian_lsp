<?php
include '../config/koneksi.php';

if (isset($_POST['simpan'])) {
    mysqli_query(
        $koneksi,
        "INSERT INTO faktur
        (
            no_faktur,
            tgl_faktur,
            due_date,
            metode_bayar,
            ppn,
            dp,
            grand_total,
            user,
            id_customer,
            id_perusahaan
        )
        VALUES
        (
            '$_POST[no_faktur]',
            '$_POST[tgl_faktur]',
            '$_POST[due_date]',
            '$_POST[metode_bayar]',
            '$_POST[ppn]',
            '$_POST[dp]',
            '$_POST[grand_total]',
            '$_POST[user]',
            '$_POST[id_customer]',
            '$_POST[id_perusahaan]'
        )"
    );

    echo "
    <script>
        alert('Penjualan berhasil ditambahkan');
        window.location='index.php';
    </script>
    ";
}

$customer = mysqli_query($koneksi, "SELECT * FROM customer");
$perusahaan = mysqli_query($koneksi, "SELECT * FROM perusahaan");

include '../assets/header.php';
include '../assets/navigation.php';
?>

<div class="main">

    <?php include '../assets/sidebar.php'; ?>

    <div class="content">

        <h2>Tambah Penjualan</h2>

        <form method="POST">

            <table>

                <tr>
                    <td>No Faktur</td>
                    <td><input type="number" name="no_faktur" required></td>
                </tr>

                <tr>
                    <td>Tanggal Faktur</td>
                    <td><input type="date" name="tgl_faktur" required></td>
                </tr>

                <tr>
                    <td>Due Date</td>
                    <td><input type="date" name="due_date" required></td>
                </tr>

                <tr>
                    <td>Metode Bayar</td>
                    <td>
                        <select name="metode_bayar">
                            <option>Cash</option>
                            <option>Transfer</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>PPN</td>
                    <td><input type="number" name="ppn" value="0"></td>
                </tr>

                <tr>
                    <td>DP</td>
                    <td><input type="number" name="dp" value="0"></td>
                </tr>

                <tr>
                    <td>Grand Total</td>
                    <td><input type="number" name="grand_total" value="0"></td>
                </tr>

                <tr>
                    <td>User</td>
                    <td><input type="text" name="user" required></td>
                </tr>

                <tr>
                    <td>Customer</td>
                    <td>
                        <select name="id_customer" required>

                            <option value="">Pilih Customer</option>

                            <?php while ($c = mysqli_fetch_assoc($customer)) { ?>

                                <option value="<?= $c['id_customer']; ?>">
                                    <?= $c['nama_customer']; ?>
                                </option>

                            <?php } ?>

                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Perusahaan</td>
                    <td>
                        <select name="id_perusahaan" required>

                            <option value="">Pilih Perusahaan</option>

                            <?php while ($p = mysqli_fetch_assoc($perusahaan)) { ?>

                                <option value="<?= $p['id_perusahaan']; ?>">
                                    <?= $p['nama_perusahaan']; ?>
                                </option>

                            <?php } ?>

                        </select>
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