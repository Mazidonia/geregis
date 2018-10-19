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
                            <button class="btn btn-floating-action btn-info" onclick="find_stu();" type="button"><i class="fa fa-search"></i></button>
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
    function find_stu() {
        var stuID = $('input#stuID').val();
        if (stuID.length != 12) {
            toastr.warning('กรุณากรอก รหัสนักศึกษาให้ครบ 12 หลัก!');
            $('#username').focus();
            return;
        }
        $.ajax({
            type: "get",
            url: "<?= URL ?>ge/findstu/" + stuID,
            success: function (msg) {
                var data = $.parseJSON(msg);
                if (data.errorSql) {
                    swal("มีข้อผิดพลาด!", data.errorSql, "error");
                    $("#tableContainer").html('');
                } else {
                    var i, t = 0;
                    var dataname = data.name;
                    var table = '<div class="table-responsive" id="tableContainer">';

                    table += ('<table class="table table-striped"><thead><tr><th>รหัสวิชา</th><th>ชื่อวิชา</th><th>section</th><th>วัน</th><th>คาบ</th><th>ภาคการศึกษา</th><th>ลบ</th></tr></thead> <tbody>');
                    //data = $.parseJSON(data);
                    $.each(dataname, function (t, objT) {
                        table += ('<div class="alert alert-info" role="alert"> ชื่อ ' + objT.STUDENT_NAME + '  ' + objT.STUDENT_PROGRAM + '</div>');
                    });

                    var datarow = data.rows;
                    $.each(datarow, function (i, obj) {
                        table += ('<tr>');
                        table += ('<td>' + obj.sub_id + '</td>');
                        table += ('<td>' + obj.sub_text + '</td>');
                        table += ('<td>' + obj.section + '</td>');
                        table += ('<td>' + obj.d + '</td>');
                        table += ('<td>' + obj.blocks + '</td>');
                        table += ('<td>' + obj.term + '</td>');
                        table += ('<td><button type="button" class="btn ink-reaction btn-floating-action btn-sm btn-danger" onclick="delete_subject(' + obj.student_ID + ',' + "'" + obj.sub_id + "'" + ',' + obj.t_no + ',' + "'" + obj.term + "'" + ')"><i class="fa fa-close"></i></button></td>');
                        table += ('</tr>');
                    });
                    table += '</tbody></table></div>';
                    $("#tableContainer").html(table);
                }



            }
        });

    }
    function delete_subject(student_ID, sub_id, t_no, term) {
        swal({
            title: 'ยืนยันลบรายวิชา ?',
            text: sub_id + "  รหัส นศ." + student_ID + " เทอม " + term,
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: ' <i class="fa fa-check"></i> ใช่! ',
            cancelButtonText: ' <i class="fa fa-close"> ไม่ใช่! '
        }).then(function () {
            $.ajax({
                type: "get",
                url: "<?= URL ?>ge/delete_subject/" + student_ID + "/" + sub_id + "/" + t_no,
                success: function (msg) {
                    //console.log(msg);
                    var msg = eval('(' + msg + ')');
                    if (msg.success) {
                        swal({
                            title: 'กำลังลบข้อมูล!',
                            text: 'กรุณารอสักครู่',
                            timer: 1000,
                            onOpen: function () {
                                swal.showLoading();
                            },
                            allowOutsideClick: false
                        }).then(
                                function () {
                                },
                                function (dismiss) {
                                    if (dismiss === 'timer') {
                                        find_stu();
                                    }
                                }
                        );


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
