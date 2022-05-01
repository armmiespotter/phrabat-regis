<?php
include_once '../../libraries/SuperAdminMiddleware.php';
include_once '../../components/Header.php';
?>

<body>
    <?php include_once '../../components/Navbar.php' ?>
    <div class="container">
        <form action="../../libraries/UserCreate.php" method="POST">
            <div class="d-flex justify-content-center">
                <h4 class="fw-bold align-self-center">เพิ่มผู้ดูแลระบบ</h4>
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
                    <div class="col mb-3">
                        <label for="username" class="form-label">ชื่อผู้ใช้</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="col mb-3">
                        <label for="password" class="form-label">รหัสผ่าน</label>
                        <input type="password" minlength="8" class="form-control" id="password" name="password" onblur="validatePassword()" required>
                    </div>
                    <div class="col mb-3">
                        <label for="confirm_password" class="form-label">ยืนยันรหัสผ่าน</label>
                        <input type="password" minlength="8" class="form-control" id="confirm_password" name="confirm_password" onblur="validatePassword()" required>
                    </div>
                    <div class="col mb-3">
                        <label for="name" class="form-label">ชื่อ</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <button class="btn btn-sm btn-primary" type="submit"><i class="far fa-save"></i> บันทึก</button>
                <a href="index.php" class="btn btn-sm btn-outline-secondary">ยกเลิก</a>
            </div>
        </form>
    </div>
    <?php include_once '../../components/Footer.php' ?>
</body>

</html>