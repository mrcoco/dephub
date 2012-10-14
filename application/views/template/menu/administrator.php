<div id="yw0" class="subnav">
    <ul class="nav nav-pills">
        <li class="<?php if($this->uri->segment(1)=='administrator' && $this->uri->segment(2)=='dashboard'){echo 'active';};?>"><a href="<?php echo $this->session->userdata('link');?>">Dashboard</a></li>
        <li class="dropdown <?php if($this->uri->segment(1)=='administrator' && ($this->uri->segment(2)=='profiles' || $this->uri->segment(2)=='config' || $this->uri->segment(2)=='info')){echo 'active';};?>"><a data-toggle="dropdown" class="dropdown-toggle" href="#">Pengaturan<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li class="<?php if($this->uri->segment(1)=='administrator' && $this->uri->segment(2)=='profiles'){echo 'active';};?>"><a href="administrator/profiles">Profiles</a></li>
                <li class="<?php if($this->uri->segment(1)=='administrator' && $this->uri->segment(2)=='config'){echo 'active';};?>"><a href="administrator/config">Site Configuration</a></li>
                <li class="<?php if($this->uri->segment(1)=='administrator' && $this->uri->segment(2)=='info'){echo 'active';};?>"><a href="administrator/info">Simdik Info</a></li>
            </ul>
        </li>
        <li class="dropdown <?php if($this->uri->segment(1)=='perencanaan' && ($this->uri->segment(2)=='diklat' || $this->uri->segment(2)=='schedule')){echo 'active';};?>"><a data-toggle="dropdown" class="dropdown-toggle" href="#">Diklat<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li class="<?php if($this->uri->segment(1)=='perencanaan' && $this->uri->segment(2)=='diklat' && $this->uri->segment(3)=='daftar_diklat'){echo 'active';};?>"><a href="perencanaan/diklat/daftar_diklat">Daftar Diklat</a></li>
                <li class="<?php if($this->uri->segment(1)=='perencanaan' && $this->uri->segment(2)=='diklat' && $this->uri->segment(3)=='buat_diklat'){echo 'active';};?>"><a href="perencanaan/diklat/buat_diklat">Tambah Diklat</a></li>
                <li class="<?php if($this->uri->segment(1)=='penyelenggaraan' && $this->uri->segment(2)=='schedule' && $this->uri->segment(3)==''){echo 'active';};?>"><a href="penyelenggaraan/schedule">Jadwal Diklat</a></li>
            </ul>
        </li>
        <li class="dropdown <?php if($this->uri->segment(1)=='penyelenggaraan' && $this->uri->segment(2)=='pegawai' && $this->uri->segment(3)==''){echo 'active';};?>"><a data-toggle="dropdown" class="dropdown-toggle" href="#">Pegawai<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li class="<?php if($this->uri->segment(1)=='penyelenggaraan' && $this->uri->segment(2)=='pegawai' && $this->uri->segment(3)=='list_pegawai'){echo 'active';};?>"><a href="penyelenggaraan/pegawai/list_pegawai">List Pegawai</a></li>
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
        <li class="dropdown <?php if($this->uri->segment(1)=='sarpras'){echo 'active';};?>"><a data-toggle="dropdown" class="dropdown-toggle" href="#">Sarpras<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li class="<?php if($this->uri->segment(1)=='sarpras' && $this->uri->segment(2)=='asrama'){echo 'active';};?>"><a href="sarpras/asrama">Asrama</a></li>
                <li class="<?php if($this->uri->segment(1)=='sarpras' && $this->uri->segment(2)=='kelas'){echo 'active';};?>"><a href="sarpras/kelas">Kelas</a></li>
                <li class="<?php if($this->uri->segment(1)=='sarpras' && $this->uri->segment(2)=='keluhan'){echo 'active';};?>"><a href="sarpras/keluhan">Laporan</a></li>
            </ul>
        </li>
        <li class="pull-right">
            <a href="login/logout">Logout</a>
        </li>
    </ul>
</div>
