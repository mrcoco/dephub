<div id="mainmenu">
    <div id="yw0" class="navbar">
	<div class="navbar-inner">
	<div class="container">
	    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	    </a>
	    <div class="nav-collapse">
		<ul class="nav">
		    <a class="brand" href="<?php echo $this->session->userdata('link');?>"><img src="assets/img/dephub-icon.png" /></a>
		    <li class="<?php if($this->uri->segment(1)=='administrator' && $this->uri->segment(2)=='dashboard'){echo 'active';};?>"><a href="<?php echo $this->session->userdata('link');?>">Dashboard</a></li>
		    <li class="<?php if($this->uri->segment(1)=='administrator' && $this->uri->segment(2)=='profiles'){echo 'active';};?>"><a href="administrator/profiles">Profiles</a></li>
		    <li class="<?php if($this->uri->segment(1)=='administrator' && $this->uri->segment(2)=='config'){echo 'active';};?>"><a href="administrator/config">Site Configuration</a></li>
		    <li class="<?php if($this->uri->segment(1)=='administrator' && $this->uri->segment(2)=='info'){echo 'active';};?>"><a href="administrator/info">Simdik Info</a></li>

		</ul>
		<ul class="nav pull-right">
		    <li class="dropdown <?php if($this->uri->segment(2)=='about'){echo 'active';};?>"><a data-toggle="dropdown" class="dropdown-toggle" href="#">Tentang PSDMAP <b class="caret"></b></a>
			<ul class="dropdown-menu">
			    <li class="<?php if($this->uri->segment(1)=='about' && $this->uri->segment(2)==''){echo 'active';};?>"><a href="about">Pusbang SDM</a></li>
			    <li class="<?php if($this->uri->segment(1)=='about' && $this->uri->segment(2)=='visi_misi'){echo 'active';};?>"><a href="about/visi_misi">Visi & Misi</a></li>
			    <li class="<?php if($this->uri->segment(1)=='about' && $this->uri->segment(2)=='struktur'){echo 'active';};?>"><a href="about/struktur">Struktur Organisasi</a></li>
			    <li class="<?php if($this->uri->segment(1)=='about' && $this->uri->segment(2)=='kontak'){echo 'active';};?>"><a href="about/kontak">Kontak</a></li>
			</ul>
		    </li>
		    <li class="divider-vertical"></li>
		    <li><a href="login/logout">Logout</a></li>
		</ul>
	    </div>
	</div>
	</div>
    </div>
</div>
<!-- mainmenu -->