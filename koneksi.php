<?php
// <!-- KOneksi database -->
$koneksi = mysqli_connect('localhost', 'root', '', 'datasekolah');
// periksa koneksi
if(!$koneksi){
    die("Koneksi bermasalah".mysqli_connect_errno()." - ".mysqli_connect_error());
}
