<?php

include '../config/koneksi.php';

$harga = '';

if(isset($_POST['id_produk']))
{
    $produkDipilih = mysqli_fetch_assoc(
        mysqli_query(
            $koneksi,
            "SELECT *
            FROM produk
            WHERE id_produk='$_POST[id_produk]'"
        )
    );

    $harga = $produkDipilih['price'];
}

if(isset($_POST['simpan']))
{
    mysqli_query(
        $koneksi,
        "INSERT INTO detail_faktur
        (
            no_faktur,
            id_produk,
            qty,
            price
        )
        VALUES
        (
            '$_POST[no_faktur]',
            '$_POST[id_produk]',
            '$_POST[qty]',
            '$_POST[price]'
        )"
    );

    echo "
    <script>
        alert('Data berhasil ditambahkan');
        window.location='index.php';
    </script>
    ";
}

$faktur = mysqli_query(
    $koneksi,
    "SELECT * FROM faktur"
);

$produk = mysqli_query(
    $koneksi,
    "SELECT * FROM produk"
);

include '../assets/header.php';
include '../assets/navigation.php';
?>

<div class="main">

    <?php include '../assets/sidebar.php'; ?>

    <div class="content">

        <h2>Tambah Detail Penjualan</h2>

        <form method="POST">

            <table>

                <tr>
                    <td>Produk</td>
                    <td>

                        <select
                            name="id_produk"
                            onchange="this.form.submit()"
                            required>

                            <option value="">
                                Pilih Produk
                            </option>

                            <?php while($p = mysqli_fetch_assoc($produk)){ ?>

                            <option
                                value="<?= $p['id_produk']; ?>"
                                <?= isset($_POST['id_produk']) && $_POST['id_produk'] == $p['id_produk'] ? 'selected' : ''; ?>>

                                <?= $p['nama_produk']; ?>

                            </option>

                            <?php } ?>

                        </select>

                    </td>
                </tr>

                <tr>
                    <td>No Faktur</td>
                    <td>

                        <select name="no_faktur" required>

                            <option value="">
                                Pilih Faktur
                            </option>

                            <?php while($f = mysqli_fetch_assoc($faktur)){ ?>

                            <option value="<?= $f['no_faktur']; ?>">

                                <?= $f['no_faktur']; ?>

                            </option>

                            <?php } ?>

                        </select>

                    </td>
                </tr>

                <tr>
                    <td>Qty</td>
                    <td>

                        <input
                            type="number"
                            name="qty"
                            id="qty"
                            min="1"
                            required>

                    </td>
                </tr>

                <tr>
                    <td>Harga</td>
                    <td>

                        <input
                            type="number"
                            name="price"
                            id="price"
                            value="<?= $harga; ?>"
                            readonly>

                    </td>
                </tr>

                <tr>
                    <td>Subtotal</td>
                    <td>

                        <input
                            type="number"
                            id="subtotal"
                            readonly>

                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>

                        <button
                            type="submit"
                            name="simpan" class="btn btn-success">

                            Simpan

                        </button>

                        <a
                            href="index.php"
                            class="btn btn-primary">

                            Kembali

                        </a>

                    </td>
                </tr>

            </table>

        </form>

    </div>

</div>

<script>

const qty = document.getElementById('qty');
const price = document.getElementById('price');
const subtotal = document.getElementById('subtotal');

function hitungSubtotal()
{
    let q = parseInt(qty.value) || 0;
    let p = parseInt(price.value) || 0;

    subtotal.value = q * p;
}

qty.addEventListener('keyup', hitungSubtotal);
qty.addEventListener('change', hitungSubtotal);

hitungSubtotal();

</script>

<?php include '../assets/footer.php'; ?>