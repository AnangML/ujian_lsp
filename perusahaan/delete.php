<?php

include '../config/koneksi.php';

$id = $_GET['id'];

mysqli_query(
    $koneksi,
    "DELETE FROM perusahaan
     WHERE id_perusahaan='$id'"
);

echo "
<script>
    alert('Data berhasil dihapus');
    window.location='index.php';
</script>
";