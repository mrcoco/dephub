<script type="text/javascript" src="assets/js/bootstrap-tab.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-modal.js"></script>
<script type='text/javascript' src='assets/js/fullcalendar/fullcalendar.min.js'></script>
<script type="text/javascript" language="javascript" src="assets/js/swfobject.js"></script>
<div class="row"><div class="span9"><?php echo $this->session->flashdata('msg'); ?></div></div>
<ul class="nav nav-tabs">
    <li class="active"><a href="#pengumuman" data-toggle="tab">Pengumuman</a></li>
    <li><a href="#kalender" id="cal" data-toggle="tab">Kalender Diklat</a></li>
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
    <div class="tab-pane" id="kalender">
        <div id='loading' style='display:none'>loading...</div>
        <div id='calendar' style="width:690px;"></div>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        $('#calendar').fullCalendar({
            editable: false,
    //	events: "<?php echo site_url(); ?>site/dashboard/event",
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