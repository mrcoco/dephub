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

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!--scripts-->
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/jquery-ui.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-transition.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-tooltip.js"></script>
    <script type="text/javascript">
	jQuery(function($) {
	    $('a').tooltip()
	});
    </script>
</head>
<body>
	<div class="container" id="content">
	    <div class="row">
		<div class="span-24">
		    <img src="assets/img/header.jpg" />
		</div>
	    </div>
	    <hr />
	    <div class="clear"></div>
	    <div class="row">
		<center>
		    <h2>404 Not Found</h2>
		    <img src="<?php echo base_url();?>assets/img/404.png" /><br />
		    <button class="btn" onclick="window.location='<?php echo base_url();?>'"><i class="icon-home"></i> Kembali Halaman Utama</button>
		</center>
	    </div>

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