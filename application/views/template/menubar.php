<div id="yw0" class="subnav">
    <ul class="nav nav-pills">
        <?php $all_role=$this->db->select('id')->get('list_role')->result_array();?>
        <?php $role=array(); foreach($all_role as $ar){$role[]=$ar['id'];} ?>
        <?php // if($this->session->userdata('id_role')==1){?>
        <li><a href="<?php echo base_url() ?>">Home</a></li>
        <?php // } ?>
        <?php if($this->session->userdata('id_role')!=''):?>
        <?php if($this->session->userdata('id_role')<=3){?>
        <li><a href="<?php echo base_url().'diklat'?>">Diklat</a></li>
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Materi<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="<?php echo base_url()?>materi">Daftar Materi</a></li>
                <li><a href="<?php echo base_url()?>materi/tambah">Tambah Materi</a></li>
            </ul>
        </li>
        <?php } ?>
        <?php if($this->session->userdata('id_role')<4){?>
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
        <li><a href="<?php echo base_url()?>feedback">Evaluasi</a></li>
        <?php } ?>
        <?php if($this->session->userdata('id_role')==1||$this->session->userdata('id_role')==4){?>
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Sarpras<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li class="nav-header">Asrama</li>
                <li><a href="<?php echo base_url()?>gedung">Daftar Gedung</a></li>
                <li><a href="<?php echo base_url()?>kamar">Daftar Kamar</a></li>
                <li><a href="<?php echo base_url()?>kamar_item">Daftar Prasarana Kamar</a></li>
                <li><a href="<?php echo base_url()?>asrama/list_asrama">Checklist Prasarana Asrama</a></li>
                <li><a href="<?php echo base_url()?>asrama">Status Prasarana Asrama</a></li>
                <li class="nav-header">Kelas</li>
                <li><a href="<?php echo base_url()?>kelas">Daftar Ruang Kelas</a></li>
                <li><a href="<?php echo base_url()?>kelas/checklist_kelas">Checklist Prasarana Kelas</a></li>
<!--                <li><a href="#">Laporan</a></li>-->
            </ul>
        </li>
        <?php }?>
        <?php if($this->session->userdata('id_role')==1||$this->session->userdata('id_role')==5){?>
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Pegawai<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="<?php echo base_url()?>pegawai">Daftar Pegawai</a></li>
                <li><a href="<?php echo base_url()?>pegawai/tambah_pegawai">Tambah Pegawai</a></li>
            </ul>
        </li>
        <li class="dropdown""><a href="#" data-toggle="dropdown" class="dropdown-toggle">Organisasi <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="<?php echo base_url()?>settings/profil">Profil Organisasi</a></li>
                <li><a href="<?php echo base_url()?>dephub_unit">Unit Kerja</a></li>
                <li><a href="<?php echo base_url()?>dephub_inst">Instansi</a></li>
            </ul>
        </li>
        <?php } ?>
        <?php if($this->session->userdata('id_role')==1){?>
        <li class="dropdown""><a href="#" data-toggle="dropdown" class="dropdown-toggle">Pengguna <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="<?php echo base_url()?>user">Daftar Pengguna</a></li>
                <li><a href="<?php echo base_url()?>user/manage_user">Kelola Pengguna</a></li>
            </ul>
        </li>
        <li><a href="<?php echo base_url()?>berita">Berita</a></li>
        <?php } ?>
        <?php endif; ?>
        <li class="pull-right">
            <a href="<?php echo base_url()?>site/logout"><i class="icon-off"></i> Logout</a>
        </li>
        <li class="pull-right">
            <a class="tip" title="klik untuk ubah profil" href="<?php echo base_url('user/edit_user')?>">
                <?php $user_role=$this->db->get_where('list_role',array('id'=>$this->session->userdata('id_role')))->row_array(); ?>
                <i class="icon-user"></i> <?php echo $this->session->userdata('nama'); if($user_role){echo ' ('.ucfirst($user_role['nama']).')';} ?>
            </a>
        </li>
    </ul>
</div>
