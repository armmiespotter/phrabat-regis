<?php
include_once '../../libraries/AuthMiddleware.php';
require_once '../../configs/config.php';
require_once '../../libraries/Db.php';

$personId = $_GET['id'];
$personItems = $mysqli->query("SELECT person.*,user.name AS update_name FROM person LEFT JOIN user ON person.update_by = user.id WHERE person.id = $personId");
$item = $personItems->fetch_assoc();

include_once '../../components/Header.php';
?>

<body>
    <?php include_once '../../components/Navbar.php' ?>
    <div class="container mb-3">
        <div class="row">
            <div class="col-12 col-md-3">
                <img src="../../images/<?= $item['image'] ?>" class="w-100 mb-3 img-thumbnail" alt="">
            </div>
            <div class="col-12 col-md-9">
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
                            <label class="form-label col-sm-5 text-sm-end fw-bold">ชื่อ-นามสกุล :</label>
                            <label class="form-label col-sm-7"><?= $item['firstname'] ?> <?= $item['lastname'] ?></label>
                        </div>
                        <div class="row">
                            <label class="form-label col-sm-5 text-sm-end fw-bold">อายุ :</label>
                            <label class="form-label col-sm-7"><?= $item['age'] ?></label>
                        </div>
                        <div class="row">
                            <label class="form-label col-sm-5 text-sm-end fw-bold">วุฒิการศีกษา :</label>
                            <label class="form-label col-sm-7"><?= $item['degree'] ?></label>
                        </div>
                        <div class="row">
                            <label class="form-label col-sm-5 text-sm-end fw-bold">อาชีพ :</label>
                            <label class="form-label col-sm-7"><?= $item['career'] ?></label>
                        </div>
                        <div class="row">
                            <label class="form-label col-sm-5 text-sm-end fw-bold">เบอร์โทรศัพท์ :</label>
                            <label class="form-label col-sm-7"><?= $item['tel'] ?></label>
                        </div>
                        <div class="row">
                            <label class="form-label col-sm-5 text-sm-end fw-bold">ชื่อบิดา-นามสกุล :</label>
                            <label class="form-label col-sm-7"><?= $item['father_firstname'] ?> <?= $item['father_lastname'] ?></label>
                        </div>
                        <div class="row">
                            <label class="form-label col-sm-5 text-sm-end fw-bold">ชื่อมารดา-นามสกุล :</label>
                            <label class="form-label col-sm-7"><?= $item['mother_firstname'] ?> <?= $item['mother_lastname'] ?></label>
                        </div>
                        <hr>
                        <div class="row">
                            <label class="form-label col-sm-5 text-sm-end fw-bold">ภูมิลำเนาเดิม :</label>
                            <label class="form-label col-sm-7"><?= $item['address'] ?></label>
                        </div>
                        <div class="row">
                            <label class="form-label col-sm-5 text-sm-end fw-bold">ที่อยู่ปัจจุบัน/ที่ทำงาน :</label>
                            <label class="form-label col-sm-7"><?= $item['current_address'] ?></label>
                        </div>
                        <hr>
                        <div class="row">
                            <label class="form-label col-sm-5 text-sm-end fw-bold">เข้ามาอยู่วัด :</label>
                            <label class="form-label col-sm-7">
                                <?php if ($item['is_enter'] == 1) {
                                    switch ($item['enter_reason']) {
                                        case "practice":
                                            echo "ปฏิบัติธรรม";
                                            break;
                                        case "ordain":
                                            echo "บรรพชา/อุปสมบท";
                                            break;
                                        case "study":
                                            echo "ศึกษาต่อ";
                                            break;
                                        default:
                                            echo "ไม่มีข้อมูล";
                                    }
                                } else {
                                    echo "ไม่มีข้อมูล";
                                } ?>
                            </label>
                        </div>
                        <div class="row">
                            <label class="form-label col-sm-5 text-sm-end fw-bold">วันที่เข้ามาอยู่วัด :</label>
                            <label class="form-label col-sm-7"><?= ($item['is_enter'] == 1) ? date('d/m/Y', strtotime($item['enter_date'])) : "ไม่มีข้อมูล" ?></label>
                        </div>
                        <div class="row">
                            <label class="form-label col-sm-5 text-sm-end fw-bold">ออกจากวัด :</label>
                            <label class="form-label col-sm-7">
                                <?php if ($item['is_leave'] == 1) {
                                    switch ($item['leave_reason']) {
                                        case "out":
                                            echo "ออก";
                                            break;
                                        case "resign":
                                            echo "ลา";
                                            break;
                                        case "shift":
                                            echo "ย้าย";
                                            break;
                                        default:
                                            echo "ไม่มีข้อมูล";
                                    }
                                } else {
                                    echo "ไม่มีข้อมูล";
                                } ?>
                            </label>
                        </div>
                        <div class="row">
                            <label class="form-label col-sm-5 text-sm-end fw-bold">วันที่ออกจากวัด :</label>
                            <label class="form-label col-sm-7"><?= ($item['is_leave'] == 1) ? date('d/m/Y', strtotime($item['leave_date'])) : "ไม่มีข้อมูล" ?></label>
                        </div>
                        <hr>
                        <div class="row">
                            <label class="form-label col-sm-5 text-sm-end fw-bold">วันที่ (บรรพชา) :</label>
                            <label class="form-label col-sm-7"><?= ($item['is_novice'] == 1) ? date('d/m/Y', strtotime($item['novice_date'])) : "ไม่มีข้อมูล" ?></label>
                        </div>
                        <div class="row">
                            <label class="form-label col-sm-5 text-sm-end fw-bold">ผู้อุปัชฌาย์ (บรรพชา) :</label>
                            <label class="form-label col-sm-7"><?= ($item['is_novice'] == 1) ? $item['novice_patron'] : "ไม่มีข้อมูล" ?></label>
                        </div>
                        <div class="row">
                            <label class="form-label col-sm-5 text-sm-end fw-bold">วัด (บรรพชา) :</label>
                            <label class="form-label col-sm-7"><?= ($item['is_novice'] == 1) ? $item['novice_temple'] : "ไม่มีข้อมูล" ?></label>
                        </div>
                        <div class="row">
                            <label class="form-label col-sm-5 text-sm-end fw-bold">ที่อยู่วัด (บรรพชา) :</label>
                            <label class="form-label col-sm-7"><?= ($item['is_novice'] == 1) ? $item['novice_address'] : "ไม่มีข้อมูล" ?></label>
                        </div>
                        <hr>
                        <div class="row">
                            <label class="form-label col-sm-5 text-sm-end fw-bold">วันที่ (อุปสมบท) :</label>
                            <label class="form-label col-sm-7"><?= ($item['is_monk'] == 1) ? date('d/m/Y', strtotime($item['monk_date']))  : "ไม่มีข้อมูล" ?></label>
                        </div>
                        <div class="row">
                            <label class="form-label col-sm-5 text-sm-end fw-bold">ผู้อุปัชฌาย์ (อุปสมบท) :</label>
                            <label class="form-label col-sm-7"><?= ($item['is_monk'] == 1) ? $item['monk_patron']  : "ไม่มีข้อมูล" ?></label>
                        </div>
                        <div class="row">
                            <label class="form-label col-sm-5 text-sm-end fw-bold">วัด (อุปสมบท) :</label>
                            <label class="form-label col-sm-7"><?= ($item['is_monk'] == 1) ? $item['monk_temple']  : "ไม่มีข้อมูล" ?></label>
                        </div>
                        <div class="row">
                            <label class="form-label col-sm-5 text-sm-end fw-bold">ที่อยู่วัด (อุปสมบท) :</label>
                            <label class="form-label col-sm-7"><?= ($item['is_monk'] == 1) ? $item['monk_address']  : "ไม่มีข้อมูล" ?></label>
                        </div>
                        <hr>
                        <div class="row">
                            <label class="form-label col-sm-5 text-sm-end fw-bold">บันทึก :</label>
                            <label class="form-label col-sm-7"><?= $item['note'] ?></label>
                        </div>
                        <hr>
                        <div class="row">
                            <label class="form-label col-sm-5 text-sm-end fw-bold">ผู้เขียน :</label>
                            <label class="form-label col-sm-7"><?= $item['update_name'] ?></label>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <a href="index.php" class="btn btn-sm btn-outline-secondary"><i class="fas fa-long-arrow-alt-left"></i> กลับ</a>
                </div>
            </div>
        </div>
    </div>
    <?php include_once '../../components/Footer.php' ?>
</body>

</html>