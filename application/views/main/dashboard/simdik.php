<script type="text/javascript" src="assets/js/bootstrap-tab.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-modal.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-popover.js"></script>
<script type='text/javascript' src='assets/js/fullcalendar/fullcalendar.min.js'></script>
<script type="text/javascript" language="javascript" src="assets/js/swfobject.js"></script>
<script type="text/javascript">
    jQuery(function($) {
	$('#bantuan').popover()
    });
</script>
<div class="row"><div class="span9"><?php echo $this->session->flashdata('msg'); ?></div></div>
	<ul class="nav nav-tabs">
	    <li class="active"><a href="#kalender" data-toggle="tab">Kalender Diklat</a></li>
	    <li><a href="#informasi" data-toggle="tab">Informasi</a></li>
	</ul>

	<div class="tab-content">
	    <div class="tab-pane active" id="kalender">
		<div id='loading' style='display:none'>loading...</div>
		<div id='calendar' style="width:690px;"></div>
		<br />
<!--		<p>
		    Untuk melihat kalender per tahun : <button class="btn btn-info" onclick="window.location='site/dashboard/kalender_diklat'"><i class="icon-calendar icon-white"></i> Kalender satu tahun</button>
		</p>-->
	    </div>
	    <div class="tab-pane" id="informasi"><?php echo $info;?></div>
	</div>
<script type="text/javascript">
    $('#calendar').fullCalendar({
	editable: false,
	events: "<?php echo site_url(); ?>site/dashboard/event",
	loading: function(bool) {
	    if (bool) $('#loading').show();
	    else $('#loading').hide();
	}

    });
</script>