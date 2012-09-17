<div id="yw0" class="subnav">
    <ul class="nav nav-pills">
        <li class="<?php if($this->uri->segment(1)=='penyelenggaraan' && $this->uri->segment(2)=='dashboard' && $this->uri->segment(3)==''){echo 'active';};?>"><a href="penyelenggaraan/dashboard">Dashboard</a></li>
        <li class="<?php if($this->uri->segment(1)=='penyelenggaraan' && $this->uri->segment(2)=='schedule' && $this->uri->segment(3)==''){echo 'active';};?>"><a href="penyelenggaraan/schedule">Jadwal Diklat</a></li>
        <li class="<?php if($this->uri->segment(1)=='penyelenggaraan' && $this->uri->segment(2)=='pegawai' && $this->uri->segment(3)==''){echo 'active';};?>"><a href="penyelenggaraan/pegawai">Daftar Pegawai</a></li>
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
        <li class="pull-right">
            <a href="login/logout">Logout</a>
        </li>
    </ul>
</div>
