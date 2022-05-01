<?php
include_once '../../libraries/AuthMiddleware.php';
require_once '../../configs/config.php';
require_once '../../libraries/Db.php';

$personItems = $mysqli->query("SELECT person.*,user.name AS update_name FROM person LEFT JOIN user ON person.update_by = user.id ORDER BY update_date DESC");

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
                            <th scope="col">ชื่อ</th>
                            <th scope="col">นามสกุล</th>
                            <th scope="col">ผู้เขียน</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($personItems as $item) { ?>
                            <tr>
                                <td><?= $item['firstname'] ?></td>
                                <td><?= $item['lastname'] ?></td>
                                <td><?= $item['update_name'] ?></td>
                                <td>
                                    <a href="view.php?id=<?= $item['id'] ?>" class="btn btn-sm btn-primary"><i class="fas fa-external-link-alt"></i> ดูข้อมูล</a>
                                    <a href="update.php?id=<?= $item['id'] ?>" class="btn btn-sm btn-secondary"><i class="fas fa-pencil-alt"></i> แก้ไขข้อมูล</a>
                                    <button class="btn btn-sm btn-danger" onclick="deletePerson(<?= $item['id'] ?>)"><i class="fas fa-trash-alt"></i> ลบข้อมูล</button>
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