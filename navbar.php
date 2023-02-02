<nav class="navbar navbar-expand-lg navbar-dark bg-dark " style="background-color: #e3f2fd;">
    <div class="container">
        <a class="navbar-brand" href="#">Data sekolah</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?=($menu=="home") ? "active" : "" ;?>" aria-current="page" href="home.php">Home</a>
                </li>vi
                <li class="nav-item">
                    <a class="nav-link <?=($menu=="data") ? "active" : "" ;?>" href="index.php">Tambah Data</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Pilih Kelas
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">kelas VII</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="=">Kelas VIII</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="=">Kelas IX</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Personal
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">login</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>