<div id="yw0" class="subnav">
    <ul class="nav nav-pills">
        <li class="<?php if($this->uri->segment(1)=='perencanaan' && $this->uri->segment(2)=='dashboard' && $this->uri->segment(3)==''){echo 'active';};?>"><a href="perencanaan/dashboard">Dashboard</a></li>
        <li class="dropdown <?php if($this->uri->segment(1)=='perencanaan' && $this->uri->segment(2)=='diklat'){echo 'active';};?>"><a data-toggle="dropdown" class="dropdown-toggle" href="#">Diklat<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li class="<?php if($this->uri->segment(1)=='perencanaan' && $this->uri->segment(2)=='diklat' && $this->uri->segment(3)=='daftar_diklat'){echo 'active';};?>"><a href="perencanaan/diklat/daftar_diklat">Daftar Diklat</a></li>
                <li class="<?php if($this->uri->segment(1)=='perencanaan' && $this->uri->segment(2)=='diklat' && $this->uri->segment(3)=='buat_diklat'){echo 'active';};?>"><a href="perencanaan/diklat/buat_diklat">Tambah Diklat</a></li>
            </ul>
        </li>
        <li class="pull-right">
            <a href="login/logout">Logout</a>
        </li>
    </ul>
</div>
