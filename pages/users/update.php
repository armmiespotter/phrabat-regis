<?php
include_once '../../libraries/SuperAdminMiddleware.php';
require_once '../../configs/config.php';
require_once '../../libraries/Db.php';

$userId = $_GET['id'];
$userItems = $mysqli->query("SELECT * FROM user WHERE id = $userId");
$item = $userItems->fetch_assoc();

include_once '../../components/Header.php';
?>

<body>
    <?php include_once '../../components/Navbar.php' ?>
    <div class="container">
        <form action="../../libraries/UserUpdate.php" method="POST">
            <div class="d-flex justify-content-center">
                <h4 class="fw-bold align-self-center">แก้ไขผู้ดูแลระบบ</h4>
            </div>
            <h5 class="fw-bold">ผู้ดูแลระบบ</h5>
            <hr>
            <div class="card shadow-sm mb-3">
                <div class="card-header bg-light d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="fw-bold">
                            ผู้ดูแลระบบ
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="alert alert-warning alert-dismissible fade show d-flex align-items-center" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </svg>
                        <div>
                            <strong>ใส่รหัสผ่าน!</strong> เฉพาะเมื่อต้องการเปลี่ยนรหัสผ่านเท่านั้น
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <label for="username" class="form-label">ชื่อผู้ใช้</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?= $item['username'] ?>" required>
                    </div>
                    <div class="col mb-3">
                        <label for="password" class="form-label">รหัสผ่าน</label>
                        <input type="password" minlength="8" class="form-control" id="password" name="password" onblur="validatePassword()">
                    </div>
                    <div class="col mb-3">
                        <label for="confirm_password" class="form-label">ยืนยันรหัสผ่าน</label>
                        <input type="password" minlength="8" class="form-control" id="confirm_password" name="confirm_password" onblur="validatePassword()">
                    </div>
                    <div class="col mb-3">
                        <label for="name" class="form-label">ชื่อ</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $item['name'] ?>" required>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <input type="text" id="id" name="id" value="<?= $userId ?>" hidden>
                <button class="btn btn-sm btn-primary" type="submit"><i class="far fa-save"></i> บันทึก</button>
                <a href="index.php" class="btn btn-sm btn-outline-secondary">ยกเลิก</a>
            </div>
        </form>
    </div>
    <?php include_once '../../components/Footer.php' ?>
</body>

</html>