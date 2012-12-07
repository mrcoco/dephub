<script type='text/javascript' src='assets/js/fullcalendar/fullcalendar.min.js'></script>
<script type="text/javascript" language="javascript" src="assets/js/swfobject.js"></script>
<div class="row"><div class="span9"><?php echo $this->session->flashdata('msg'); ?></div></div>
<ul class="nav nav-tabs">
    <li class="active"><a href="#pengumuman" data-toggle="tab">Pengumuman</a></li>
    <li><a href="#diklat" data-toggle="tab">Daftar Diklat</a></li>
</ul>

<div class="tab-content">
    <div class="tab-pane active" id="pengumuman">
        <?php foreach($data_post as $dp){?>
        <h4><?php echo $dp['judul'] ?></h4>
        <h5><small><?php echo $this->date->konversi5($dp['tanggal']).', '.$dp['waktu'] ?></small></h5>
        <?php echo $dp['isi']?>
        <hr />
        <?php } ?>
    </div>
    <div class="tab-pane" id="diklat">
        <?php if($program){ ?>
                <table width="100%" class="table-striped table-condensed table">
                    <?php $this->lib_perencanaan->print_tree_table_pub($program)?>
                </table>
        <?php }else{?>
        Tidak ada data
        <?php } ?>
        <div class="form-actions">
            <a class="btn btn-primary" href="<?php echo base_url()?>site/kal_diklat">Lihat Kalender</a>
            <a class="btn btn-success" href="<?php echo base_url()?>diklat/cetak_jadwal">Cetak Jadwal</a>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        $('#calendar').fullCalendar({
            editable: false,
            events: "<?php echo base_url(); ?>site/json_event",
            loading: function(bool) {
                if (bool){
                    $('#loading').show();
                }
                else{
                    $('#loading').hide();
                }
            }
        });
        $('.fc-state-highlight').css('background','#C7DFFF');
    });
</script>
