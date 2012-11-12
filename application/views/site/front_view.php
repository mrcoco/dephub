<script type="text/javascript" src="assets/js/bootstrap-tab.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-modal.js"></script>
<script type='text/javascript' src='assets/js/fullcalendar/fullcalendar.min.js'></script>
<script type="text/javascript" language="javascript" src="assets/js/swfobject.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
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
    });
</script>
<div class="row"><div class="span9"><?php echo $this->session->flashdata('msg'); ?></div></div>
<ul class="nav nav-tabs">
    <li><a href="#pengumuman" data-toggle="tab">Pengumuman</a></li>
    <li class="active"><a href="#kalender" data-toggle="tab">Kalender Diklat</a></li>
</ul>

<div class="tab-content">
    <div class="tab-pane" id="pengumuman">Pengumuman di sini</div>
    <div class="tab-pane active" id="kalender">
        <div id='loading' style='display:none'>loading...</div>
        <div id='calendar' style="width:690px;"></div>
    </div>
</div>