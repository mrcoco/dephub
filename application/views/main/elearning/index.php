<script type="text/javascript" src="assets/js/bootstrap-carousel.js"></script>
<div class="row">
    <div class="span9">
	<div id="myCarousel" class="carousel slide">
	    <!-- Carousel items -->
	    <div class="carousel-inner">
		<div class="active item">
		    <img src="assets/img/bootstrap-mdo-sfmoma-01.jpg" />
		    <div class="carousel-caption">
			<h4>Second Thumbnail label</h4>
			<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
		    </div>
		</div>
		<div class="item">
		    <img src="assets/img/bootstrap-mdo-sfmoma-02.jpg" />
		    <div class="carousel-caption">
			<h4>Second Thumbnail label</h4>
			<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
		    </div>
		</div>
		<div class="item">
		    <img src="assets/img/bootstrap-mdo-sfmoma-03.jpg" />
		    <div class="carousel-caption">
			<h4>Second Thumbnail label</h4>
			<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
		    </div>
		</div>
	    </div>
	    <!-- Carousel nav -->
	    <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
	    <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
	</div>
	<?php echo $content;?>
    </div>
    <div class="span3">
	<div class="well">
	    <h4>PENCARIAN</h4>
	    <hr />
	    <?php echo form_open('elearning/course/search.php');?>
	    <div class="input-prepend">
		<span class="add-on"><i class="icon-search"></i></span><input class="span2" id="prependedInput" size="17" type="text" placeholder="Pencarian Diklat" name="search"/>
	    </div>
	    <input type="submit" class="btn" value="Search"/>
	    <?php echo form_close();?>
	</div>
	<div class="well">
	    <h4>LOGIN</h4>
	    <hr />
	    <?php echo form_open('elearning/login/index.php');?>
	    <input type="text" name="username" placeholder="Username" style="width:170px" />
	    <input type="password" name="password" placeholder="Password" style="width:170px" />
	    <input type="submit" class="btn btn-primary" name="submit" value="Login" />
	    <input type="hidden" name="testcookies" value="1" />
	    <?php echo form_close();?>
	    <?php echo $this->session->flashdata('msg')?>
	</div>
	<div class="well">
	    <h4>REGISTRASI</h4>
	    <hr />
	    <p>Untuk melakukan registrasi silakan klik tombol berikut <br /><a href="site/dashboard/registrasi/" class="btn btn-success">Registrasi</a></p>
	</div>
	<div class="well program">
	    <h4>PROGRAM DIKLAT</h4>
	    <hr />
	    <ol>
		<?php echo $program_diklat;?>
	    </ol>
	</div>
    </div>
</div>
<script type="text/javascript">
    $('.carousel').carousel({
	interval: 2000
    })
</script>