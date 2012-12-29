<div id="yw0" class="subnav">
    <ul class="nav nav-pills">
        <li><a href="<?php echo base_url()?>wid/front/info_pengajar">Info Pengajar</a></li>
        <!--<li><a href="<?php echo base_url()?>wid/front/detail_pengajar">Data Pribadi</a></li>-->
        <li><a href="<?php echo base_url()?>wid/front/schedule_pengajar">Jadwal Pengajar</a></li>
        <li class="pull-right">
            <a href="<?php echo base_url()?>wid/front/logout">Logout</a>
        </li>
        <li class="pull-right">
            <a>Login sebagai <?php echo $this->session->userdata('nama_wid')?></a>
        </li>
    </ul>
</div>
