<?php
include_once('koneksi.php');

// echo var_dump($_POST);
// Kolom data di table
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jk = $_POST['jenkel'];
$foto = $_FILES['foto']['name'];


// echo "Selamat $nama , alamat anda $alamat , berjenis kelamin $jk No HP $nohp , dengan email $email <br>";

// echo '<img src="assets/'.$foto.'" class="card-img-top" alt="...">';


$insert_data = mysqli_query($koneksi, "INSERT into datasiswa (`nama`,`alamat`,`jenkel`,`foto`) values ('$nama','$alamat','$jk','$foto') ");

if ($insert_data) {
    header("Location: home.php");
}else{
    echo "<p>Data gagal masuk</p>";
}

echo "<br>";

// echo var_dump($_FILES);

// $nama = $_FILES["foto"]["name"];

move_uploaded_file($_FILES["foto"]["tmp_name"], "assets/$foto");
?>