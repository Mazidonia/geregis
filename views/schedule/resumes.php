<?php
foreach ($this->chooselimit as $value) {
    $choose = $value['sub_id'];
}
?>

    <div class="section-body  no-margin">
        <div class="row">
            <div class="col-lg-12">
                <h2>
                    <span class="text-primary">
                        <i class="fa fa-line-chart"></i>
                    </span>
                    <span class="text-primary">ผลการตรวจสอบ ภาคการศึกษา 2/2561 </span>
                    <span class="text-danger">เลือกได้
                        <?= $choose ?> รายวิชา</span>
                </h2>
            </div>
            <!--end .col -->
            <div class="col-lg-12">
                <div class="card card-underline">
                    <div class="card-head">
                        <ul class="nav nav-tabs" data-toggle="tabs">
                            <li class="active">
                                <a href="#learned">รายวิชาที่เรียนแล้ว</a>
                            </li>
                            <li>
                                <a href="#plans">แนวทางการเลือก</a>
                            </li>
                        </ul>
                    </div>
                    <!--end .card-head -->
                    <div class="card-body tab-content">
                        <div class="tab-pane active" id="learned">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr align="center" class="success">
                                            <th>รหัสวิชา</th>
                                            <th>ชื่อวิชา</th>
                                            <th>ภาคการศึกษา</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($this->learned as $value) {
    if ($value['term']=='2/2561') {
        ?>
                                        <tr class="info">
                                            <td>
                                                <?= $value['sub_id'] ?>
                                            </td>
                                            <td>
                                                <?= $value['sub_text'] ?>
                                            </td>
                                            <td>
                                                <?= $value['term'] ?>
                                            </td>
                                        </tr>

                                        <?php
    } else {
        ?>

                                        <tr>
                                            <td>
                                                <?= $value['sub_id'] ?>
                                            </td>
                                            <td>
                                                <?= $value['sub_text'] ?>
                                            </td>
                                            <td>
                                                <?= $value['term'] ?>
                                            </td>
                                        </tr>
                                        <?php
    }
} ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="plans">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr align="center" class="success">
                                            <th>กลุ่มวิชา</th>
                                            <th>จำนวนหน่วยกิตที่ต้องเรียน (หน่วยกิต)</th>
                                            <th>เรียนแล้ว (หน่วยกิต)</th>
                                            <th>คงเหลือ (หน่วยกิต)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($this->msg as $value) {
    ?>
                                        <tr>
                                            <td>GELA (กลุ่มวิชาภาษา)</td>
                                            <td>9</td>
                                            <td>
                                                <?= $value['GELA'] ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if (9 - $value['GELA'] <= 0) {
                                                        echo"<i class='fa fa-check fa-2x'></i>";
                                                    } else {
                                                        ?>
                                                    <span class="text-danger text-lg">
                                                        <a href="<?=URL?>ge">
                                                            <?=9-$value['GELA']?>
                                                        </a>
                                                    </span>
                                                    <?php
                                                    } ?>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>GEHU (กลุ่มวิชามนุษยศาสตร์)</td>
                                            <td>6</td>
                                            <td>
                                                <?= $value['GEHU'] ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if (6 - $value['GEHU'] <= 0) {
                                                        echo"<i class='fa fa-check fa-2x'></i>";
                                                    } else {
                                                        ?>
                                                    <span class="text-danger text-lg">
                                                        <a href="<?=URL?>ge">
                                                            <?=6-$value['GEHU']?>
                                                        </a>
                                                    </span>
                                                    <?php
                                                    } ?>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>GESO (กลุ่มวิชาสังคมศาสตร์)</td>
                                            <td>6</td>
                                            <td>
                                                <?= $value['GESO'] ?>
                                            </td>
                                            <td>
                                                <?php
                                                if (6 - $value['GESO'] <= 0) {
                                                    echo"<i class='fa fa-check fa-2x'></i>";
                                                } else {
                                                    ?>
                                                    <span class="text-danger text-lg">
                                                        <a href="<?=URL?>ge">
                                                            <?=6-$value['GESO']?>
                                                        </a>
                                                    </span>
                                                    <?php
                                                } ?>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>GESC (กลุ่มวิชาวิทยาศาสตร์กับคณิตศาสตร์)</td>
                                            <td>9</td>
                                            <td>
                                                <?= $value['GESC'] ?>
                                            </td>
                                            <td>
                                                <?php
                                            if (9 - $value['GESC'] <= 0) {
                                                echo"<i class='fa fa-check fa-2x'></i>";
                                            } else {
                                                ?>
                                                    <span class="text-danger text-lg">
                                                        <a href="<?=URL?>ge">
                                                            <?=9-$value['GESC']?>
                                                        </a>
                                                    </span>
                                                    <?php
                                            } ?>
                                            </td>

                                        </tr>
                                        <?php
} ?>
                                    </tbody>
                                </table>

                            </div>
                            <em class="text-caption">
                                <span class="text-danger">*หมายเหตุ</span>
                                <i class='fa fa-check fa-2x'></i>
                                <span class="text-danger">เรียนครบตามโครงสร้างรายวิชาศึกษาทั่วไปแล้ว</span>
                            </em>
                        </div>

                    </div>

                </div>


            </div>
        </div>
    </div>