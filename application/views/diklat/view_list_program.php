<ul>
<?php foreach($list_program as $id=>$name){?>
<li><a href="<?php echo base_url()?>program/view_program/<?php echo $id?>"><?php echo $name?></li>    
<?php }?>
</ul>