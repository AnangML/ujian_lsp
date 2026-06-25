<?php
include '../config/koneksi.php';

$id = $_GET['id'];

$data = mysqli_fetch_assoc(
    mysqli_query(
        $koneksi,
        "SELECT * FROM faktur
        WHERE no_faktur='$id'"
    )
);

$customer = mysqli_query($koneksi, "SELECT * FROM customer");
$perusahaan = mysqli_query($koneksi, "SELECT * FROM perusahaan");

if (isset($_POST['update'])) {
    mysqli_query(
        $koneksi,
        "UPDATE faktur SET
        tgl_faktur='$_POST[tgl_faktur]',
        due_date='$_POST[due_date]',
        metode_bayar='$_POST[metode_bayar]',
        ppn='$_POST[ppn]',
        dp='$_POST[dp]',
        grand_total='$_POST[grand_total]',
        user='$_POST[user]',
        id_customer='$_POST[id_customer]',
        id_perusahaan='$_POST[id_perusahaan]'
        WHERE no_faktur='$id'"
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

        <h2>Edit Penjualan</h2>

        <form method="POST">

            <table>

                <tr>
                    <td>No Faktur</td>
                    <td>
                        <input type="number" value="<?= $data['no_faktur']; ?>" readonly>
                    </td>
                </tr>

                <tr>
                    <td>Tanggal Faktur</td>
                    <td>
                        <input type="date" name="tgl_faktur" value="<?= $data['tgl_faktur']; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Due Date</td>
                    <td>
                        <input type="date" name="due_date" value="<?= $data['due_date']; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Metode Bayar</td>
                    <td>
                        <input type="text" name="metode_bayar" value="<?= $data['metode_bayar']; ?>">
                    </td>
                </tr>

                <tr>
                    <td>PPN</td>
                    <td>
                        <input type="number" name="ppn" value="<?= $data['ppn']; ?>">
                    </td>
                </tr>

                <tr>
                    <td>DP</td>
                    <td>
                        <input type="number" name="dp" value="<?= $data['dp']; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Grand Total</td>
                    <td>
                        <input type="number" name="grand_total" value="<?= $data['grand_total']; ?>">
                    </td>
                </tr>

                <tr>
                    <td>User</td>
                    <td>
                        <input type="text" name="user" value="<?= $data['user']; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Customer</td>
                    <td>
                        <select name="id_customer">

                            <?php while ($c = mysqli_fetch_assoc($customer)) { ?>

                                <option value="<?= $c['id_customer']; ?>"
                                    <?= $c['id_customer'] == $data['id_customer'] ? 'selected' : ''; ?>>

                                    <?= $c['nama_customer']; ?>

                                </option>

                            <?php } ?>

                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Perusahaan</td>
                    <td>
                        <select name="id_perusahaan">

                            <?php while ($p = mysqli_fetch_assoc($perusahaan)) { ?>

                                <option value="<?= $p['id_perusahaan']; ?>"
                                    <?= $p['id_perusahaan'] == $data['id_perusahaan'] ? 'selected' : ''; ?>>

                                    <?= $p['nama_perusahaan']; ?>

                                </option>

                            <?php } ?>

                        </select>
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