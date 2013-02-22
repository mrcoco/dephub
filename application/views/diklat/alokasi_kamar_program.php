<h2><?php echo $program['name'] ?></h2>
        <p>Pilih tahun: 
        <?php foreach($thn_program as $th){ ?>
            <?php if(checkdate(1,1,$th['tahun_program'])){?>
            <a href="<?php echo base_url()?>diklat/alokasi_kamar_program/<?php echo $program['id']?>/<?php echo $th['tahun_program'] ?>"><?php echo $th['tahun_program'] ?></a> | 
            <?php } ?>
        <?php } ?>
        </p>
<?php if(isset($list_program)){ ?>
<ul>
<?php foreach($list_program as $id=>$name){?>
<li><a class="tip-right" title="pilih program ini" href="<?php echo base_url()?>program/alokasi_kamar/<?php echo $id?>"><?php echo $name?></li>    
<?php }?>
</ul>
<?php }else{?>
Tidak ada program dibuka
<?php } ?>