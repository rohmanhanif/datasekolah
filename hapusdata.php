
<?php
include_once('koneksi.php');
$no = $_POST['no'];
$query = "select `foto` from `datasiswa` where `no` = '$no'  ";
$data_foto = mysqli_query($koneksi, $query);
$foto = mysqli_fetch_assoc($data_foto);

// Hapus data gambar di assets
unlink("assets/" . $foto['foto']) ?? '';

// Hapus data;
$hapus_data = mysqli_query($koneksi, "DELETE from `datasiswa` where `no` = '$no' ");
if ($hapus_data) {
    echo "<p>Data berhasil dihapus</p>";
}else{
    echo "<p>Data gagal dihapus</p>";
}
header("Location: home.php");
echo var_dump($_POST);