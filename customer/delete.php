<?php

include '../config/koneksi.php';

$id = $_GET['id'];

mysqli_query(
    $koneksi,
    "DELETE FROM customer
    WHERE id_customer='$id'"
);

echo "
<script>
    alert('Data berhasil dihapus');
    window.location='index.php';
</script>
";