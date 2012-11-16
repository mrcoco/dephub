<div id="yw0" class="subnav">
    <ul class="nav nav-pills">
        <?php if($this->session->userdata('id_role')==1){?>
        <li><a href="#">Home</a></li>
        <?php } ?>
        <li><a href="<?php echo base_url().'diklat'?>">Diklat</a></li>
        <?php if($this->session->userdata('id_role')==1||$this->session->userdata('id_role')==3){?>
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Materi<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="<?php echo base_url()?>materi">List Materi</a></li>
                <li><a href="<?php echo base_url()?>materi/tambah">Buat Materi</a></li>
            </ul>
        </li>
        <?php } ?>
        <?php if($this->session->userdata('id_role')==1){?>
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Pegawai<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="<?php echo base_url()?>pegawai">List Pegawai</a></li>
                <li><a href="<?php echo base_url()?>pegawai/tambah_pegawai">Tambah Pegawai</a></li>
            </ul>
        </li>
        <?php }?>
        <?php if($this->session->userdata('id_role')==1||$this->session->userdata('id_role')==2){?>
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Pembicara<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li class="nav-header">Pembicara Internal</li>
                <li><a href="<?php echo base_url()?>pembicara_int">Lihat Pembicara Internal</a></li>
                <li><a href="<?php echo base_url()?>pembicara_int/add_pembicara">Tambah Pembicara Internal</a></li>
                <li></li>
                <li class="nav-header">Dosen Tamu</li>
                <li><a href="<?php echo base_url()?>dosen_tamu">Lihat Dosen Tamu</a></li>
                <li><a href="<?php echo base_url()?>dosen_tamu/add_dosen">Tambah Dosen Tamu</a></li>
            </ul>
        </li>
        <?php } ?>
        <?php if($this->session->userdata('id_role')==1||$this->session->userdata('id_role')==4){?>
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Sarpras<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="<?php echo base_url()?>gedung">Gedung Asrama</a></li>
                <li><a href="<?php echo base_url()?>kamar">Kamar Asrama</a></li>
                <li><a href="<?php echo base_url()?>asrama">CheckList Asrama</a></li>
                <li><a href="<?php echo base_url()?>kelas">CheckList Kelas</a></li>
                <li><a href="#">Laporan</a></li>
            </ul>
        </li>
        <?php }?>
        <?php if($this->session->userdata('id_role')==1){?>
        <li class="dropdown""><a href="#" data-toggle="dropdown" class="dropdown-toggle">Settings <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="#">Profiles</a></li>
                <li><a href="#">Site Config</a></li>
                <li><a href="#">Simdik Info</a></li>
            </ul>
        </li>
        <?php } ?>
        <li class="pull-right">
            <a href="<?php echo base_url()?>site/logout">Logout</a>
        </li>
        <li class="pull-right">
            <a>Selamat datang, <?php echo $this->session->userdata('nama')?></a>
        </li>
    </ul>
</div>
