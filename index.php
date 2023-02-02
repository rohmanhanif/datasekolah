<?php 
require_once('koneksi.php');
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">
        <form action="postdata.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Tulis namamu">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <p class="">Jenis Kelamin</p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenkel" value="L" id="jenkel1">
                    <label class="form-check-label" for="jenkel1">
                        Laki-laki
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenkel" value="P" id="jenkel2" checked>
                    <label class="form-check-label" for="jenkel2">
                        Perempuan
                    </label>
                </div>
            </div>
            <div class="mb-3">
            <label for="pilih_kelas" class="form-label">Pilih Kelas</label>
            <select name="pilih_kelas" class="form-control" id="pilih_kelas">

                <option>Pilih Kelas</option>
                <?php
                $ambil_data_kelas = mysqli_query($koneksi,"select * from kelas");
                while ($kelas = mysqli_fetch_assoc($ambil_data_kelas)) {
                    $nama_kelas = $kelas['nama_kelas'];
                    $selected = ($kelas['id'] == $idkelas) ? 'selected' : '' ;
                    echo "<option value='{$kelas['id']}' $selected>{$kelas['nama_kelas']}</option>";
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input class="form-control" type="file" name="foto" id="foto">
        </div>
        <button type="submit" class="btn btn-sm btn-info">Upload</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>