<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/reset.css"/>-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/calendar.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/jquery.weekcalendar.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/libs/css/smoothness/jquery-ui-1.8rc3.custom.css"/>

<script type='text/javascript' src='<?php echo base_url() ?>assets/libs/jquery-ui-1.8rc3.custom.min.js'></script>
<script type='text/javascript' src='<?php echo base_url() ?>assets/js/jquery.weekcalendar.js'></script>
<script type='text/javascript' src='<?php echo base_url() ?>assets/js/week_calendar.js'></script>

JADWAL TENTATIVE <?php echo strtoupper($program['name']) ?>
<br/>
KEMENTRIAN PERHUBUNGAN TAHUN <?php echo $program['tahun_program'] ?>
<br/>
<br/>
<div id='calendar'></div>
<div id="event_edit_container">
		<form>
			<input type="hidden" />
			<ul>
				<li>
					<span>Date: </span><span class="date_holder"></span> 
				</li>
				<li>
					<label for="start">Start Time: </label><select name="start"><option value="">Select Start Time</option></select>
				</li>
				<li>
					<label for="end">End Time: </label><select name="end"><option value="">Select End Time</option></select>
				</li>
				<li>
					<label for="title">Title: </label><input type="text" name="title" />
				</li>
				<li>
					<label for="body">Body: </label><textarea name="body"></textarea>
				</li>
			</ul>
		</form>
	</div>