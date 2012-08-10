<?php echo doctype();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?php echo base_url();?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <title>Pusat Pengembangan SDM Aparatur Perhubungan</title>
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon" />
    <link type="text/css" href="assets/css/bootstrap.css" rel="stylesheet" />
    <link type="text/css" href="assets/css/style.css" rel="stylesheet" />
    <link rel='stylesheet' type='text/css' href='assets/js/fullcalendar/fullcalendar.css' />
    <link rel='stylesheet' type='text/css' href='assets/js/fullcalendar/fullcalendar.print.css' media='print' />
    <link rel='stylesheet' type='text/css' href='assets/css/custom-themes/jquery-ui-1.8.16.custom.css' media='print' />
    <link type="text/css" href="assets/css/datepicker.css" rel="stylesheet" />
    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!--scripts-->
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/jquery-ui.js"></script>
    <script type="text/javascript" src="assets/js/jquery.validate.js"></script>

    <script type="text/javascript" src="assets/js/tm/jquery.tinymce.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-transition.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-tooltip.js"></script>
    <script type="text/javascript" src="assets/js/sisfo.js"></script>

</head>
<body>
	<div class="container" id="content">
	    <?php echo $_header;?>
	    <br />
	    <div class="clear"></div>
	    <?php echo $_menu;?>

	    <div class="clear"></div>
	    <div>
		<h1 class="title-page"><?php echo $this->session->userdata('detail');?> <small><?php if(!isset($sub_title)){echo '';}else{echo $sub_title;}?></small></h1>
		<hr />
		<?php echo $_content;?>
	    </div><!-- content -->
	    <div class="clear"></div>

	    <!-- Footer -->
	    <hr />
	    <footer class="container">
		Hak Cipta © <?php echo date('Y');?> <br />
		<b>
		    <a href="<?php echo site_url();?>" style="color:#000;text-decoration: none;">
			Pusbang SDM Aparatur Perhubungan
		    </a>
		</b>
	    </footer>
	</div>
<div id="mixpanel" style="visibility: hidden; "></div>
</body>
</html>