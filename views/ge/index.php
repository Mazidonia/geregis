<?php
foreach ($this->resumes as $value) {
    $chk_GELA = $value['GELA'];
    $chk_GEHU = $value['GEHU'];
    $chk_GESO = $value['GESO'];
    $chk_GESC = $value['GESC'];
}
?>

    <div class="section-body no-margin">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-primary"><i class="fa fa-hand-o-right"></i> รายวิชา GE ที่เปิดสอน</h2>
            </div><!--end .col -->


            <div class="col-lg-12">
                <div class="card">
                    <div class="card-head">
                        <ul class="nav nav-tabs pull-left" data-toggle="tabs">
                            <li class="active"><a href="#GELA"> กลุ่ม GELA  </a></li>
                            <li><a href="#GEHU"> กลุ่ม GEHU  </a></li>
                            <li><a href="#GESO"> กลุ่ม GESO  </a></li>
                            <li><a href="#GESC"> กลุ่ม GESC  </a></li>
                        </ul>

                    </div>
                    <div class="card-body tab-content">
                        <div class="tab-pane active" id="GELA">
                            <div class="table-responsive">
                                <table class="table no-margin">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>รหัสวิชา</th>
                                            <th>ชื่อวิชา</th>
                                            <th>วัน</th>
                                            <th>คาบ</th>
                                            <th>วัน เวลาสอบ</th>
                                            <th>sec</th>
                                            <th>หมู่เรียน</th>
                                            <th>อาจารย์ผู้สอน</th>
                                            <th>จำนวน</br>ผู้ลงทะเบียน</th>
                                            <th class="text-right">ลงทะเบียน</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $student_ID = base64_decode($_SESSION['user_id']);
                                        $igela = 1;
                                       if($chk_GELA <= 0){?>
                                     <div class="alert alert-danger" role="alert">
					<i class='fa fa-check fa-2x'></i> <strong>กลุ่มนี้เรียนครบแล้วครับ</strong> ไม่สามารถลงทะเบียนในกลุ่มรายวิชานี้ได้.
                                        </div>
                                        
                                      <?php  
                                      if (!empty($this->gela)) {
                                          foreach ($this->gela as $value) {
                                              ?>
                                         <tr class="success">
                                                <td><?= $igela ?></td>
                                                <td><?= $value['sub_id'] ?></td>
                                                <td><?= $value['sub_text'] ?></td>
                                                <td><?= $value['d'] ?></td>
                                                <td><?= $value['blocks'] ?></td>
                                                <td><?= $value['date_test'] ?></br><?= $value['time_test'] ?></td>
                                                <td><?= $value['section'] ?></td>
                                                <td><?= $value['sec_stu'] ?></td>
                                                <td><?= $value['tea_Name'] ?></td>
                                                <td><h4><?= $value['cou_now'] ?></td>
                                                <td class="text-right">
                                                  <button type="button" class="btn ink-reaction btn-floating-action btn-sm btn-primary disabled"><i class="fa fa-pencil"></i></button>
                                                </td>
                                        </tr>
                                           <?php $igela++;
                                          }
                                      }else{?>

                                        <div class="alert alert-warning" role="alert">
                                                 <strong>กลุ่มนี้ไม่มีข้อมูล การเปิดรายวิชา</strong>
                                        </div>
                                        <?php     }
                                    } else{
                                        if (!empty($this->gela)) {
                                            foreach ($this->gela as $value) {
                                                $chktime = chk_student($student_ID, $value['day_teach'], '2/2561', $value['startblock'], $value['endblock']);
                                                $learned = chk_student_learned($student_ID, $value['sub_id']);
                                                $chk_date_test = chk_date_test($value['date_test'], $value['time_id']); ?>
                                        <tr <?php if ($learned == 1) {
                                                    ?>class="info" <?php
                                                } else {
                                                    if ($chktime>0) {
                                                        ?> class="danger"<?php
                                                    } elseif ($chk_date_test > 0) {
                                                        ?> class="warning"<?php
                                                    }
                                                } ?>>
                                                <td><?= $igela ?></td>
                                                <td><?= $value['sub_id'] ?></td>
                                                <td><?= $value['sub_text'] ?></td>
                                                <td><?= $value['d'] ?></td>
                                                <td><?= $value['blocks'] ?></td>
                                                <td><?= $value['date_test'] ?></br><?= $value['time_test'] ?></td>
                                                <td><?= $value['section'] ?></td>
                                                <td><?= $value['sec_stu'] ?></td>
                                                <td><?= $value['tea_Name'] ?></td>
                                                <td>
                                                    <?php if ($value['cou_now'] >= $value['limits']) {
                                                    ?> <h4 class="text-danger"><?= $value['cou_now'] ?></h> <?php
                                                } else {
                                                    ?> <h4><?= $value['cou_now'] ?></h> <?php
                                                } ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php if ($learned == 1 || $chk_date_test > 0) {
                                                    ?>
                                                    <button type="button" class="btn ink-reaction btn-floating-action btn-sm btn-primary disabled"><i class="fa fa-pencil"></i></button>
                                                     <?php
                                                } else {
                                                    if ($chktime == 0 && $value['cou_now'] < $value['limits']) {
                                                        ?>
<button type="button" class="btn ink-reaction btn-floating-action btn-sm btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="<?= $value['sub_id'] ?> sec <?= $value['section'] ?>" onclick="geregis('<?= $value['sub_id'] ?>','<?= $value['sub_text'] ?>','<?= $value['section'] ?>','<?= $value['startblock'] ?>','<?= $value['endblock'] ?>','<?= $value['t_no'] ?>','<?= $value['day_teach'] ?>','<?= isset($value['date_test']) ? $value['date_test'] : 'null'?>','<?= $value['time_id'] ?>');"><i class="fa fa-pencil"></i></button>
                                                                    <?php
                                                    } else {
                                                        ?>
                                                                        <button type="button" class="btn ink-reaction btn-floating-action btn-sm btn-primary disabled"><i class="fa fa-pencil"></i></button>
                                                                        <?php
                                                    }
                                                } ?>
                                                </td>
                                        </tr>
                                          <?php  $igela++;
                                            }
                                        }else{?>

                                    <div class="alert alert-warning" role="alert">
                                             <strong>กลุ่มนี้ไม่มีข้อมูล การเปิดรายวิชา</strong>
                                    </div>
                                    <?php     }
                                        
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="GEHU">
                            <div class="table-responsive">
                                <table class="table no-margin">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>รหัสวิชา</th>
                                            <th>ชื่อวิชา</th>
                                            <th>วัน</th>
                                            <th>คาบ</th>
                                            <th>วัน เวลาสอบ</th>
                                            <th>sec</th>
                                            <th>หมู่เรียน</th>
                                            <th>อาจารย์ผู้สอน</th>
                                            <th>จำนวน</br>ผู้ลงทะเบียน</th>
                                            <th class="text-right">ลงทะเบียน</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $igehu = 1;
                                       if($chk_GEHU<=0){?>
                                        <div class="alert alert-danger" role="alert">
					<i class='fa fa-check fa-2x'></i> <strong>กลุ่มนี้เรียนครบแล้วครับ</strong> ไม่สามารถลงทะเบียนในกลุ่มรายวิชานี้ได้.
                                        </div>
                                        
                                      <?php  
                                      
                                      if (!empty($this->gehu)) {
                                          foreach ($this->gehu as $value) {
                                              ?>
                                        <tr class="success">
                                                <td><?= $igehu ?></td>
                                                <td><?= $value['sub_id'] ?></td>
                                                <td><?= $value['sub_text'] ?></td>
                                                <td><?= $value['d'] ?></td>
                                                <td><?= $value['blocks'] ?></td>
                                                <td><?= $value['date_test'] ?></br><?= $value['time_test'] ?></td>
                                                <td><?= $value['section'] ?></td>
                                                <td><?= $value['sec_stu'] ?></td>
                                                <td><?= $value['tea_Name'] ?></td>
                                                <td><h4><?= $value['cou_now'] ?></td>
                                                <td class="text-right">
                                                  <button type="button" class="btn ink-reaction btn-floating-action btn-sm btn-primary disabled"><i class="fa fa-pencil"></i></button>
                                                </td>
                                        </tr>
                                           <?php $igehu++;
                                          }
                                      }else{?>

                                        <div class="alert alert-warning" role="alert">
                                                 <strong>กลุ่มนี้ไม่มีข้อมูล การเปิดรายวิชา</strong>
                                        </div>
                                        <?php     }
                                                                            
                                        
                                        
                                        
                                        } else{

                                            if (!empty($this->gehu)) {
                                foreach ($this->gehu as $value) {
                                            $chktime = chk_student($student_ID, $value['day_teach'], '2/2561', $value['startblock'], $value['endblock']);
                                            $learned = chk_student_learned($student_ID, $value['sub_id']);
                                            $chk_date_test = chk_date_test($value['date_test'], $value['time_id']);
                                               ?>
                                            <tr <?php if ($learned == 1) { ?>class="info" <?php
                                            } else { if($chktime>0){ ?> class="danger"<?php }else if ($chk_date_test > 0) {?> class="warning"<?php }  }?>>
                                                <td><?= $igehu ?></td>
                                                <td><?= $value['sub_id'] ?></td>
                                                <td><?= $value['sub_text'] ?></td>
                                                <td><?= $value['d'] ?></td>
                                                <td><?= $value['blocks'] ?></td>
                                                <td><?= $value['date_test'] ?></br><?= $value['time_test'] ?></td>
                                                <td><?= $value['section'] ?></td>
                                                <td><?= $value['sec_stu'] ?></td>
                                                <td><?= $value['tea_Name'] ?></td>
                                                <td>
                                                    <?php if ($value['cou_now'] >= $value['limits']) { ?> <h4 class="text-danger"><?= $value['cou_now'] ?></h> <?php } else { ?> <h4><?= $value['cou_now'] ?></h> <?php }?>
                                                </td>
                                                <td class="text-right">
                                                    <?php if ($learned == 1 || $chk_date_test > 0) { ?>
                                                            <button type="button" class="btn ink-reaction btn-floating-action btn-sm btn-primary disabled"><i class="fa fa-pencil"></i></button>
                                                     <?php } else {
                                                                    if ($chktime == 0 && $value['cou_now'] < $value['limits']) {
                                                                        ?>
                                                                        <button type="button" class="btn ink-reaction btn-floating-action btn-sm btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="<?= $value['sub_id'] ?> sec <?= $value['section'] ?>" onclick="geregis('<?= $value['sub_id'] ?>','<?= $value['sub_text'] ?>','<?= $value['section'] ?>','<?= $value['startblock'] ?>','<?= $value['endblock'] ?>','<?= $value['t_no'] ?>','<?= $value['day_teach'] ?>','<?= isset($value['date_test']) ? $value['date_test'] : 'null'?>','<?= $value['time_id'] ?>');"><i class="fa fa-pencil"></i></button>
                                                                    <?php } else { ?>

                                                                        <button type="button" class="btn ink-reaction btn-floating-action btn-sm btn-primary disabled"><i class="fa fa-pencil"></i></button>

                                                    <?php } } ?>
                                                </td>
                                            </tr>
                                          <?php $igehu++; } 
                                        
                                    }else{?>

                                        <div class="alert alert-warning" role="alert">
                                                 <strong>กลุ่มนี้ไม่มีข้อมูล การเปิดรายวิชา</strong>
                                        </div>
                                        <?php     }
                                        
                                        
                                        
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="GESO">
                            <div class="table-responsive">
                                <table class="table no-margin">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>รหัสวิชา</th>
                                            <th>ชื่อวิชา</th>
                                            <th>วัน</th>
                                            <th>คาบ</th>
                                            <th>วัน เวลาสอบ</th>
                                            <th>sec</th>
                                            <th>หมู่เรียน</th>
                                            <th>อาจารย์ผู้สอน</th>
                                            <th>จำนวน</br>ผู้ลงทะเบียน</th>
                                            <th class="text-right">ลงทะเบียน</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $igeso = 1;
                                       if($chk_GESO<=0){?>
                                        <div class="alert alert-danger" role="alert">
					<i class='fa fa-check fa-2x'></i> <strong>กลุ่มนี้เรียนครบแล้วครับ</strong> ไม่สามารถลงทะเบียนในกลุ่มรายวิชานี้ได้.
                                        </div>
                                      <?php  
                                      if (!empty($this->geso)) {
                                      
                                      foreach ($this->geso as $value) {?>
                                        <tr class="success">
                                                <td><?= $igehu ?></td>
                                                <td><?= $value['sub_id'] ?></td>
                                                <td><?= $value['sub_text'] ?></td>
                                                <td><?= $value['d'] ?></td>
                                                <td><?= $value['blocks'] ?></td>
                                                <td><?= $value['date_test'] ?></br><?= $value['time_test'] ?></td>
                                                <td><?= $value['section'] ?></td>
                                                <td><?= $value['sec_stu'] ?></td>
                                                <td><?= $value['tea_Name'] ?></td>
                                                <td><h4><?= $value['cou_now'] ?></td>
                                                <td class="text-right">
                                                  <button type="button" class="btn ink-reaction btn-floating-action btn-sm btn-primary disabled"><i class="fa fa-pencil"></i></button>
                                                </td>
                                        </tr>
                                           <?php $igeso++; } 
                                           }else{?>

                                            <div class="alert alert-warning" role="alert">
                                                     <strong>กลุ่มนี้ไม่มีข้อมูล การเปิดรายวิชา</strong>
                                            </div>
                                            <?php     }
                                        
                                        
                                        
                                        
                                        } else{

                                            if (!empty($this->geso)) {           
                                foreach ($this->geso as $value) {
                                            $chktime = chk_student($student_ID, $value['day_teach'], '2/2561', $value['startblock'], $value['endblock']);
                                            $learned = chk_student_learned($student_ID, $value['sub_id']);
                                            $chk_date_test = chk_date_test($value['date_test'], $value['time_id']);
                                               ?>
                                            <tr <?php if ($learned == 1) { ?>class="info" <?php
                                            } else { if($chktime>0){ ?> class="danger"<?php }else if ($chk_date_test > 0) {?> class="warning"<?php }  }?>>
                                                <td><?= $igeso ?></td>
                                                <td><?= $value['sub_id'] ?></td>
                                                <td><?= $value['sub_text'] ?></td>
                                                <td><?= $value['d'] ?></td>
                                                <td><?= $value['blocks'] ?></td>
                                                <td><?= $value['date_test'] ?></br><?= $value['time_test'] ?></td>
                                                <td><?= $value['section'] ?></td>
                                                <td><?= $value['sec_stu'] ?></td>
                                                <td><?= $value['tea_Name'] ?></td>
                                                <td>
                                                    <?php if ($value['cou_now'] >= $value['limits']) { ?> <h4 class="text-danger"><?= $value['cou_now'] ?></h> <?php } else { ?> <h4><?= $value['cou_now'] ?></h> <?php }?>
                                                </td>
                                                <td class="text-right">
                                                      <?php if ($learned == 1 || $chk_date_test > 0) { ?>
                                                   <button type="button" class="btn ink-reaction btn-floating-action btn-sm btn-primary disabled"><i class="fa fa-pencil"></i></button>
                                                     <?php } else {
                                                                    if ($chktime == 0 && $value['cou_now'] < $value['limits']) {
                                                                        ?>
                                                                        <button type="button" class="btn ink-reaction btn-floating-action btn-sm btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="<?= $value['sub_id'] ?> sec <?= $value['section'] ?>" onclick="geregis('<?= $value['sub_id'] ?>','<?= $value['sub_text'] ?>','<?= $value['section'] ?>','<?= $value['startblock'] ?>','<?= $value['endblock'] ?>','<?= $value['t_no'] ?>','<?= $value['day_teach'] ?>','<?= isset($value['date_test']) ? $value['date_test'] : 'null'?>','<?= $value['time_id'] ?>');"><i class="fa fa-pencil"></i></button>
                                                                    <?php } else { ?>

                                                                       <button type="button" class="btn ink-reaction btn-floating-action btn-sm btn-primary disabled"><i class="fa fa-pencil"></i></button>

                                                    <?php } } ?>
                                                </td>
                                            </tr>
                                          <?php $igeso++; }
                                        }else{?>

                                            <div class="alert alert-warning" role="alert">
                                                     <strong>กลุ่มนี้ไม่มีข้อมูล การเปิดรายวิชา</strong>
                                            </div>
                                            <?php     }
                                        
                                        
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="GESC">
                            <div class="table-responsive">
                                <table class="table no-margin">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>รหัสวิชา</th>
                                            <th>ชื่อวิชา</th>
                                            <th>วัน</th>
                                            <th>คาบ</th>
                                            <th>วัน เวลาสอบ</th>
                                            <th>sec</th>
                                            <th>หมู่เรียน</th>
                                            <th>อาจารย์ผู้สอน</th>
                                            <th>จำนวน</br>ผู้ลงทะเบียน</th>
                                            <th class="text-right">ลงทะเบียน</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $igesc = 1;
                                       if($chk_GESC<=0){?>
                                        <div class="alert alert-danger" role="alert">
					<i class='fa fa-check fa-2x'></i> <strong>กลุ่มนี้เรียนครบแล้วครับ</strong> ไม่สามารถลงทะเบียนในกลุ่มรายวิชานี้ได้.
                                        </div>
                                      <?php  
                                      
                                      if (!empty($this->gesc)) {
                                      foreach ($this->gesc as $value) {?>
                                        <tr class="success">
                                                <td><?= $igesc ?></td>
                                                <td><?= $value['sub_id'] ?></td>
                                                <td><?= $value['sub_text'] ?></td>
                                                <td><?= $value['d'] ?></td>
                                                <td><?= $value['blocks'] ?></td>
                                                <td><?= $value['date_test'] ?></br><?= $value['time_test'] ?></td>
                                                <td><?= $value['section'] ?></td>
                                                <td><?= $value['sec_stu'] ?></td>
                                                <td><?= $value['tea_Name'] ?></td>
                                                <td><h4><?= $value['cou_now'] ?></td>
                                                <td class="text-right">
                                                 <button type="button" class="btn ink-reaction btn-floating-action btn-sm btn-primary disabled"><i class="fa fa-pencil"></i></button>
                                                </td>
                                        </tr>
                                           <?php $igesc++; } 
                                           
                                        }else{?>

                                            <div class="alert alert-warning" role="alert">
                                                     <strong>กลุ่มนี้ไม่มีข้อมูล การเปิดรายวิชา</strong>
                                            </div>
                                            <?php     }
                                        
                                        
                                        } else{


                                            if (!empty($this->gesc)) {
                                foreach ($this->gesc as $value) {
                                            $chktime = chk_student($student_ID, $value['day_teach'], '2/2561', $value['startblock'], $value['endblock']);
                                            $learned = chk_student_learned($student_ID, $value['sub_id']);
                                            $chk_date_test = chk_date_test($value['date_test'], $value['time_id']);
                                               ?>
                                            <tr <?php if ($learned == 1) { ?>class="info" <?php
                                            } else { if($chktime>0){ ?> class="danger"<?php }else if ($chk_date_test > 0) {?> class="warning"<?php }  }?>>
                                                <td><?= $igesc ?></td>
                                                <td><?= $value['sub_id'] ?></td>
                                                <td><?= $value['sub_text'] ?></td>
                                                <td><?= $value['d'] ?></td>
                                                <td><?= $value['blocks'] ?></td>
                                                <td><?= $value['date_test'] ?></br><?= $value['time_test'] ?></td>
                                                <td><?= $value['section'] ?></td>
                                                <td><?= $value['sec_stu'] ?></td>
                                                <td><?= $value['tea_Name'] ?></td>
                                                <td>
                                                    <?php if ($value['cou_now'] >= $value['limits']) { ?> <h4 class="text-danger"><?= $value['cou_now'] ?></h> <?php } else { ?> <h4><?= $value['cou_now'] ?></h> <?php }?>
                                                     </td>
                                                <td class="text-right">
                                                    <?php if ($learned == 1 || $chk_date_test > 0) { ?>
                                                    <button type="button" class="btn ink-reaction btn-floating-action btn-sm btn-primary disabled"><i class="fa fa-pencil"></i></button>
                                                     <?php } else {
                                                                    if ($chktime == 0 && $value['cou_now'] < $value['limits']) {
                                                                        ?>
                                                                        <button type="button" class="btn ink-reaction btn-floating-action btn-sm btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="<?= $value['sub_id'] ?> sec <?= $value['section'] ?>" onclick="geregis('<?= $value['sub_id'] ?>','<?= $value['sub_text'] ?>','<?= $value['section'] ?>','<?= $value['startblock'] ?>','<?= $value['endblock'] ?>','<?= $value['t_no'] ?>','<?= $value['day_teach'] ?>','<?= isset($value['date_test']) ? $value['date_test'] : 'null'?>','<?= $value['time_id'] ?>');"><i class="fa fa-pencil"></i></button>
                                                                    <?php } else { ?>
                                                                           <button type="button" class="btn ink-reaction btn-floating-action btn-sm btn-primary disabled"><i class="fa fa-pencil"></i></button>

                                                    <?php } } ?>
                                                </td>
                                            </tr>
                                          <?php $igesc++; }
                                        
                                    }else{?>

                                        <div class="alert alert-warning" role="alert">
                                                 <strong>กลุ่มนี้ไม่มีข้อมูล การเปิดรายวิชา</strong>
                                        </div>
                                        <?php     }
                                        
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>

            <div class="row">

                <div class="col-lg-7">
                    <div class="card">
                      <div class="card-head">
                        <header><h2 class="text-danger"><i class="fa fa-exclamation-triangle"></i> หมายเหตุ แถบสีของตาราง</h2></header>

                      </div>
                      <div class="card-body">
                  <div class="table-responsive">

                      <table class="table no-margin">
                          <tbody>
                              <tr class="info">
                                      <td> <span class="text-danger text-bold">ไม่สามารถลงทะเบียนได้</span> เนื่องจากรายวิชานี้ <span class="text-info text-bold">ลงทะเบียนเรียนไปแล้ว</span></td>
                              </tr>
                              <tr>
                                      <td> <span class="text-primary text-bold">สามารถลงทะเบียนได้</span> <span class="text-bold">แต่ทั้งนี้ขึ้นอยู่กับจำนวนผู้ลงทะเบียนใน section นั้น (ไม่เกิน 40 คน)</span> </td>
                              </tr>
                              <tr class="success">
                                      <td> <span class="text-danger text-bold">ไม่สามารถลงทะเบียนได้</span> เนื่องจากรายวิชาในกลุ่มนี้ <span class="text-success text-bold">เรียนครบ</span> ตามโครงสร้างแล้ว</td>
                              </tr>
                              <tr class="warning">
                                      <td> <span class="text-danger text-bold">ไม่สามารถลงทะเบียนได้</span> เนื่องจากรายวิชานี้ <span class="text-warning text-bold"> วันและเวลาสอบตรงกับรายวิชาอื่น</span> ที่ได้ลงทะเบียนไปแล้ว</td>
                              </tr>
                              <tr class="danger">
                                      <td> <span class="text-danger text-bold">ไม่สามารถลงทะเบียนได้</span> เนื่องจากรายวิชานี้ <span class="text-danger text-bold">วันและเวลาเรียนตรงกับรายวิชาอื่น</span> ที่ได้ลงทะเบียนไปแล้ว</td>
                              </tr>

                          </tbody>
                      </table>
                      </div>
                  </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
