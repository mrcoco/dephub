<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/reset.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/calendar.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/jquery.weekcalendar.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/libs/css/smoothness/jquery-ui-1.8rc3.custom.css"/>
<script type='text/javascript' src='<?php echo base_url() ?>assets/js/jquery.js'></script>
<script type='text/javascript' src='<?php echo base_url() ?>assets/libs/jquery-ui-1.8rc3.custom.min.js'></script>
<script type='text/javascript' src='<?php echo base_url() ?>assets/js/jquery.weekcalendar.js'></script>
<script type='text/javascript' src='<?php echo base_url() ?>assets/js/week_calendar.js'></script>

<!--JADWAL TENTATIVE <?php echo strtoupper($program['name']) ?>
<br/>
KEMENTRIAN PERHUBUNGAN TAHUN <?php echo $program['tahun_program'] ?>
<br/>
<br/>-->
<div id='calendar'></div>
<div id="event_edit_container">
    <form>
        <input type="hidden" name="id_program" value="<?php echo $program['id'] ?>"/>
        <ul>
            <li>
                <span>Tanggal: </span><span class="date_holder"></span> 
            </li>
            <li>
                <label for="start">Jam mulai: </label><select name="start"><option value="">Pilih jam mulai</option></select>
            </li>
            <li>
                <label for="end">Jam selesai: </label><select name="end"><option value="">Pilih jam selesai</option></select>
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