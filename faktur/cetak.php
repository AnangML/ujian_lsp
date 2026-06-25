<?php

require '../vendor/autoload.php';
include '../config/koneksi.php';

use Dompdf\Dompdf;

$html = '

<h2 align="center">
LAPORAN PENJUALAN
</h2>

<hr>

<table border="1"
width="100%"
cellpadding="5"
cellspacing="0">

<tr>
    <th>No Faktur</th>
    <th>Tanggal</th>
    <th>Customer</th>
    <th>Perusahaan</th>
    <th>Metode Bayar</th>
    <th>Total</th>
</tr>

';

$query = mysqli_query(
    $koneksi,
    "SELECT
    f.*,
    c.nama_customer,
    p.nama_perusahaan
    FROM faktur f
    JOIN customer c
    ON f.id_customer = c.id_customer
    JOIN perusahaan p
    ON f.id_perusahaan = p.id_perusahaan"
);

while ($data = mysqli_fetch_assoc($query)) {
    $html .= '

    <tr>
        <td>' . $data['no_faktur'] . '</td>
        <td>' . $data['tgl_faktur'] . '</td>
        <td>' . $data['nama_customer'] . '</td>
        <td>' . $data['nama_perusahaan'] . '</td>
        <td>' . $data['metode_bayar'] . '</td>
        <td>' . number_format($data['grand_total']) . '</td>
    </tr>

    ';
}

$html .= '</table>';

$dompdf = new Dompdf();

$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'landscape');

$dompdf->render();

$dompdf->stream(
    "Laporan_Penjualan.pdf",
    ["Attachment" => false]
);