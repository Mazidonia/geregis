<?php
$chooselimit = chooselimit();
$sum_units = sum_units();
$choosenow = choosenow();
?>
<header id="header">
    <div class="headerbar">
        <script>
            function logout() {
                swal({
                    title: 'ยืนยันการออกจากระบบ?',
                    text: "คุณต้องการออกจากระบบใช่หรือไม่!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: ' <i class="fa fa-check"></i> ใช่! ',
                    cancelButtonText: ' <i class="fa fa-close"> ไม่ใช่! '
                }).then(function() {
                    $.ajax({
                        type: "get",
                        url: "<?= URL ?>login/logout",
                        success: function(msg) {
                            var msg = eval('(' + msg + ')');
                            if (msg.success) {
                                swal({
                                    title: 'กำลังออกจากระบบ!',
                                    text: 'กรุณารอสักครู่.',
                                    onOpen: function() {
                                        swal.showLoading();
                                    },
                                    allowOutsideClick: false
                                });
                                //redirect(2000, 'courses_teach');
                                redirect(2000, "login");

                            } else {
                                swal("มีข้อผิดพลาด!",
                                    "ไม่สามารถออกจากระบบได้ กรุณาติดต่อเจ้าหน้าที่!", "error");
                                //alert("ไม่พบข้อมูลนักศึกษา กรุณาติดต่อเจ้าหน้าที่");
                                return;
                            }
                        }
                    });
                }, function(dismiss) {
                    return;
                });
            }

            function choose_full() {
                swal({
                    title: 'เลือกรายวิชาครบแล้ว อย่าลืมออกจากระบบนะครับ!!!',
                    text: "ออกจากระบบเดี๋ยวนี้ เลือกใช่?",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: ' <i class="fa fa-check"></i> ใช่! ',
                    cancelButtonText: ' <i class="fa fa-close"> ไม่ใช่! '
                }).then(function() {
                    $.ajax({
                        type: "get",
                        url: "<?= URL ?>login/logout",
                        success: function(msg) {
                            var msg = eval('(' + msg + ')');
                            if (msg.success) {
                                swal({
                                    title: 'กำลังออกจากระบบ!',
                                    text: 'กรุณารอสักครู่.',
                                    onOpen: function() {
                                        swal.showLoading();
                                    },
                                    allowOutsideClick: false
                                });
                                //redirect(2000, 'courses_teach');
                                redirect(2000, "login");

                            } else {
                                swal("มีข้อผิดพลาด!",
                                    "ไม่สามารถออกจากระบบได้ กรุณาติดต่อเจ้าหน้าที่!", "error");
                                //alert("ไม่พบข้อมูลนักศึกษา กรุณาติดต่อเจ้าหน้าที่");
                                return;
                            }
                        }
                    });
                }, function(dismiss) {
                    return;
                });
            }


            <?php
            if (base64_decode($_SESSION['STUDENT_ROLE']) != '1') {
                if ($chooselimit>0) {
                    if ($chooselimit == $choosenow) {
                        ?>
            choose_full();


            <?php
                    }
                }
            } ?>
        </script>

        <div class="headerbar-left">
            <ul class="header-nav header-nav-options">
                <li class="header-nav-brand">
                    <div class="brand-holder">
                        <a href="index.php">
                            <span class="text-lg text-bold text-primary">
                                <i class="fa fa-home"></i> ระบบลงทะเบียน GE ออนไลน์ รุ่น 59</span>
                        </a>
                    </div>
                </li>
                <li>
                    <a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
            </ul>

        </div>

        <div class="headerbar-right">


            <?php if (base64_decode($_SESSION['STUDENT_ROLE']) != '1') {
                ?>
            <ul class="header-nav header-nav-profile">
                <li>
                    <span class="badge style-success">จำนวนหน่วยกิตปัจจุบัน
                        <?= $sum_units ?>
                    </span>
                    <?php if ($chooselimit>0) {
                    ?>
                    <span class="badge style-danger"> เลือกได้
                        <?= $chooselimit ?>
                    </span>
                    <span class="badge style-info"> เลือกแล้ว
                        <?= $choosenow ?>
                    </span>
                    <?php
                } else {
                    ?>
                    <span class="badge style-danger"> ไม่มีสิทธิ์เลือกในเทอมนี้
                    </span>

                    <?php
                } ?>

                </li>

            </ul>


            <?php
            } ?>

            <ul class="header-nav header-nav-profile">
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
                        <span class="profile-info">
                            <?php echo $_SESSION['aname']; ?>
                            <small>
                                <?= base64_decode($_SESSION['user_id']); ?>
                            </small>
                        </span>
                    </a>
                    <ul class="dropdown-menu animation-dock">
                        <li class="dropdown-header">รายละเอียด</li>
                        <li>
                            <span class="badge style-success pull-right">
                                <?= $_SESSION['STUDENT_PROGRAM']; ?>
                            </span>
                        </li>
                        <li>
                            <a href="#" onclick="logout();">
                                <i class="fa fa-fw fa-power-off text-danger"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>


    </div>
</header>