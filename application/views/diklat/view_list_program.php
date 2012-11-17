<h2><?php echo $program['name'] ?></h2>
<ul>
<?php foreach($list_program as $id=>$name){?>
<li><a href="<?php echo base_url()?>program/view_program/<?php echo $id?>"><?php echo $name?></li>    
<?php }?>
</ul>
<div class="form-actions">
    <a href="program/buat_program/<?php echo $program['id'] ?>" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Buka program baru</a>
</div>