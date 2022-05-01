<?php
include_once '../../libraries/AuthMiddleware.php';
require_once '../../configs/config.php';
require_once '../../libraries/Db.php';

$personId = $_GET['id'];
$userId = $_SESSION['id'];
$personItems = $mysqli->query("SELECT * FROM person WHERE id = $personId");
$item = $personItems->fetch_assoc();

include_once '../../components/Header.php';
?>

<body>
    <?php include_once '../../components/Navbar.php' ?>
    <div class="container">
        <form action="../../libraries/PersonUpdate.php" method="POST" enctype="multipart/form-data" id="form-person-create">
            <div class="d-flex justify-content-center">
                <h4 class="fw-bold align-self-center">แก้ไขทะเบียนประวัติ</h4>
            </div>
            <h5 class="fw-bold">ทะเบียนประวัติ</h5>
            <hr>
            <div class="card shadow-sm mb-3">
                <div class="card-header bg-light d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="fw-bold">
                            ทะเบียนประวัติ
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9 order-md-0 order-1 mb-3">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="firstname" class="form-label">ชื่อ</label>
                                    <input type="text" class="form-control" id="firstname" name="firstname" value="<?= $item['firstname'] ?>" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="lastname" class="form-label">นามสกุล</label>
                                    <input type="text" class="form-control" id="lastname" name="lastname" value="<?= $item['lastname'] ?>" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="age" class="form-label">อายุ</label>
                                    <input type="number" class="form-control" id="age" name="age" value="<?= $item['age'] ?>" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="degree" class="form-label">วุฒิการศึกษา</label>
                                    <input type="text" class="form-control" id="degree" name="degree" value="<?= $item['degree'] ?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="career" class="form-label">อาชีพ</label>
                                    <input type="text" class="form-control" id="career" name="career" value="<?= $item['career'] ?>" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="tel" class="form-label">โทร</label>
                                    <input type="text" maxlength="10" class="form-control" id="tel" name="tel" value="<?= $item['tel'] ?>" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="father_firstname" class="form-label">ชื่อบิดา</label>
                                    <input type="text" class="form-control" id="father_firstname" name="father_firstname" value="<?= $item['father_firstname'] ?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="father_lastname" class="form-label">นามสกุล</label>
                                    <input type="text" class="form-control" id="father_lastname" name="father_lastname" value="<?= $item['father_lastname'] ?>" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="mother_firstname" class="form-label">ชื่อมารดา</label>
                                    <input type="text" class="form-control" id="mother_firstname" name="mother_firstname" value="<?= $item['mother_firstname'] ?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="mother_lastname" class="form-label">นามสกุล</label>
                                    <input type="text" class="form-control" id="mother_lastname" name="mother_lastname" value="<?= $item['mother_lastname'] ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 order-md-0 order-0 mb-3">
                            <div class="poster">
                                <div class="overlay" onclick="$('#image').click()">
                                    <i class="fas fa-file-upload fa-3x mb-3"></i>
                                    <p>อัปโหลดรูปภาพ</p>
                                </div>
                                <img src="../../images/<?= $item['image'] ?>" id="image-preview" class="w-100">
                                <input type="file" id="image" name="image" accept="image/png, image/jpeg" hidden>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h5 class="fw-bold">ที่อยู่</h5>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow-sm mb-3">
                        <div class="card-header bg-light d-flex justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="fw-bold">
                                    ภูมิลำเนาเดิม
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <label for="address" class="form-label">ที่อยู่</label>
                            <textarea class="form-control" id="address" name="address" cols="30" rows="10"><?= $item['address'] ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow-sm mb-3">
                        <div class="card-header bg-light d-flex justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="fw-bold">
                                    ที่อยู่ปัจจุบัน/ที่ทำงาน
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <label for="current_address" class="form-label">ที่อยู่</label>
                            <textarea class="form-control" id="current_address" name="current_address" cols="30" rows="10"><?= $item['current_address'] ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <h5 class="fw-bold">เข้า/ออก</h5>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow-sm mb-3">
                        <div class="card-header bg-light d-flex justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="fw-bold">
                                    เข้ามาอยู่วัด
                                </div>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="is_enter" name="is_enter" onchange="checkIsEnter()" <?= ($item['is_enter']) ? "checked" : "" ?>>
                                <label class="form-check-label" for="is_enter">ใช้งาน</label>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="enter_reason" id="enter_reason1" value="practice" <?= ($item['enter_reason'] == 'practice') ? "checked" : "" ?>>
                                        <label class="form-check-label" for="enter_reason1">
                                            ปฏิบัติธรรม
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="enter_reason" id="enter_reason2" value="ordain" <?= ($item['enter_reason'] == 'ordain') ? "checked" : "" ?>>
                                        <label class="form-check-label" for="enter_reason2">
                                            บรรพชา/อุปสมบท
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="enter_reason" id="enter_reason3" value="study" <?= ($item['enter_reason'] == 'study') ? "checked" : "" ?>>
                                        <label class="form-check-label" for="enter_reason3">
                                            ศึกษาต่อ
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="enter_date" class="form-label">วันที่</label>
                                    <input type="date" class="form-control" id="enter_date" name="enter_date" value="<?= date('Y-m-d', strtotime($item['enter_date'])) ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow-sm mb-3">
                        <div class="card-header bg-light d-flex justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="fw-bold">
                                    ออกจากวัด
                                </div>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="is_leave" name="is_leave" onchange="checkIsLeave()" <?= ($item['is_leave']) ? "checked" : "" ?>>
                                <label class="form-check-label" for="is_leave">ใช้งาน</label>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="leave_reason" id="leave_reason1" value="out" <?= ($item['leave_reason'] == 'out') ? "checked" : "" ?>>
                                        <label class="form-check-label" for="leave_reason1">
                                            ออก
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="leave_reason" id="leave_reason2" value="resign" <?= ($item['leave_reason'] == 'resign') ? "checked" : "" ?>>
                                        <label class="form-check-label" for="leave_reason2">
                                            ลา
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="leave_reason" id="leave_reason3" value="shift" <?= ($item['leave_reason'] == 'shift') ? "checked" : "" ?>>
                                        <label class="form-check-label" for="leave_reason3">
                                            ย้าย
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="leave_date" class="form-label">วันที่</label>
                                    <input type="date" class="form-control" id="leave_date" name="leave_date" value="<?= date('Y-m-d', strtotime($item['leave_date'])) ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h5 class="fw-bold">บรรพชา/อุปสมบท</h5>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow-sm mb-3">
                        <div class="card-header bg-light d-flex justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="fw-bold">
                                    บรรพชา
                                </div>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="is_novice" name="is_novice" onchange="checkIsNovice()" <?= ($item['is_novice']) ? "checked" : "" ?>>
                                <label class="form-check-label" for="is_novice">ใช้งาน</label>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="novice_date" class="form-label">วันที่</label>
                                    <input type="date" class="form-control" id="novice_date" name="novice_date" value="<?= date('Y-m-d', strtotime($item['novice_date'])) ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="novice_patron" class="form-label">ผู้อุปัชฌาย์</label>
                                    <input type="text" class="form-control" id="novice_patron" name="novice_patron" value="<?= $item['novice_patron'] ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="novice_temple" class="form-label">วัด</label>
                                    <input type="text" class="form-control" id="novice_temple" name="novice_temple" value="<?= $item['novice_temple'] ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="novice_address" class="form-label">ที่อยู่</label>
                                    <textarea class="form-control" id="novice_address" name="novice_address" cols="30" rows="10"><?= $item['novice_address'] ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow-sm mb-3">
                        <div class="card-header bg-light d-flex justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="fw-bold">
                                    อุปสมบท
                                </div>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="is_monk" name="is_monk" onchange="checkIsMonk()" <?= ($item['is_monk']) ? "checked" : "" ?>>
                                <label class="form-check-label" for="is_monk">ใช้งาน</label>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="monk_date" class="form-label">วันที่</label>
                                    <input type="date" class="form-control" id="monk_date" name="monk_date" value="<?= date('Y-m-d', strtotime($item['monk_date'])) ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="monk_patron" class="form-label">ผู้อุปัชฌาย์</label>
                                    <input type="text" class="form-control" id="monk_patron" name="monk_patron" value="<?= $item['monk_patron'] ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="monk_temple" class="form-label">วัด</label>
                                    <input type="text" class="form-control" id="monk_temple" name="monk_temple" value="<?= $item['monk_temple'] ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="monk_address" class="form-label">ที่อยู่</label>
                                    <textarea class="form-control" id="monk_address" name="monk_address" cols="30" rows="10"><?= $item['monk_address'] ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h5 class="fw-bold">บันทึก</h5>
            <hr>
            <div class="card shadow-sm mb-3">
                <div class="card-header bg-light d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="fw-bold">
                            บันทึก
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <label for="note" class="form-label">บันทึก</label>
                    <textarea class="form-control" id="note" name="note" cols="30" rows="10"><?= $item['note'] ?></textarea>
                </div>
            </div>
            <div class="mb-3">
                <input type="text" id="id" name="id" value="<?= $personId ?>" hidden>
                <input type="text" id="user_id" name="user_id" value="<?= $userId ?>" hidden>
                <button class="btn btn-sm btn-primary" type="submit"><i class="far fa-save"></i> บันทึก</button>
                <a href="index.php" class="btn btn-sm btn-outline-secondary">ยกเลิก</a>
            </div>
        </form>
    </div>
    <?php include_once '../../components/Footer.php' ?>
</body>

</html>