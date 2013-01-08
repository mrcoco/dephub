<div id="yw0" class="subnav">
    <ul class="nav nav-pills">
        <li><a href="<?php echo base_url()?>pes/front/info_peserta">Info Peserta</a></li>
        <li><a href="<?php echo base_url()?>pes/front/detail_peserta">Data Pribadi</a></li>
        <li class="pull-right">
            <a href="<?php echo base_url()?>pes/front/logout"><i class="icon-off"></i> Logout</a>
        </li>
        <li class="pull-right">
            <a><i class="icon-user"></i> <?php echo $this->session->userdata('nama_pes')?> (peserta)</a>
        </li>
    </ul>
</div>
