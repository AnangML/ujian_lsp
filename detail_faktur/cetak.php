<?php

require '../vendor/autoload.php';
include '../config/koneksi.php';

use Dompdf\Dompdf;

$html = '

<h2 align="center">
LAPORAN DETAIL PENJUALAN
</h2>

<hr>

<table border="1"
width="100%"
cellpadding="5"
cellspacing="0">

<tr>
    <th>No Faktur</th>
    <th>Produk</th>
    <th>Qty</th>
    <th>Harga</th>
    <th>Subtotal</th>
</tr>

';

$query = mysqli_query(
    $koneksi,
    "SELECT
        df.*,
        p.nama_produk
    FROM detail_faktur df
    JOIN produk p
    ON df.id_produk = p.id_produk
    ORDER BY df.no_faktur ASC"
);

$grand_total = 0;

while ($data = mysqli_fetch_assoc($query)) {
    $subtotal =
        $data['qty'] *
        $data['price'];

    $grand_total += $subtotal;

    $html .= '

    <tr>
        <td>' . $data['no_faktur'] . '</td>
        <td>' . $data['nama_produk'] . '</td>
        <td>' . $data['qty'] . '</td>
        <td>Rp ' . number_format($data['price']) . '</td>
        <td>Rp ' . number_format($subtotal) . '</td>
    </tr>

    ';
}

$html .= '

<tr>
    <td colspan="4" align="right">
        <b>Total</b>
    </td>

    <td>
        <b>Rp ' . number_format($grand_total) . '</b>
    </td>
</tr>

</table>

<br>

<p>
Tanggal Cetak :
' . date('d-m-Y H:i:s') . '
</p>

';

$dompdf = new Dompdf();

$dompdf->loadHtml($html);

$dompdf->setPaper(
    'A4',
    'landscape'
);

$dompdf->render();

$dompdf->stream(
    "Detail_Penjualan.pdf",
    array(
        "Attachment" => false
    )
);