<h2><?php echo $program['name'] ?></h2>
<?php if(isset($list_program)){ ?>
<ul>
<?php foreach($list_program as $id=>$name){?>
<li><a class="tip-right" title="klik untuk detail" href="<?php echo base_url()?>program/view_program/<?php echo $id?>"><?php echo $name?></li>    
<?php }?>
</ul>
<?php }else{?>
Tidak ada program dibuka
<?php } ?>
<div class="form-actions">
    <a href="program/buat_program/<?php echo $program['id'] ?>" class="btn btn-primary">
        <i class="icon-plus-sign icon-white"></i> Buka program baru
    </a>
</div>