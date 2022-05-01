<?php
include_once '../../libraries/SuperAdminMiddleware.php';
require_once '../../configs/config.php';
require_once '../../libraries/Db.php';

$personItems = $mysqli->query("SELECT * FROM user");

// $item = $personItems->fetch_assoc();

include_once '../../components/Header.php';
?>

<body>
    <?php include_once '../../components/Navbar.php' ?>
    <div class="container">
        <div class="card shadow-sm mb-3">
            <div class="card-header bg-light d-flex justify-content-between">
                <div class="d-flex align-items-center">
                    <div class="fw-bold">
                        รายชื่อ
                    </div>
                </div>
                <div class="d-flex">
                    <a href="./create.php" class="btn btn-sm btn-primary"><i class="fa-solid fa-square-plus"></i> เพิ่มข้อมูล</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ชื่อผู้ใช้</th>
                            <th scope="col">ตำแหน่ง</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($personItems as $item) { ?>
                            <tr>
                                <td><?= $item['username'] ?></td>
                                <td>
                                    <?php if ($item['role'] == 'Super Admin') { ?>
                                        <span class="badge bg-primary"><?= $item['role'] ?></span>
                                    <?php } else { ?>
                                        <span class="badge bg-secondary"><?= $item['role'] ?></span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="update.php?id=<?= $item['id'] ?>" class="btn btn-sm btn-secondary"><i class="fas fa-pencil-alt"></i> แก้ไขข้อมูล</a>
                                    <button class="btn btn-sm btn-danger" onclick="deleteUser(<?= $item['id'] ?>)"><i class="fas fa-trash-alt"></i> ลบข้อมูล</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
    include_once '../../components/Footer.php'
    ?>
</body>

</html>