        <div id="menubar" class="menubar-inverse ">
           <?php
    $url = new getValueURL();
    ?>
<div class="menubar-scroll-panel">
    <ul id="main-menu" class="gui-controls">
        <?php if(base64_decode($_SESSION['STUDENT_ROLE'])=='1'){ ?>
        <li class="gui-folder">
            <a>
                <div class="gui-icon"><i class="fa fa-arrows"></i></div>
                <span class="title">เมนูผู้ดูแลระบบ</span>
            </a>
            <ul>
                <li><a href="<?= URL ?>dashboard" <?php if($url->getURL() =="dashboard"){echo"class='active'";} ?>><span class="title">สรุปภาพรวมการเลือก GE</span></a></li>
                <li><a href="<?= URL ?>ge/open" <?php if($url->getURL() =="ge/open"){echo"class='active'";} ?>><span class="title">รายวิชา GE ที่เปิดสอน</span></a></li>
            </ul><!--end /submenu -->
        </li>

        <li>
            <a href="<?= URL ?>ge/manageregis" <?php if($url->getURL() =="ge/manageregis"){echo"class='active'";} ?>>
                <div class="gui-icon"><i class="fa fa-hand-o-right"></i></div>
                <span class="title">ลบรายวิชาของ นศ.</span>
            </a>
        </li>
        <li>
            <a href="<?= URL ?>ge/managepassword" <?php if($url->getURL() =="ge/managepassword"){echo"class='active'";} ?>>
                <div class="gui-icon"><i class="fa fa-hand-o-right"></i></div>
                <span class="title">เปลี่ยน password นศ.</span>
            </a>
        </li>
        <li>
            <a href="<?= URL ?>set_time" <?php if($url->getURL() =="set_time"){echo"class='active'";} ?>>
                <div class="gui-icon"><i class="fa fa-table"></i></div>
                <span class="title">กำหนดวันลงทะเบียน</span>
            </a>
        </li><!--end /menu-li -->
        <?php } else{?>
        <li>
            <a href="<?= URL ?>dashboard"<?php if($url->getURL() =="dashboard"){echo"class='active'";} ?>>
                <div class="gui-icon"><i class="md md-home"></i></div>
                <span class="title">หน้าหลัก</span>
            </a>
        </li>
        <li>
            <a href="<?= URL ?>schedule" <?php if($url->getURL() =="schedule"){echo"class='active'";} ?>>
                <div class="gui-icon"><i class="fa fa-table"></i></div>
                <span class="title">ตารางเรียน</span>
            </a>
        </li>
        <li>
            <a href="<?= URL ?>schedule/resumes" <?php if($url->getURL() =="schedule/resumes"){echo"class='active'";} ?>>
                <div class="gui-icon"><i class="fa fa-line-chart"></i></div>
                <span class="title">แนวทางการเลือก</span>
            </a>
        </li>
        <li>
            <a href="<?= URL ?>ge" <?php if($url->getURL() =="ge"){echo"class='active'";} ?>>
                <div class="gui-icon"><i class="fa fa-hand-o-right"></i></div>
                <span class="title">ลงทะเบียน</span>
            </a>
        </li>
        <li>
            <a href="<?= URL ?>manual" <?php if($url->getURL() =="manual"){echo"class='active'";} ?>>
                <div class="gui-icon"><i class="fa fa-cog"></i></div>
                <span class="title">คู่มือการลงทะเบียน</span>
            </a>
        </li>
        <?php }?>
     </ul><!--end .main-menu -->
    <!-- END MAIN MENU -->

    <div class="menubar-foot-panel">
        <small class="no-linebreak hidden-folded">
            <span class="opacity-75">Copyright &copy; 2017</span> <strong>งานหลักสูตร</strong>
        </small>
    </div>
</div><!--end .menubar-scroll-panel-->
</div>
