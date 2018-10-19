<?php $url = new getValueParam(); ?>
<div class="section-header">
    <ol class="breadcrumb">
        <li class="active">ค้นหาข้อมูลจากรหัส นศ.</li>

    </ol>
</div>
<div class="section-body no-margin">
    <div class="card tabs-left style-default-light">

        <!-- BEGIN SEARCH BAR -->
        <div class="card-body style-primary-light">



            <div class="form-group">
                <div class="col-sm-12">
                    <div class="input-group">
                        <div class="input-group-content">
                            <input type="text" class="form-control" id="stuID" placeholder="กรอกรหัส นศ. 12 หลัก">
                            <div class="form-control-line"></div>
                        </div>
                        <div class="input-group-btn">
                            <button class="btn btn-floating-action btn-info" onclick="find_stu_password();" type="button"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div><!--end .form-group -->


        </div>
        <div class="card-body style-default-bright">
            <div class="card card-underline" id="tableContainer">
            </div>
        </div><!--end .card -->
    </div>
</div><!--end .section-body -->
<script>
    function find_stu_password() {
        var stuID = $('input#stuID').val();
        if (stuID.length != 12) {
            toastr.warning('กรุณากรอก รหัสนักศึกษาให้ครบ 12 หลัก!');
            $('#username').focus();
            return;
        }
        $.ajax({
            type: "get",
            url: "<?= URL ?>ge/findstupwd/" + stuID,
            success: function (msg) {
                var data = $.parseJSON(msg);
                if (data.errorSql) {
                    swal("มีข้อผิดพลาด!", data.errorSql, "error");
                    $("#tableContainer").html('');
                } else {

                    var table ='';
                    var table = '<div class="card-body"><div class="alert alert-info" role="alert"> ชื่อ ' + data[0].STUDENT_NAME + '  ' + data[0].STUDENT_PROGRAM + '</div><form class="form"><div class="form-group">';
                                        table += '<span class="input-group-addon">Password ปัจจุบันของนักศึกษา</span><div class="input-group-content"><input type="text" class="form-control" name="stu_pwd" id="stu_pwd" value="' + data[0].DATE_OF_BIRTH + '"/>';
                                        table += '</div><div class="col-12 text-center"></br></br><button type="button" onclick="update_password(' + data[0].STUDENT_CODE + ',' + "'" + data[0].STUDENT_NAME + "'" + ')" class="btn btn-info btn-raised"> - แก้ไข - </button></div>';
                                        table += '</div></form></div>';
                                        $("#tableContainer").html(table);

                    $("#tableContainer").html(table);


                }



            }
        });

    }
    function update_password(student_ID,stu_name) {
      var stu_pwd = $('input#stu_pwd').val();
      if (stu_pwd.length != 8) {
          toastr.warning('Password ต้องมี 8 หลัก! กรุณาตรวจสอบ');
          $('#stu_pwd').focus();
          return;
      }
        swal({
            title: 'ยืนยันการเปลี่ยนรหัสผ่าน?',
            text: 'ของ '+ stu_name,
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: ' <i class="fa fa-check"></i> ใช่! ',
            cancelButtonText: ' <i class="fa fa-close"> ไม่ใช่! '
        }).then(function () {
            $.ajax({
                type: "get",
                url: "<?= URL ?>ge/update_password/" + student_ID + "/" + stu_pwd,
                success: function (msg) {
                    //console.log(msg);
                    var msg = eval('(' + msg + ')');
                    if (msg.success) {
                        swal('เปลี่ยนรหัสผ่าน เรียบร้อยแล้วครับ', '', 'success');
                    } else if (msg.errorMsg) {
                        swal("มีข้อผิดพลาด!", msg.errorMsg, "error");
                        //alert("ไม่พบข้อมูลนักศึกษา กรุณาติดต่อเจ้าหน้าที่");
                        return;
                    }
                }
            });

        }, function (dismiss) {
            return;
        });
    }
</script>
