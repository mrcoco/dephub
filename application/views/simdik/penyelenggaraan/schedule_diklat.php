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