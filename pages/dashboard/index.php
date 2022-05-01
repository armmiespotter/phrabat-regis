<?php
include_once '../../libraries/AuthMiddleware.php';
require_once '../../configs/config.php';
require_once '../../libraries/Db.php';

$personItems = $mysqli->query("SELECT * FROM person");
$userItems = $mysqli->query("SELECT * FROM user");

include_once '../../components/Header.php';
?>

<body>
    <?php include_once '../../components/Navbar.php' ?>
    <div class="container">
        <div class="card shadow-sm mb-3">
            <div class="card-header bg-light d-flex justify-content-between">
                <div class="d-flex align-items-center">
                    <div class="fw-bold">
                        แผงควบคุม
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <a class="card shadow-sm text-decoration-none text-primary" href="../persons/index.php">
                            <div class="card-body d-flex align-items-center">
                                <div class="p-3 bg-primary text-white rounded">
                                    <i class="far fa-user fa-2x"></i>
                                </div>
                                <div class="d-flex flex-column px-3">
                                    <span class="fw-bold">บุคลากร</span>
                                    <span class="card-text"><?= $personItems->num_rows ?> <span class="text-muted">คน</span></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <a class="card shadow-sm text-decoration-none text-danger" href="../users/index.php">
                            <div class="card-body d-flex align-items-center">
                                <div class="p-3 bg-danger text-white rounded">
                                    <i class="fas fa-user-secret fa-2x"></i>
                                </div>
                                <div class="d-flex flex-column px-3">
                                    <span class="fw-bold">ผู้ดูแลระบบ</span>
                                    <span class="card-text"><?= $userItems->num_rows ?> <span class="text-muted">คน</span></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include_once '../../components/Footer.php'
    ?>
</body>

</html>