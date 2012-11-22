<?php $t=$this->uri->segment(3); ?>
<div class="row-fluid">
    <div class="span9">
        <?php echo $about['isi'] ?>
    </div>
    <div class="span3">
        <div class="well sidemenu">
            <ul class="nav nav-list">
                <li class="nav-header">Profil</li>
                <?php foreach($profil as $p){ ?>
                <li <?php if($t==$p['id'])echo 'class="active"' ?>>
                    <a href="<?php echo base_url()?>about/profil/<?php echo $p['id']?>"><i class="icon icon-chevron-right"></i> <?php echo $p['judul']?></a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>