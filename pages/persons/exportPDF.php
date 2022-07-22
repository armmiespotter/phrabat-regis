<?php
include_once '../../libraries/AuthMiddleware.php';
require_once '../../configs/config.php';
require_once '../../libraries/Db.php';
require_once __DIR__ . '../../../vendor/autoload.php';

$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
    'fontDir' => array_merge($fontDirs, [
        __DIR__ . '/tmp',
    ]),
    'fontdata' => $fontData + [
        'th_sarabun_new' => [
            'R' => 'THSarabunNew.ttf',
        ]
    ],
    'default_font' => 'th_sarabun_new'
]);

$personId = $_GET['id'];
$personItems = $mysqli->query("SELECT person.*,user.name AS update_name FROM person LEFT JOIN user ON person.update_by = user.id WHERE person.id = $personId");
$item = $personItems->fetch_assoc();
ob_start();
?>
<img src="../../images/<?= $item['image'] ?>" style="position:absolute;max-height:150px;float:right;">
<div style="position:absolute">
    <h1 class="pdf-subtitle">ทะเบียนประวัติ</h1>
    <p class="ep-pdf">ชื่อ-นามสกุล : <span><?= $item['firstname'] ?> <?= $item['lastname'] ?></span></p>
    <p class="ep-pdf">อายุ : <span><?= $item['age'] ?></span></p>
    <p class="ep-pdf">วุฒิการศีกษา : <span><?= $item['degree'] ?></span></p>
    <p class="ep-pdf">อาชีพ : <span><?= $item['career'] ?></span></p>
    <p class="ep-pdf">เบอร์โทรศัพท์ : <span><?= $item['tel'] ?></span></p>
    <p class="ep-pdf">ชื่อบิดา-นามสกุล : <span><?= $item['father_firstname'] ?> <?= $item['father_lastname'] ?></p>
    <p class="ep-pdf">ชื่อมารดา-นามสกุล : <span><?= $item['mother_firstname'] ?> <?= $item['mother_lastname'] ?></span></p>
    <p class="ep-pdf">ภูมิลำเนาเดิม : <span><?= $item['address'] ?></span></p>
    <p class="ep-pdf">ที่อยู่ปัจจุบัน/ที่ทำงาน : <span><?= $item['current_address'] ?></span></p>
    <hr style="width:90%;text-align:left;">
    <h1 class="pdf-subtitle">เข้า/ออก</h1>
    <p class="ep-pdf">เข้ามาอยู่วัด : <span>
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
        </span></p>
    <p class="ep-pdf">วันที่เข้ามาอยู่วัด : <span><?= ($item['is_enter'] == 1) ? date('d/m/Y', strtotime($item['enter_date'])) : "ไม่มีข้อมูล" ?></span></p>
    <p class="ep-pdf">ออกจากวัด : <span>
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
        </span></p>
    <p class="ep-pdf">วันที่ออกจากวัด : <span><?= ($item['is_leave'] == 1) ? date('d/m/Y', strtotime($item['leave_date'])) : "ไม่มีข้อมูล" ?></span></p>
    <hr style="width:90%;text-align:left;">
    <h1 class="pdf-subtitle">บรรพชา</h1>
    <p class="ep-pdf">วันที่ (บรรพชา) : <span><?= ($item['is_novice'] == 1) ? date('d/m/Y', strtotime($item['novice_date'])) : "ไม่มีข้อมูล" ?></span></p>
    <p class="ep-pdf">ผู้อุปัชฌาย์ (บรรพชา) : <span><?= ($item['is_novice'] == 1) ? $item['novice_patron'] : "ไม่มีข้อมูล" ?></span></p>
    <p class="ep-pdf">วัด (บรรพชา) : <span><?= ($item['is_novice'] == 1) ? $item['novice_temple'] : "ไม่มีข้อมูล" ?></span></p>
    <p class="ep-pdf">ที่อยู่วัด (บรรพชา) : <span><?= ($item['is_novice'] == 1) ? $item['novice_address'] : "ไม่มีข้อมูล" ?></span></p>
    <hr style="width:90%;text-align:left;">
    <h1 class="pdf-subtitle">อุปสมบท</h1>
    <p class="ep-pdf">วันที่ (อุปสมบท) : <span><?= ($item['is_monk'] == 1) ? date('d/m/Y', strtotime($item['monk_date']))  : "ไม่มีข้อมูล" ?></span></p>
    <p class="ep-pdf">ผู้อุปัชฌาย์ (อุปสมบท) : <span><?= ($item['is_monk'] == 1) ? $item['monk_patron']  : "ไม่มีข้อมูล" ?></span></p>
    <p class="ep-pdf">วัด (อุปสมบท) : <span><?= ($item['is_monk'] == 1) ? $item['monk_temple']  : "ไม่มีข้อมูล" ?></span></p>
    <p class="ep-pdf">ที่อยู่วัด (อุปสมบท) : <span><?= ($item['is_monk'] == 1) ? $item['monk_address']  : "ไม่มีข้อมูล" ?></span></p>
    <hr style="width:90%;text-align:left;">
    <h1 class="pdf-subtitle">บันทึก</h1>
    <p class="ep-pdf">บันทึก : <span><?= $item['note'] ?></span></p>
</div>
<?php
$html = ob_get_contents();
ob_end_clean();
$stylesheet = file_get_contents('../../assets/css/app.css');
$mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);
$mpdf->Output();
?>