<?php

require '../vendor/autoload.php';
include '../config/koneksi.php';

use Dompdf\Dompdf;

$html = '
<h2>Data Customer</h2>

<table border="1" width="100%" cellspacing="0" cellpadding="5">
<tr>
    <th>ID</th>
    <th>Nama Customer</th>
    <th>Perusahaan</th>
    <th>Alamat</th>
</tr>
';

$query = mysqli_query(
    $koneksi,
    "SELECT * FROM customer"
);

while ($data = mysqli_fetch_assoc($query)) {
    $html .= '
    <tr>
        <td>' . $data['id_customer'] . '</td>
        <td>' . $data['nama_customer'] . '</td>
        <td>' . $data['perusahaan_cust'] . '</td>
        <td>' . $data['alamat'] . '</td>
    </tr>
    ';
}

$html .= '</table>';

$dompdf = new Dompdf();

$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

$dompdf->stream(
    "Data_Customer.pdf",
    ["Attachment" => false]
);