<nav class="navbar navbar-expand-lg navbar-light bg-light mb-3 shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="../dashboard/index.php">PHRABAT<span class="text-primary">Regis</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../persons/index.php">ทะเบียนประวัติ</a>
                </li>
                <?php if ($_SESSION['role'] == 'Super Admin') { ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../users/index.php">ผู้ดูแลระบบ</a>
                    </li>
                <?php } ?>
            </ul>
            <form class="d-flex ">
                <div class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle text-dark px-0" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= $_SESSION['name'] ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="../../libraries/AuthLogout.php">ออกจากระบบ</a></li>
                    </ul>
                </div>
            </form>
        </div>
    </div>
</nav>