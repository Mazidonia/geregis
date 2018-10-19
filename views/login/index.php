<?php
session_start();
?>
<section class="section-account">
    <div class="card contain-sm ">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <img class="img-responsive " src="public/img/announce.jpg" alt="" />
                        </div>
                    </div>
                </div>
                <?=$_SESSION["user_id"]?>
                <div class="col-lg-12">
                    <br/>
                    <span class="text-lg text-bold text-primary">
                        <i class="fa fa-lock fa-2x"></i> ระบบลงทะเบียน GE ออนไลน์.</span>
                    <br/>
                    <br/>
                    <form class="form floating-label" action="" accept-charset="utf-8" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" id="username" name="username">
                            <label for="username">Username</label>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="pass" name="pass">
                            <label for="username">Password</label>
                        </div>
                        <br/>
                        <div class="col-xs-12 text-center">
                            <button type="button" class="btn btn-primary btn-lg btn-raised" onclick="checkstu()"> - เข้าสู่ระบบ - </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <header>
                        <span class="text-info">
                            <h2>
                                <i class="fa fa-tags"></i> โปรดอ่าน</h2>
                        </span>
                    </header>
                    <p class="text-lg text-danger">
                        <i class="fa fa-user"></i> เข้าระบบด้วย Username รหัสนักศึกษา 12 หลัก และ Password วันเดือนปีเกิด</p>
                    <ul>
                        <li>ตัวอย่างเช่น นายเอ นามสมมติ รหัสนักศึกษา 591102181103 เกิดวันที่ 1 มกราคม 2540</li>
                        <li>Username : 591102181103</li>
                        <li>Password : 01012540</li>
                        <li>
                            <span class="text-danger">กรณี วัน เดือน เกิด 1-9 ให้เติม 0 ด้านหน้า เช่น เกิดวันที่ 1 = 01</span>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-12">
                    <p class="text-lg text-danger">
                        <i class="fa fa-phone"></i>เข้าระบบไม่ได้ หรือสอบถามรายละเอียดอื่นๆ เพิ่มเติม โทร 056-717100 ต่อ 1122
                    </p>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="body">
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <img class="img-responsive " src="public/img/info-regis2.jpg" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $('#username').bind('keydown', function(e) {
        if (e.keyCode == 13) { 
            checkstu();
        }
    });
    $('#pass').bind('keydown', function(e) {
        if (e.keyCode == 13) { 
            checkstu();
        }
    });
</script>