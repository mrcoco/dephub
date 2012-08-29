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
		    <a class="brand" href="#"><img src="assets/img/dephub-icon.png" /></a>
                    <li class="<?php if($this->uri->segment(1)=='perencanaan' && $this->uri->segment(2)=='dashboard' && $this->uri->segment(3)==''){echo 'active';};?>"><a href="perencanaan/dashboard">Dashboard</a></li>
                    <li class="dropdown <?php if($this->uri->segment(1)=='perencanaan' && $this->uri->segment(2)=='diklat'){echo 'active';};?>"><a data-toggle="dropdown" class="dropdown-toggle" href="#">Diklat<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="<?php if($this->uri->segment(1)=='perencanaan' && $this->uri->segment(2)=='diklat' && $this->uri->segment(3)=='daftar_diklat'){echo 'active';};?>"><a href="perencanaan/diklat/daftar_diklat">Daftar Diklat</a></li>
                            <li class="<?php if($this->uri->segment(1)=='perencanaan' && $this->uri->segment(2)=='diklat' && $this->uri->segment(3)=='buat_diklat'){echo 'active';};?>"><a href="perencanaan/diklat/buat_diklat">Tambah Diklat</a></li>
                        </ul>
                    </li>
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