<div class="section-body no-margin">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-primary">
                <i class="fa fa-table"></i> ตารางเรียน ภาคการศึกษา 2/2561</h4>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered">
                            <thead>
                                <tr align="center">
                                    <th>วัน/คาบ</th>
                                    <th>1</br>(8.00-9.00)</th>
                                    <th>2</br>(9.00-10.00)</th>
                                    <th>3</br>(10.00-11.00)</th>
                                    <th>4</br>(11.00-12.00)</th>
                                    <th>พักเที่ยง</br>(12.00-13.00)</th>
                                    <th>5</br>(13.00-14.00)</th>
                                    <th>6</br>(14.00-15.00)</th>
                                    <th>7</br>(15.00-16.00)</th>
                                    <th>8</br>(16.00-17.00)</th>
                                    <th>9</br>(17.00-18.00)</th>
                                    <th>10</br>(18.00-19.00)</th>
                                    <th>11</br>(19.00-20.00)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $student_ID = base64_decode($_SESSION['user_id']);
                                for ($i = 1; $i <= 5; $i++) {
                                    ?>
                                <tr align="center">
                                    <td>
                                        <?php
                                            if ($i == 1) {
                                                echo "จันทร์";
                                            } elseif ($i == 2) {
                                                echo "อังคาร";
                                            } elseif ($i == 3) {
                                                echo "พุธ";
                                            } elseif ($i == 4) {
                                                echo "พฤหัสบดี";
                                            } elseif ($i == 5) {
                                                echo "ศุกร์";
                                            } elseif ($i == 6) {
                                                echo "เสาร์";
                                            } else {
                                                echo "อาทิตย์";
                                            } ?>
                                    </td>

                                    <?php
                                        for ($r = 1; $r <= 4; $r++) {
                                            $col = 1;
                                            if ($r <= 4) {
                                                $data = (chk_student_only($student_ID, $i, '2/2561', $r));
                                                for ($k = $r + 1; $k <= 4; $k++) {
                                                    $data_chk = (chk_student_only($student_ID, $i, '2/2561', $k));
                                                    if ($data[sub_id] == $data_chk[sub_id]) {
                                                        $col++;
                                                    } else {
                                                        $k += 12;
                                                        //reset คาบ
                                                    }
                                                }
                                            } ?>

                                    <?php
                                            if (count($data) == 0) { //เช็คหมู่เรียน เช็คห้อง เช็คอาจารย์ผู้สอน ว่างตรงกันไหม
                                                ?>
                                    <td class="success" colspan="<?= $col ?>">
                                        </br>
                                        </br>
                                        </br>
                                    </td>
                                    <?php
                                            } else {
                                                ?>
                                    <td class="danger" colspan="<?= $col ?>">
                                        <?php
                                                   // $teaname = chk_tea($data[t_no]);
                                                    //print_r(chk_tea($data[t_no]));

                                                     foreach (chk_tea($data[t_no]) as $value) {
                                                         echo $value[Tnames] . "</br>";
                                                     }
                                                //echo $data[t_no] . "</br>";
                                                echo "วิชา " . $data[sub_id] . "</br>ห้อง ";
                                                echo $data[r_no];
                                                unset($data); ?>
                                    </td>
                                    <?php
                                            }
                                            $step_add = $col - 1;
                                            $r += $step_add;
                                        } ?>
                                    <td class="info"> พักเที่ยง</td>
                                    <?php
                                        $detail = "";
                                    for ($r = 6; $r <= 12; $r++) {
                                        $col = 1;
                                        if ($i == 3 && $r >= 6) {
                                            $col += 6;
                                            $cla = "info";
                                            $detail = "พบอาจารย์ที่ปรึกษาและกิจกรรมนักศึกษา</br></br></br>";
                                        } elseif ($r >= 6) {
                                            $cla = "success";
                                            $data = (chk_student_only($student_ID, $i, '2/2561', $r - 1));
                                            for ($k = $r; $k <= 13; $k++) {
                                                $data_chk = (chk_student_only($student_ID, $i, '2/2561', $k));
                                                if ($data[sub_id] == $data_chk[sub_id]) {
                                                    $col++;
                                                } else {
                                                    $k += 12;
                                                    //reset คาบ
                                                }
                                            }
                                        }
                                        if (count($data) == 0) {
                                            ?>
                                    <td class="<?= $cla ?>" colspan="<?= $col ?>">
                                        <?= $detail ?>
                                    </td>
                                    <?php
                                        } else {
                                            ?>
                                    <td class="danger" colspan="<?= $col ?>">
                                        <?php
                                                    foreach (chk_tea($data[t_no]) as $value) {
                                                        echo $value[Tnames] . "</br>";
                                                    }
                                            echo "วิชา " . $data[sub_id] . "</br>ห้อง ";
                                            echo $data[r_no];
                                            unset($data); ?>
                                    </td>
                                    <?php
                                        }
                                        $step_add = $col - 1;
                                        $r += $step_add;
                                    } ?>
                                </tr>
                                <?php
                                } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>