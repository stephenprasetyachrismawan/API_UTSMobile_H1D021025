<?php
require 'koneksi.php';
$input = file_get_contents('php://input');
$data = json_decode($input, true);
//terima data dari mobile
$uraian = trim($data['uraian']);
$jumlah = trim($data['jumlah']);
http_response_code(201);
if ($uraian != '' and $jumlah != '') {
    $query = mysqli_query($koneksi, "insert into keuangan(uraian,jumlah) values('$uraian','$jumlah')");
    $pesan = true;
} else {
    $pesan = false;
}
echo json_encode($pesan);
echo mysqli_error($koneksi);
