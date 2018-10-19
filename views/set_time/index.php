<script>
    $(function () {
        $('#demo-date-range').datepicker({todayHighlight: true, format: "yyyy-mm-dd"});
        $('#date-range').datepicker({todayHighlight: true, format: "yyyy-mm-dd"});
    });
</script>

<div class="section-body">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-info"><i class="fa fa-table"></i> กำหนดวันตรวจสอบรายวิชา</h4>
        </div><!--end .col -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form class="form">
                        <div class="form-group">
                            <div class="input-daterange input-group" id="demo-date-range">
                                <span class="input-group-addon">ตั้งแต่วันที่</span>
                                <div class="input-group-content">
                                    <input type="text" class="form-control" name="date_start_sc" id="date_start_sc" value="<?= $this->time_current_sc[0]['date_start'] ?>"/>
                                </div>
                                <span class="input-group-addon">ถึง</span>
                                <div class="input-group-content">
                                    <input type="text" class="form-control" name="date_stop_sc" id="date_stop_sc" value="<?= $this->time_current_sc[0]['date_stop'] ?>" />
                                    <div class="form-control-line"></div>
                                </div>
                                <br/>
                                <div class="col-xs-12 text-center">
                                    <button type="button" class="btn btn-info btn-raised" onclick="update_time_current('sc')"> - แก้ไข - </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-primary"><i class="fa fa-table"></i> กำหนดวันลงทะเบียน</h4>
        </div><!--end .col -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form class="form">
                        <div class="form-group">
                            <div class="input-daterange input-group" id="date-range">
                                <span class="input-group-addon">ตั้งแต่วันที่</span>
                                <div class="input-group-content">
                                    <input type="text" class="form-control" name="date_start_ge" id="date_start_ge" value="<?= $this->time_current_ge[0]['date_start'] ?>"/>
                                </div>
                                <span class="input-group-addon">ถึง</span>
                                <div class="input-group-content">
                                    <input type="text" class="form-control" name="date_stop_ge" id="date_stop_ge" value="<?= $this->time_current_ge[0]['date_stop'] ?>" />
                                    <div class="form-control-line"></div>
                                </div>
                                <br/>
                                <div class="col-xs-12 text-center">
                                    <button type="button" class="btn btn-primary btn-raised" onclick="update_time_current('ge')"> - แก้ไข - </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function update_time_current(type) {

  var typeTxt;
  if (type == 'ge') {
    var date_start = $('#date_start_ge').val();
    var date_stop = $('#date_stop_ge').val();
    if (date_start.length =='' || date_stop.length =='') {
        toastr.warning('กรุณาเลือกวันที่ให้ครบครับ!');
        $('#date_start_ge').focus();
        return;
    }


    typeTxt = 'คุณต้องการที่จะเปลี่ยนแปลงเวลาลงทะเบียน ?'
  } else if (type == 'sc') {
    var date_start = $('#date_start_sc').val();
    var date_stop = $('#date_stop_sc').val();
    if (date_start.length =='' || date_stop.length =='') {
        toastr.warning('กรุณาเลือกวันที่ให้ครบครับ!');
        $('#date_start_sc').focus();
        return;
    }
    typeTxt = 'คุณต้องการที่จะเปลี่ยนแปลงวันตรวจสอบรายวิชา ก่อนทะเบียน ?'
  }
  swal({
    title: typeTxt,
    text: 'ระหว่างวันที่ ' + date_start + ' ถึง ' + date_stop,
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: ' <i class="fa fa-check"></i> ใช่! ',
    cancelButtonText: ' <i class="fa fa-close"> ไม่ใช่! '
  }).then(function() {
    $.ajax({
      type: "get",
      url: "<?= URL ?>set_time/update/" + date_start + "/" + date_stop + "/" + type,
      success: function(msg) {
        console.log(msg);
        var msg = eval('(' + msg + ')');
        if (msg.success) {
          swal('Update เวลา เรียบร้อยแล้วครับ', '', 'success');

        } else if (msg.errorMsg) {
          swal("มีข้อผิดพลาด!", msg.errorMsg, "error");
          //alert("ไม่พบข้อมูลนักศึกษา กรุณาติดต่อเจ้าหน้าที่");
          return;
        }
      }
    });

  }, function(dismiss) {
    return;
  });
}
</script>
