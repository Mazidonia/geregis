<div class="section-body no-margin">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-primary">
                <i class="fa fa-list"></i> รายวิชา GE ที่เปิดสอน</h2>
        </div>
        <!--end .col -->

    </div>
    <!--end .col -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-head">
                <ul class="nav nav-tabs pull-left" data-toggle="tabs">
                    <li class="active">
                        <a href="#GELA"> กลุ่ม GELA </a>
                    </li>
                    <li>
                        <a href="#GEHU"> กลุ่ม GEHU </a>
                    </li>
                    <li>
                        <a href="#GESO"> กลุ่ม GESO </a>
                    </li>
                    <li>
                        <a href="#GESC"> กลุ่ม GESC </a>
                    </li>
                </ul>

            </div>
            <div class="card-body tab-content">
                <div class="tab-pane active" id="GELA">
                    <div class="table-responsive">
                        <table class="table table-striped no-margin">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>รหัสวิชา</th>
                                    <th>ชื่อวิชา</th>
                                    <th>วัน</th>
                                    <th>คาบ</th>
                                    <th>sec</th>
                                    <th>หมู่เรียน</th>
                                    <th>อาจารย์ผู้สอน</th>
                                    <th>จำนวนที่นั่ง</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                        $student_ID = $_SESSION['user_id'];
                                        $igela = 1;
                                        if (!empty($this->gela)) {
                                            foreach ($this->gela as $value) {
                                                $chktime = chk_student($student_ID, $value['day_teach'], '2/2561', $value['startblock'], $value['endblock']);
                                                $learned = chk_student_learned($student_ID, $value['sub_id']); ?>
                                    <tr <?php if ($learned==1) {
                                                    ?>class="info"
                                        <?php
                                                } else {
                                                    if ($chktime > 0) {
                                                        ?> class="danger"
                                            <?php
                                                    }
                                                } ?>>
                                                <td>
                                                    <?= $igela ?>
                                                </td>
                                                <td>
                                                    <?= $value['sub_id'] ?>
                                                </td>
                                                <td>
                                                    <?= $value['sub_text'] ?>
                                                </td>
                                                <td>
                                                    <?= $value['d'] ?>
                                                </td>
                                                <td>
                                                    <?= $value['blocks'] ?>
                                                </td>
                                                <td>
                                                    <?= $value['section'] ?>
                                                </td>
                                                <td>
                                                    <?= $value['sec_stu'] ?>
                                                </td>
                                                <td>
                                                    <?= $value['tea_Name'] ?>
                                                </td>
                                                <td>
                                                    <?php if ($value['cou_now'] >= 40) {
                                                    ?>
                                                    <span class="text-danger">
                                                        <?= $value['cou_now'] ?>
                                                    </span>
                                                    <?php
                                                } else {
                                                    ?>
                                                        <span>
                                                            <?= $value['cou_now'] ?>
                                                        </span>
                                                        <?php
                                                } ?>
                                                </td>

                                    </tr>
                                    <?php  $igela++;
                                            }
                                        } else {
                                            ?>
                                    <tr>
                                        <td colspan="9" class="text-center">
                                            ไม่พบข้อมูล
                                        </td>
                                    </tr>


                                    <?php
                                        }?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="GEHU">
                    <div class="table-responsive">
                        <table class="table table-striped no-margin">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>รหัสวิชา</th>
                                    <th>ชื่อวิชา</th>
                                    <th>วัน</th>
                                    <th>คาบ</th>
                                    <th>sec</th>
                                    <th>หมู่เรียน</th>
                                    <th>อาจารย์ผู้สอน</th>
                                    <th>จำนวนที่นั่ง</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                        $igehu = 1;
                                        if (!empty($this->gehu)) {
                                            foreach ($this->gehu as $value) {
                                                $chktime = chk_student($student_ID, $value['day_teach'], '2/2561', $value['startblock'], $value['endblock']);
                                                $learned = chk_student_learned($student_ID, $value['sub_id']); ?>
                                    <tr <?php if ($learned==1) {
                                                    ?>class="info"
                                        <?php
                                                } else {
                                                    if ($chktime > 0) {
                                                        ?> class="danger"
                                            <?php
                                                    }
                                                } ?>>
                                                <td>
                                                    <?= $igehu ?>
                                                </td>
                                                <td>
                                                    <?= $value['sub_id'] ?>
                                                </td>
                                                <td>
                                                    <?= $value['sub_text'] ?>
                                                </td>
                                                <td>
                                                    <?= $value['d'] ?>
                                                </td>
                                                <td>
                                                    <?= $value['blocks'] ?>
                                                </td>
                                                <td>
                                                    <?= $value['section'] ?>
                                                </td>
                                                <td>
                                                    <?= $value['sec_stu'] ?>
                                                </td>
                                                <td>
                                                    <?= $value['tea_Name'] ?>
                                                </td>
                                                <td>
                                                    <?php if ($value['cou_now'] >= 40) {
                                                    ?>
                                                    <span class="text-danger">
                                                        <?= $value['cou_now'] ?>
                                                    </span>
                                                    <?php
                                                } else {
                                                    ?>
                                                        <span>
                                                            <?= $value['cou_now'] ?>
                                                        </span>
                                                        <?php
                                                } ?>
                                                </td>
                                    </tr>
                                    <?php $igehu++;
                                            }
                                        } else {
                                            ?>
                                    <tr>
                                        <td colspan="9" class="text-center">
                                            ไม่พบข้อมูล
                                        </td>
                                    </tr>


                                    <?php
                                        }?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="GESO">
                    <div class="table-responsive">
                        <table class="table table-striped no-margin">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>รหัสวิชา</th>
                                    <th>ชื่อวิชา</th>
                                    <th>วัน</th>
                                    <th>คาบ</th>
                                    <th>sec</th>
                                    <th>หมู่เรียน</th>
                                    <th>อาจารย์ผู้สอน</th>
                                    <th>จำนวนที่นั่ง</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                        $igeso = 1;
                                        if (!empty($this->geso)) {
                                            foreach ($this->geso as $value) {
                                                $chktime = chk_student($student_ID, $value['day_teach'], '2/2561', $value['startblock'], $value['endblock']);
                                                $learned = chk_student_learned($student_ID, $value['sub_id']); ?>
                                    <tr <?php if ($learned==1) {
                                                    ?>class="info"
                                        <?php
                                                } else {
                                                    if ($chktime > 0) {
                                                        ?> class="danger"
                                            <?php
                                                    }
                                                } ?>>
                                                <td>
                                                    <?= $igeso ?>
                                                </td>
                                                <td>
                                                    <?= $value['sub_id'] ?>
                                                </td>
                                                <td>
                                                    <?= $value['sub_text'] ?>
                                                </td>
                                                <td>
                                                    <?= $value['d'] ?>
                                                </td>
                                                <td>
                                                    <?= $value['blocks'] ?>
                                                </td>
                                                <td>
                                                    <?= $value['section'] ?>
                                                </td>
                                                <td>
                                                    <?= $value['sec_stu'] ?>
                                                </td>
                                                <td>
                                                    <?= $value['tea_Name'] ?>
                                                </td>
                                                <td>
                                                    <?php if ($value['cou_now'] >= 40) {
                                                    ?>
                                                    <span class="text-danger">
                                                        <?= $value['cou_now'] ?>
                                                    </span>
                                                    <?php
                                                } else {
                                                    ?>
                                                        <span>
                                                            <?= $value['cou_now'] ?>
                                                        </span>
                                                        <?php
                                                } ?>
                                                </td>
                                    </tr>
                                    <?php $igeso++;
                                            }
                                        } else {
                                            ?>
                                    <tr>
                                        <td colspan="9" class="text-center">
                                            ไม่พบข้อมูล
                                        </td>
                                    </tr>


                                    <?php
                                        } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="GESC">
                    <div class="table-responsive">
                        <table class="table table-striped no-margin">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>รหัสวิชา</th>
                                    <th>ชื่อวิชา</th>
                                    <th>วัน</th>
                                    <th>คาบ</th>
                                    <th>sec</th>
                                    <th>หมู่เรียน</th>
                                    <th>อาจารย์ผู้สอน</th>
                                    <th>จำนวนที่นั่ง</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                        $igesc = 1;
                                        if (!empty($this->gesc)) {
                                            foreach ($this->gesc as $value) {
                                                $chktime = chk_student($student_ID, $value['day_teach'], '2/2561', $value['startblock'], $value['endblock']);
                                                $learned = chk_student_learned($student_ID, $value['sub_id']); ?>
                                    <tr <?php if ($learned==1) {
                                                    ?>class="info"
                                        <?php
                                                } else {
                                                    if ($chktime > 0) {
                                                        ?> class="danger"
                                            <?php
                                                    }
                                                } ?>>
                                                <td>
                                                    <?= $igesc ?>
                                                </td>
                                                <td>
                                                    <?= $value['sub_id'] ?>
                                                </td>
                                                <td>
                                                    <?= $value['sub_text'] ?>
                                                </td>
                                                <td>
                                                    <?= $value['d'] ?>
                                                </td>
                                                <td>
                                                    <?= $value['blocks'] ?>
                                                </td>
                                                <td>
                                                    <?= $value['section'] ?>
                                                </td>
                                                <td>
                                                    <?= $value['sec_stu'] ?>
                                                </td>
                                                <td>
                                                    <?= $value['tea_Name'] ?>
                                                </td>
                                                <td>
                                                    <?php if ($value['cou_now'] >= 40) {
                                                    ?>
                                                    <span class="text-danger">
                                                        <?= $value['cou_now'] ?>
                                                    </span>
                                                    <?php
                                                } else {
                                                    ?>
                                                        <span>
                                                            <?= $value['cou_now'] ?>
                                                        </span>
                                                        <?php
                                                } ?>
                                                </td>
                                    </tr>
                                    <?php $igesc++;
                                            }
                                        } else {
                                            ?>
                                    <tr>
                                        <td colspan="9" class="text-center">
                                            ไม่พบข้อมูล
                                        </td>
                                    </tr>


                                    <?php
                                        }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>