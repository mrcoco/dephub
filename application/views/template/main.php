<?php echo doctype();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?php echo base_url();?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <title>Pusat Pengembangan SDM Aparatur Perhubungan</title>
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon" />
    <!--<link rel='stylesheet' type='text/css' href='assets/css/jquery.dataTables.css' />-->
    <link rel='stylesheet' type='text/css' href='assets/js/fullcalendar/fullcalendar.css' />
    <link rel='stylesheet' type='text/css' href='assets/js/fullcalendar/fullcalendar.print.css' media='print' />
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-responsive.css" />
    <link rel="stylesheet" type='text/css' href="assets/css/jquery/jquery-ui.css" />
    <link rel='stylesheet' type='text/css' href='assets/css/custom-theme/jquery-ui-1.8.16.custom.css' media='print' />
    <link rel="stylesheet" type="text/css" href="assets/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.jqplot.min.css" />    
    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!--scripts-->
    <script class="include" type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/jquery-ui.js"></script>
    <!--[if lt IE 9]><script language="javascript" type="text/javascript" src="assets/js/excanvas.min.js"></script><![endif]-->
    <script language="javascript" type="text/javascript" src="assets/js/jquery.jqplot.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.validate.js"></script>
    <script type="text/javascript" src="assets/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="assets/js/tm/jquery.tinymce.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="assets/js/sisfo.js"></script>
<script type="text/javascript">
    $(function(){
        $('.tgllahir').datepicker({
            changeMonth:true,
            changeYear:true,
            dateFormat:"dd-mm-yy",
            yearRange: '-100y:c-nn',
            maxDate: '-15Y',
            defaultDate: '-25Y'
        });
        $( ".datepicker" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd-mm-yy"
        });
        $('#list').dataTable();
        $('#list_length').addClass('pull-right');
        $('select[name="list_length"]').addClass('input-mini');
        $('#list_filter input').attr('placeholder','Masukkan kata yang dicari');
        $('.alert').delay(2 * 1000).fadeOut();
        $('.tip-right').tooltip({placement:'right'});
    } );
   function view_detail(num){
        $.get("<?php echo base_url() ?>pegawai/detail_pegawai/"+num,function(result){
            $('#display_dialog').html(result);
            $('#display_dialog').modal('show');
        })
    }
   function view_detail_pub(num){
        $.get("<?php echo base_url() ?>about/detail_pegawai/"+num,function(result){
            $('#display_dialog').html(result);
            $('#display_dialog').modal('show');
        })
    }

</script>

</head>
<body>
<div id="mainmenu">
    <div id="yw0" class="navbar navbar-fixed-top">
	<div class="navbar-inner">
	<div class="container">
<!--	    <div class="nav-collapse">-->
		<ul class="nav">
                    <li><a class="brand" href="<?php echo site_url();?>"><img src="assets/img/dephub-icon.png" /></a></li>
		    <li class="dropdown"><a data-toggle="dropdown" style="color:lightblue" class="dropdown-toggle" href="#">Manajemen Diklat<b class="caret"></b></a>
			<ul class="dropdown-menu">
                            <li><a href="<?php echo base_url('site/front/'.date('Y'))?>">Daftar Diklat</a></li>
                            <li><a href="<?php echo base_url('about/pengajar')?>">Daftar Pengajar</a></li>
                            <li><a href="<?php echo base_url()?>">Sarana Prasarana</a></li>
                            <li><a href="<?php echo base_url()?>">Asrama</a></li>
			</ul>
		    </li>
                    <li><a style="color:lightcoral" href="<?php echo base_url()?>elearning" class="">E-Learning</a></li>
                    <li><a style="color:lightgreen" href="<?php echo base_url()?>site/email">E-Mail</a></li>
<!--                    <li><a href="<?php echo base_url()?>">Manajemen Diklat</a></li>-->
		    <li><a style="color:lightskyblue" href="<?php echo base_url()?>elibrary">Library</a></li>
		    <li class="dropdown"><a data-toggle="dropdown" style="color:lightsalmon" class="dropdown-toggle" href="#">Profil<b class="caret"></b></a>
			<ul class="dropdown-menu">
                            <?php foreach($profil as $p){ ?>
                            <li><a href="<?php echo base_url()?>about/profil/<?php echo $p['id'] ?>"><?php echo $p['judul'] ?></a></li>
                            <?php } ?>
                            <li><a href="<?php echo base_url()?>about/pengajar">Daftar Pengajar</a></li>
			</ul>
		    </li>
		</ul>
	    <!--</div>-->
	</div>
	</div>
    </div>
</div>
<!-- mainmenu -->    
	<div class="container" id="content">
	    <?php echo $_header;?>
	    <br />
	    <div class="clear"></div>
	    <?php if(isset($_menu)){echo $_menu;}?>

	    <div class="clear"></div>
	    <div class="row">
                <div class="span12">
                    <h1 class="title-page"><?php if(isset($_title)){echo $_title;}?>
                        <?php if(!isset($sub_title)){echo '';}else{echo $sub_title;}?>
                    </h1>
                </div>
		<?php if(isset($_sidebar)){?>
                <div class="span3">
                    <?php echo $_sidebar;?>
                </div>
                <div class="span9">
                    <?php echo $_content;?>
                </div>
                <?php }else{?>
                <div class="span12">
                <?php echo $_content; ?>
                </div>
                <?php }?>
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