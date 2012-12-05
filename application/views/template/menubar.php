<div id="yw0" class="subnav">
    <ul class="nav nav-pills">
        <?php if($this->session->userdata('id_role')==1){?>
        <li><a href="#">Home</a></li>
        <?php } ?>
        <li><a href="<?php echo base_url().'diklat'?>">Diklat</a></li>
        <?php if($this->session->userdata('id_role')==1||$this->session->userdata('id_role')==3){?>
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Materi<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="<?php echo base_url()?>materi">Daftar Materi</a></li>
                <li><a href="<?php echo base_url()?>materi/tambah">Tambah Materi</a></li>
            </ul>
        </li>
        <?php } ?>
        <?php if($this->session->userdata('id_role')==1){?>
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Pegawai<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="<?php echo base_url()?>pegawai">Daftar Pegawai</a></li>
                <li><a href="<?php echo base_url()?>pegawai/tambah_pegawai">Tambah Pegawai</a></li>
            </ul>
        </li>
        <?php }?>
        <?php if($this->session->userdata('id_role')==1||$this->session->userdata('id_role')==2){?>
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Pengajar<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li class="nav-header">Widyaiswara dan Non WI</li>
                <li><a href="<?php echo base_url()?>pengajar_int">Daftar Widyaiswara dan Non WI</a></li>
                <li><a href="<?php echo base_url()?>pengajar_int/add_pengajar">Tambah Widyaiswara dan Non WI</a></li>
                <li></li>
                <li class="nav-header">Dosen Tamu</li>
                <li><a href="<?php echo base_url()?>dosen_tamu">Daftar Dosen Tamu</a></li>
                <li><a href="<?php echo base_url()?>dosen_tamu/add_dosen">Tambah Dosen Tamu</a></li>
            </ul>
        </li>
        <?php } ?>
        <?php if($this->session->userdata('id_role')==1||$this->session->userdata('id_role')==4){?>
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Sarpras<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li class="nav-header">Asrama</li>
                <li><a href="<?php echo base_url()?>gedung">Daftar Gedung</a></li>
                <li><a href="<?php echo base_url()?>kamar">Daftar Kamar</a></li>
                <li><a href="<?php echo base_url()?>asrama">Checklist Asrama</a></li>
                <li class="nav-header">Kelas</li>
                <li><a href="<?php echo base_url()?>kelas">Daftar Kelas</a></li>
                <li><a href="<?php echo base_url()?>kelas/checklist_kelas">Checklist Kelas</a></li>
<!--                <li><a href="#">Laporan</a></li>-->
            </ul>
        </li>
        <?php }?>
        <?php if($this->session->userdata('id_role')==1){?>
        <li class="dropdown""><a href="#" data-toggle="dropdown" class="dropdown-toggle">Settings <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="<?php echo base_url()?>settings/profil">List Profil</a></li>
                <li><a href="<?php echo base_url()?>setting/list_priviledge">Site Priviledge</a></li>
                <li><a href="<?php echo base_url()?>setting/info_pusbang">Simdik Info</a></li>
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
