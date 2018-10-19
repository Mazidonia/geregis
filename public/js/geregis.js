function checkstu() {
    var u = $('input#username').val();
    var p = $('input#pass').val();
    if (u.length == 0) {


        //show when the button is clicked
        //swal("Good job!", "You clicked the button!", "warning");
        toastr.warning('กรุณากรอก Username!');
        $('#username').focus();
        return;
    }
    if (p.length == 0) {
        toastr.warning('กรุณากรอก Password!');
        $('#pass').focus();
        return;
    }
    $.ajax({
        type: "get",

        url: "login/checkuser/" + u + "/" + p,
        success: function (msg) {
            var msg = $.parseJSON(msg);
            //var msg = eval('(' + msg + ')');
            if (msg.errorMsg) {

                swal("มีข้อผิดพลาด!", "ไม่พบข้อมูลนักศึกษา กรุณาติดต่อเจ้าหน้าที่!", "error");
                //alert("ไม่พบข้อมูลนักศึกษา กรุณาติดต่อเจ้าหน้าที่");
                return;
            } else if (msg.success) {
                swal({
                    title: 'กำลังเข้าสู่ระบบ!',
                    text: 'กรุณารอสักครู่',
                    timer: 2000,
                    onOpen: function () {
                        swal.showLoading();
                    },
                    allowOutsideClick: false
                }).then(
                        function () {
                        },
                        function (dismiss) {
                            if (dismiss === 'timer') {
                              if (msg.success=='admin') {
                                  redirect(0, "manual");
                              }else {
                              redirect(0, "schedule");
                              }
                            }
                        }
                );

            }


        }
    });

}


function geregis(sub_id, sub_text, section, startblock, endblock, t_no, day_teach,date_test,time_id) {
    swal({
        title: '<span style="color:red;">ก่อนกดปุ่ม ใช่! ตรวจสอบให้แน่ใจ หากยืนยันแล้ว \nจะไม่สามารถแก้ไขรายวิชาได้ </span>\n  ยืนยันการลงทะเบียนรายวิชา ? ',
        text: sub_id + "  " + sub_text + " sec " + section ,
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: ' <i class="fa fa-check"></i> ใช่! ',
        cancelButtonText: ' <i class="fa fa-close"> ไม่ใช่! '
    }).then(function () {
        $.ajax({
            type: "get",
            url: "ge/geregis/" + sub_id + "/" + t_no + "/" + day_teach + "/" + startblock + "/" + endblock + "/" + section+ "/" + date_test + "/" + time_id,
            success: function (msg) {
                //console.log(msg);
                var msg = eval('(' + msg + ')');
                if (msg.success) {
                    swal({
                        title: 'กำลังลงทะเบียน!',
                        text: 'กรุณารอสักครู่.',
                        onOpen: function () {
                            swal.showLoading();
                        },
                        allowOutsideClick: false
                    });
                    //redirect(2000, 'courses_teach');
                    redirect(2000, "ge");

                } else if (msg.errorlimitchoose) {
                  swal({
                    title: 'มีข้อผิดพลาด',
                    html: '<span style="color:red;">'+msg.errorlimitchoose+'</span>',
                    type: 'error'
                  }).then(function () {
                      return;
                  }, function (dismiss) {
                      return;
                  });



                  /*  swal({
                        title: 'มีข้อผิดพลาด ?',
                        text: msg.errorlimitchoose,
                        type: 'error'
                    }).then(function () { function (dismiss) {
                        return;
                    }
                  });*/
                    //alert("ไม่พบข้อมูลนักศึกษา กรุณาติดต่อเจ้าหน้าที่");
                    return;
                } else if (msg.errorlimit) {
                    //swal("มีข้อผิดพลาด!", msg.errorlimit, "error");
                    swal({
                      title: 'มีข้อผิดพลาด',
                        html: '<span style="color:red;">'+msg.errorlimit+'</span>',
                      type: 'error'
                    }).then(function () {
                        return;
                    }, function (dismiss) {
                        return;
                    });
                    //alert("ไม่พบข้อมูลนักศึกษา กรุณาติดต่อเจ้าหน้าที่");
                    return;
                } else if (msg.errorblockbusy) {
                    //swal("มีข้อผิดพลาด!", msg.errorblockbusy, "error");
                    swal({
                      title: 'มีข้อผิดพลาด',
                        html: '<span style="color:red;">'+msg.errorblockbusy+'</span>',
                      type: 'error'
                    }).then(function () {
                        return;
                    }, function (dismiss) {
                        return;
                    });
                    //alert("ไม่พบข้อมูลนักศึกษา กรุณาติดต่อเจ้าหน้าที่");
                    return;
                } else if (msg.errorlearned) {
                    //swal("มีข้อผิดพลาด!", msg.errorlearned, "error");
                    swal({
                      title: 'มีข้อผิดพลาด',
                        html: '<span style="color:red;">'+msg.errorlearned+'</span>',
                      type: 'error'
                    }).then(function () {
                        return;
                    }, function (dismiss) {
                        return;
                    });
                    //alert("ไม่พบข้อมูลนักศึกษา กรุณาติดต่อเจ้าหน้าที่");
                    return;
                } else if (msg.errorlearned) {
                    //swal("มีข้อผิดพลาด!", msg.errorlearned, "error");
                    swal({
                      title: 'มีข้อผิดพลาด',
                      html: '<span style="color:red;">'+msg.errorlearned+'</span>',
                      type: 'error'
                    }).then(function () {
                        return;
                    }, function (dismiss) {
                        return;
                    });
                    //alert("ไม่พบข้อมูลนักศึกษา กรุณาติดต่อเจ้าหน้าที่");
                    return;
                } else if (msg.errorSql) {
                    //swal("มีข้อผิดพลาด!", msg.errorSql, "error");
                    swal({
                      title: 'มีข้อผิดพลาด',
                        html: '<span style="color:red;">'+msg.errorSql+'</span>',
                      type: 'error'
                    }).then(function () {
                        return;
                    }, function (dismiss) {
                        return;
                    });
                    //alert("ไม่พบข้อมูลนักศึกษา กรุณาติดต่อเจ้าหน้าที่");
                    return;
                }

            }
        });

    }, function (dismiss) {
        return;
    });
}

function redirect(sec, link) {
    setTimeout(function () {
        window.location = link;
    }, sec);
}
