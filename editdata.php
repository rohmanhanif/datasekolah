<?php
include_once('koneksi.php');

// echo var_dump($_POST);
// Kolom data di table
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jk = $_POST['jenkel'];
$foto = $_FILES['foto']['name'];
$id_kelas = $_POST['pilih_kelas'];
// $id_kelas = $_POST['pilih_kelas'];

$no = $_POST['no'];

echo var_dump($_POST);

// echo "Selamat $nama , alamat anda $alamat , berjenis kelamin $jk No HP $nohp , dengan email $email <br>";

// echo '<img src="assets/'.$foto.'" class="card-img-top" alt="...">';

// update data siswa
$query = "UPDATE datasiswa set `nama` = '$nama',`alamat` = '$alamat',`jenkel` = '$jk',`foto` = '$foto' where `no` = '$no'  ";

$update_data = mysqli_query($koneksi, $query);

if ($update_data) {
    echo "<p>Data berhasil masuk</p>";
}else{
    echo "<p>Data gagal masuk</p>";
}

$cek_data_kelas = mysqli_query($koneksi,"select * from daftar_kelas where `no_siswa` = '$no'");
// update daftar kelas
if (mysqli_fetch_assoc($cek_data_kelas)) {
    $query = mysqli_query($koneksi,"UPDATE daftar_kelas set `id_kelas` = '$id_kelas' where `no_siswa` = '$no'  ");

} else {
    $query = mysqli_query($koneksi,"insert daftar_kelas values ( null,'$no','$id_kelas') ");
}




echo "<br>";

// echo var_dump($_FILES);

// $nama = $_FILES["foto"]["name"];

move_uploaded_file($_FILES["foto"]["tmp_name"], 'assets/'.$foto);
header('Location: home.php');