<div id="yw0" class="subnav">
    <ul class="nav nav-pills">
        <li><a href="<?php echo base_url()?>wid/front/info_pengajar">Info Pengajar</a></li>
        <?php if($this->session->userdata('id_jenis')==3){ ?>
        <li><a href="<?php echo base_url()?>wid/front/detail_dosen">Data Pribadi</a></li>
        <?php }else{ ?>
        <li><a href="<?php echo base_url()?>wid/front/detail_pegawai">Data Pribadi</a></li>
        <?php } ?>
        <li><a href="<?php echo base_url()?>wid/front/schedule_pengajar">Jadwal Pengajar</a></li>
        <li><a href="<?php echo base_url()?>wid/nilai">Penilaian</a></li>
        <li class="pull-right">
            <a href="<?php echo base_url()?>wid/front/logout"><i class="icon-off"></i> Logout</a>
        </li>
        <li class="pull-right">
            <a><i class="icon-user"></i> <?php echo $this->session->userdata('nama_wid')?> (pengajar)</a>
        </li>
    </ul>
</div>
