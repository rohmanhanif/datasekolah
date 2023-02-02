<?php
session_start();

// if (isset($_COOKIE['nama_login'])) {
//     header("Location: index.php");
// }
if (isset($_SESSION['ingatkan'])) {
    header("Location: home.php");
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>login </title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

    <h1>Data sekolah SMP 001 Samarinda<br /></h1>


    <p class="tulisan_login">Silahkan login</p>
    <?php
    if (isset($_GET['pesan'])) { ?>
        <div class="alert alert-primary" role="alert">
            <?= $_GET['pesan'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php }
    ?>
    <div class="kotak_login">
        <form class="" action="aksilogin.php" method="post">
            <label>Username</label>
            <input type="text" name="username" class="form_login" placeholder="Username atau email ..">

            <label>Password</label>
            <input type="text" name="password" class="form_login" placeholder="Password ..">

            <input type="submit" class="tombol_login" value="LOGIN">

            <br />
            <br />
            <center>
                <a class="link" href="">kembali</a>
            </center>
        </form>

    </div>


</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>