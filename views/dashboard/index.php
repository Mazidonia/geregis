<div class="section-body no-margin">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-primary">
                <i class="fa fa-book"></i> สรุปการเลือกรายวิชา GE 2/2561</h4>
        </div>
        <!--end .col -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <?php if (!empty($this->check_ge_now)) {
    ?>
                    <div id="morris-bar-graph" class="graph" data-colors="#66CCFF,#FF6633,#33CC99"></div>

                    <?php
} else {
        ?>
                        <div>ไม่พบข้อมูล</div>

                        <?php
    } ?>
                </div>
                <!--end .card-body -->

            </div>
            <!--end .card -->
            <em class="text-caption">
                <span class="text-danger">*หมายเหตุ จำนวนผู้เลือกแล้ว</span> ก่อนวันลงทะเบียน คือ จำนวน นศ.รุ่นอื่นๆ นอกเหนือจากรุ่น 59 ที่ลงทะเบียนตามแผนการเรียน</em>
        </div>
        <!--end .col -->
    </div>
    <!--end .row -->
</div>
<?php if (!empty($this->check_ge_now)) {
        ?>
<script>
    Morris.Bar({
        element: 'morris-bar-graph',
        data: [{
                device: 'กลุ่ม GELA',
                n: <?=$this->check_ge_now[1]['remain']?>,
                l: <?=$this->check_ge_now[1]['all']?>,
                r: <?=$this->check_ge_now[1]['cou_st']?>
            },
            {
                device: 'กลุ่ม GEHU',
                n: <?=$this->check_ge_now[0]['remain']?>,
                l: <?=$this->check_ge_now[0]['all']?>,
                r: <?=$this->check_ge_now[0]['cou_st']?>
            },
            {
                device: 'กลุ่ม GESO',
                n: <?=$this->check_ge_now[3]['remain']?>,
                l: <?=$this->check_ge_now[3]['all']?>,
                r: <?=$this->check_ge_now[3]['cou_st']?>
            },
            {
                device: 'กลุ่ม GESC',
                n: <?=$this->check_ge_now[2]['remain']?>,
                l: <?=$this->check_ge_now[2]['all']?>,
                r: <?=$this->check_ge_now[2]['cou_st']?>
            }

        ],
        xkey: 'device',
        ykeys: ['l', 'r', 'n'],
        labels: ['ทั้งหมด', 'เลือกแล้ว', 'คงเหลือ'],
        barRatio: 1,

        grid: true,
        xLabelAngle: 60,
        barColors: $('#morris-bar-graph').data('colors').split(',')
    });
</script>

<?php
    } ?>