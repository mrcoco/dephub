<h2><?php echo $program['name'] ?></h2>
<?php if(isset($list_program)){ ?>
<ul>
<?php foreach($list_program as $id=>$name){?>
<li><a class="tip-right" title="pilih program ini" href="<?php echo base_url()?>program/alokasi_kamar/<?php echo $id?>"><?php echo $name?></li>    
<?php }?>
</ul>
<?php }else{?>
Tidak ada program dibuka
<?php } ?>