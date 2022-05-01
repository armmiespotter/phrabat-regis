<?php

session_start();
if (isset($_SESSION['username'])) {
    header("Location: ../dashboard/");
}

include_once '../../components/Header.php';
?>

<body>
    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="card shadow-sm py-3" style="width: 20rem;">
            <div class="card-body">
                <form action="javascript:void(0)" onsubmit="authLogin()">
                    <div class="d-flex align-items-center justify-content-center">
                        <h4 class="fw-bold mb-3">PHRABAT<span class="text-primary">Regis</span></h4>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">ชื่อผู้ใช้</label>
                        <input type="text" class="form-control" id="username" placeholder="ชื่อผู้ใช้">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">รหัสผ่าน</label>
                        <input type="password" class="form-control" id="password" placeholder="รหัสผ่าน">
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-primary" type="submit">เข้าสู่ระบบ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include_once '../../components/JSFooter.php' ?>
</body>

</html>