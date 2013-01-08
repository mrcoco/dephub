<div id="yw0" class="subnav">
    <ul class="nav nav-pills">
        <li><a href="<?php echo base_url()?>unit/front/list_pendaftar">Pendaftar</a></li>
        <li><a href="<?php echo base_url()?>unit/front/pil_registrasi">Registrasi</a></li>
        <li class="pull-right">
            <a href="<?php echo base_url()?>unit/front/logout"><i class="icon-off"></i> Logout</a>
        </li>
        <li class="pull-right">
            <a>Login sebagai <?php echo $this->session->userdata('nama_unit')?></a>
        </li>
    </ul>
</div>
