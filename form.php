<?php
include_once('koneksi.php');

$id = $_POST['id'];

$ambil_data = mysqli_query($koneksi, "SELECT a.*,k.nama_kelas,k.id as id_kelas FROM `datasiswa` a left JOIN daftar_kelas b on b.no_siswa=a.no left join kelas k on k.id=b.id_kelas  where a.`no` = '$id'");

$data = mysqli_fetch_assoc($ambil_data);
// echo var_dump($data);


//  echo var_dump($data);
$no = $data['no'];
$nama = $data['nama'];
$alamat = $data['alamat'];
$jenkel = $data['jenkel'];
$foto = $data['foto'];
$idkelas = $data['id_kelas'];

?>

<?php
// cek aksi form
if($_POST['aksi'] == 'ubah') {

?>

<form id="form" action="editdata.php" method="post" enctype="multipart/form-data" >
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="hidden" name="no" value="<?=$no?>">
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Tulis namamu" value="<?php echo $nama;?>" />
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea class="form-control" id="alamat" name="alamat" rows="3"><?=$alamat?></textarea>
    </div>
    <div class="mb-3">
        <p class="">Jenis Kelamin</p>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="jenkel" value="L" id="jenkel1" <?=($jenkel == 'L') ? 'checked' : '' ?> />
            <label class="form-check-label" for="jenkel1">
                Laki-laki
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="jenkel" value="P" id="jenkel2" <?=($jenkel == 'P') ? 'checked' : '' ?> />
            <label class="form-check-label" for="jenkel2">
                Perempuan
            </label>
            <div class="mb-3">
            <label for="pilih_kelas" class="form-label">Pilih Kelas</label>
            <select name="pilih_kelas" class="form-control" id="pilih_kelas">

                <option>Pilih Kelas</option>
                <?php
                 $ambil_data_kelas = mysqli_query($koneksi,"select * from kelas");
                while ($kelas = mysqli_fetch_assoc($ambil_data_kelas)) {
                    $nama_kelas = $kelas['nama_kelas'];
                    $selected = ($kelas['id'] == $id_kelas) ? 'selected' : '' ;
                    echo "<option value='{$kelas['id']}' $selected>{$kelas['nama_kelas']}</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <input class="form-control" type="file" name="foto" id="foto">
    </div>
    <img src="assets/<?=$foto?>" class="img-thumbnail" alt="">
    <button type="submit" class="btn btn-sm btn-info" value="ubah">Ubah Data</button>
</form>


<?php }
 else { ?>
<p> yakin mau dihapus ?? </p>
<?php
echo $no;
?>
<form action="hapusdata.php" method="post">
    <input type="hidden" name="no" value="<?= $no;?>">
    <button type="sumbit" name="hapus" class="btn btn-sm btn-danger" valse="hapus">hapus</button>
</form>

<?php
};
?>

