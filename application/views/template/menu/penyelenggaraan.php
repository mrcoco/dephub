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
                    <li class="<?php if($this->uri->segment(1)=='penyelenggaraan' && $this->uri->segment(2)=='dashboard' && $this->uri->segment(3)==''){echo 'active';};?>"><a href="penyelenggaraan/dashboard">Dashboard</a></li>
                    <li class="<?php if($this->uri->segment(1)=='penyelenggaraan' && $this->uri->segment(2)=='schedule' && $this->uri->segment(3)==''){echo 'active';};?>"><a href="penyelenggaraan/schedule">Jadwal Diklat</a></li>
                    <li class="dropdown <?php if($this->uri->segment(1)=='penyelenggaraan' && $this->uri->segment(2)=='pegawai' && $this->uri->segment(3)==''){echo 'active';};?>"><a data-toggle="dropdown" class="dropdown-toggle" href="#">Daftar Pegawai<b class="caret"></b></a>
			<ul class="dropdown-menu">
                            <li class="<?php if($this->uri->segment(1)=='penyelenggaraan' && $this->uri->segment(2)=='pegawai' && $this->uri->segment(3)=='list_pegawai'){echo 'active';};?>"><a href="penyelenggaraan/pegawai/list_pegawai_awal">List Pegawai</a></li>
                            <li class="<?php if($this->uri->segment(1)=='penyelenggaraan' && $this->uri->segment(2)=='pegawai' && $this->uri->segment(3)=='tambah_pegawai'){echo 'active';};?>"><a href="penyelenggaraan/pegawai/tambah_pegawai">Tambah Pegawai</a></li>
                        </ul>
                    </li>
                    <li class="dropdown <?php if($this->uri->segment(1)=='penyelenggaraan' && $this->uri->segment(2)=='dosen_tamu'){echo 'active';};?>"><a data-toggle="dropdown" class="dropdown-toggle" href="#">Pembicara<b class="caret"></b></a>
			<ul class="dropdown-menu">
                            <li class="nav-header">Pembicara Internal</li>
                            <li class="<?php if($this->uri->segment(1)=='penyelenggaraan' && $this->uri->segment(2)=='pembicara_int' && $this->uri->segment(3)=='list_pembicara'){echo 'active';};?>"><a href="penyelenggaraan/pembicara_int/list_pembicara">Lihat Pembicara Internal</a></li>
                            <li class="<?php if($this->uri->segment(1)=='penyelenggaraan' && $this->uri->segment(2)=='pembicara_int' && $this->uri->segment(3)=='add_pembicara'){echo 'active';};?>"><a href="penyelenggaraan/pembicara_int/add_pembicara">Tambah Pembicara Internal</a></li>
                            <li class="divider"></li>
                            <li class="nav-header">Dosen Tamu</li>
                            <li class="<?php if($this->uri->segment(1)=='penyelenggaraan' && $this->uri->segment(2)=='dosen_tamu' && $this->uri->segment(3)=='list_dosen'){echo 'active';};?>"><a href="penyelenggaraan/dosen_tamu/list_dosen">Lihat Dosen Tamu</a></li>
                            <li class="<?php if($this->uri->segment(1)=='penyelenggaraan' && $this->uri->segment(2)=='dosen_tamu' && $this->uri->segment(3)=='add_dosen'){echo 'active';};?>"><a href="penyelenggaraan/dosen_tamu/add_dosen">Tambah Dosen Tamu</a></li>
                        </ul>
                    </li>
                    <li class="dropdown <?php if($this->uri->segment(1)=='penyelenggaraan' && $this->uri->segment(2)=='peserta' ){echo 'active';};?>"><a data-toggle="dropdown" class="dropdown-toggle" href="#">Peserta<b class="caret"></b></a>
			<ul class="dropdown-menu">
                            <li class="<?php if($this->uri->segment(1)=='penyelenggaraan' && $this->uri->segment(2)=='peserta' && $this->uri->segment(3)=='list_peserta'){echo 'active';};?>"><a href="penyelenggaraan/peserta/list_peserta">List Peserta</a></li>
                            <li class="<?php if($this->uri->segment(1)=='penyelenggaraan' && $this->uri->segment(2)=='peserta' && $this->uri->segment(3)=='registrasi'){echo 'active';};?>"><a href="penyelenggaraan/peserta/registrasi">Tambah Peserta</a></li>
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