<div id="yw0" class="subnav">
    <ul class="nav nav-pills">
        <li><a href="sarpras/dashboard">Halaman Utama</a></li>
        <li class="<?php if($this->uri->segment(1)=='sarpras' && $this->uri->segment(2)=='asrama'){echo 'active';};?>"><a href="sarpras/asrama">Asrama</a></li>
        <li class="<?php if($this->uri->segment(1)=='sarpras' && $this->uri->segment(2)=='kelas'){echo 'active';};?>"><a href="sarpras/kelas">Kelas</a></li>
        <li class="<?php if($this->uri->segment(1)=='sarpras' && $this->uri->segment(2)=='keluhan'){echo 'active';};?>"><a href="sarpras/keluhan">Laporan</a></li>
        <li class="pull-right">
            <a href="login/logout">Logout</a>
        </li>
    </ul>

</div>