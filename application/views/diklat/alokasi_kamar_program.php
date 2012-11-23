<h2><?php echo $program['name'] ?></h2>
<?php if(isset($list_program)){ ?>
<ul>
<?php foreach($list_program as $id=>$name){?>
<li><a href="<?php echo base_url()?>program/alokasi_kamar/<?php echo $id?>"><?php echo $name?></li>    
<?php }?>
</ul>
<?php }else{?>
Tidak ada program dibuka
<?php } ?>