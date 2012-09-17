<div id="yw0" class="subnav">
    <ul class="nav nav-pills">
        <li class="<?php if($this->uri->segment(1)=='administrator' && $this->uri->segment(2)=='dashboard'){echo 'active';};?>"><a href="<?php echo $this->session->userdata('link');?>">Dashboard</a></li>
        <li class="<?php if($this->uri->segment(1)=='administrator' && $this->uri->segment(2)=='profiles'){echo 'active';};?>"><a href="administrator/profiles">Profiles</a></li>
        <li class="<?php if($this->uri->segment(1)=='administrator' && $this->uri->segment(2)=='config'){echo 'active';};?>"><a href="administrator/config">Site Configuration</a></li>
        <li class="<?php if($this->uri->segment(1)=='administrator' && $this->uri->segment(2)=='info'){echo 'active';};?>"><a href="administrator/info">Simdik Info</a></li>
        <li class="pull-right">
            <a href="login/logout">Logout</a>
        </li>
    </ul>
</div>
