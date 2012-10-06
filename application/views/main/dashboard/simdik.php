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
<div class="row">
    <div class="span12"><?php echo $this->session->flashdata('msg'); ?></div>
    <div class="span3">
	<div class="well">
	    <h4>LOGIN</h4>
	    <p>
		<?php echo form_open('login/auth'); ?>
		<select name="username" style="width: 180px">
		    <option value="4">Administrator</option>
		    <option value="1">Bidang Perencanaan</option>
		    <option value="2">Bidang Penyelenggaraan</option>
		    <option value="3">Bidang Sarana dan Prasarana</option>
		</select>
		<input type="password" name="password" placeholder="password" style="width: 170px"/>
		<input type="submit" class="btn btn-primary" name="submit" value="Login" />
		<?php echo form_close(); ?>
	    <div align="right">
		<a href="#" id="bantuan" rel="popover" data-content="<ul><li>Pilih username sesuai dengan bidang atau bagian.</li><li>Masukkan password sesuai dengan bidang atau bagian tersebut.</li></ul>" data-original-title="Bantuan Login">Bantuan?</a></div>
	    </p>
	</div>
	<div class="well">
	    <h4>USULAN PESERTA DIKLAT</h4>
	    <p><a href="simdik/registrasi/" class="btn btn-success" rel="popover" title="Klik untuk melakukan usulan peserta diklat">Registrasi</a></p>
	</div>
    </div>

    <div class="span9">
	<ul class="nav nav-tabs">
	    <li class="active"><a href="#kalender" data-toggle="tab">Kalender Diklat</a></li>
	    <li><a href="#informasi" data-toggle="tab">Informasi</a></li>
	</ul>

	<div class="tab-content">
	    <div class="tab-pane active" id="kalender">
		<div id='loading' style='display:none'>loading...</div>
		<div id='calendar'></div>
		<br />
		<p>
		    Untuk melihat kalender per tahun : <button class="btn btn-info" onclick="window.location='site/dashboard/kalender_diklat'"><i class="icon-calendar icon-white"></i> Kalender satu tahun</button>
		</p>
	    </div>
	    <div class="tab-pane" id="informasi"><?php echo $info;?></div>
	</div>
    </div>
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