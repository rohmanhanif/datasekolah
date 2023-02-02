<?php

$menu = "data";
require_once('koneksi.php');



// panggil table data siswa
if (isset($_GET['pencarian'])) {
    $cari = $_GET['pencarian'];
    // panggil table data siswa
    $ambil_data = "SELECT a.*,k.nama_kelas FROM `datasiswa` a left JOIN  daftar_kelas b on b.no_siswa=a.no left join kelas k on k.id=b.id_kelas where a.nama like '%$cari%'";
} else {
    $ambil_data = "SELECT datasiswa.*,daftar_kelas.id,kelas.nama_kelas from datasiswa left join daftar_kelas on daftar_kelas.no_siswa=datasiswa.no left join kelas on kelas.id=daftar_kelas.id_kelas ";
}

?>

<!doctype html>
<html lang="en">
<!-- <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">PHPDATABASE</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
            </ul>
        </div>
    </nav>
</header> -->


<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data sekolah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
</head>

<body >
    
    <?php require_once('navbar.php'); ?>
    <div class="container">
        <table class="table" id="table_id">
            <thead>
                <tr>
                    <th scope="col">no</th>
                    <th scope="col">ID</th>
                    <th scope="col">NamaSiswa</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Gender</th>
                    <th scope="col">nama kelas</th>
                    <th scope="col">File</th>

                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                $hasil = $koneksi->query($ambil_data);


                while ($row = $hasil->fetch_assoc()) {

                    // jika foto kosong maka tampilkan gambar default
                    if ($row['foto'] == "") {
                        $gambar = "";
                    } else {
                        $gambar = $row['foto'];
                    }


                ?>
                
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td><?php echo $row['no'] ?></td>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['alamat'] ?></td>
                        <td><?= $row['jenkel'] ?></td>
                        <td><?= $row['nama_kelas'] ?></td>
                        <td><img class="img-thumbnail" width="100" src="assets/<?= $gambar ?>" /></td>
                        <td>
                            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-id="<?= $row['no'] ?>" data-bs-aksi="ubah"> Ubah
                            </button>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-id="<?= $row['no'] ?>" data-bs-aksi="hapus"> Hapus
                            </button>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <!-- JQUERY 3.X -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <!-- table_id -->
    
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>


    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
            // alert('Hallo');
            const modal = document.getElementById('exampleModal')
            modal.addEventListener('show.bs.modal', event => {
                const button = event.relatedTarget
                const id = button.getAttribute('data-bs-id');
                const aksi = button.getAttribute('data-bs-aksi');
                // console.log(id);
                $.post('form.php', {
                    id,
                    aksi
                }, function(a) {
                    // console.log(a);
                }).done(function(x) {
                    $('.modal-body').html(x);
                }).fail(function() {
                    alert("error");
                }).always(function() {
                    // alert("finished");
                });
            });


            // proses update
            //     $("#form").submit(function(event) {
            //         event.preventDefault();
            //         // const data_form = this.serialize();
            //         // console.log(data_form);
            //     })

            // });
            // const form = document.querySelector('form');
            // form.addEventListener('submit', event => {
            //     event.preventDefault();
            //     const input = document.querySelector('input[type="text"]');
            //     const searchTerm = input.value;
            // lakukan pencarian dengan menggunakan searchTerm
        });
    </script>

</body>


</html>