<?php

include '../config/koneksi.php';

$faktur = $_GET['faktur'];
$produk = $_GET['produk'];

mysqli_query(
    $koneksi,
    "DELETE FROM detail_faktur
    WHERE no_faktur='$faktur'
    AND id_produk='$produk'"
);

echo "
<script>
alert('Data berhasil dihapus');
window.location='index.php';
</script>
";