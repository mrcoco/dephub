<?php $pil = array(-1 => '-- Pilih --', 1 => 'non widyaiswara', 2 => 'widyaiswara', 3 => 'dosen tamu') ?>
<?php if(count($qry_pemateri)>0){?>
<?php for($i=0;$i<count($qry_pemateri);$i++){ ?>
<?php $q=$qry_pemateri[$i]?>
<tr class="tr_widyaiswara">
    <td>Pengajar</td>
    <?php if($i<count($qry_pemateri)-1) {?>
    <td>: <input type="text" class="nama_pmbcr" name="nama_pmbcr" value="<?php echo $q['nama']?>"/><input type="hidden" name="id_pmbcr[]" value="<?php echo $q['id_pembicara']?>"/> <span class="del_pmbcr btn btn-mini btn-danger">Hapus</span></td>
    <?php } else {?>
    <td>: <input type="text" class="nama_pmbcr" name="nama_pmbcr" value="<?php echo $q['nama']?>"/><input type="hidden" name="id_pmbcr[]" value="<?php echo $q['id_pembicara']?>"/> <span class="add_pmbcr btn btn-mini"><i class="icon-plus"></i>Tambah</span></td>
    <?php } ?>
</tr>
<?php }?>
<?php } else {?>
    <tr class="tr_widyaiswara">
        <td>Pengajar</td>
        <td>: <input type="text" class="nama_pmbcr" name="nama_pmbcr"/><input type="hidden" name="id_pmbcr[]"/> <span class="add_pmbcr btn btn-mini"><i class="icon-plus"></i>Tambah</span></td>
    </tr>
<?php } ?>
<?php if(count($qry_pendamping)>0){?>
<?php for($i=0;$i<count($qry_pendamping);$i++){?>
    <tr class="tr_widyaiswara">
        <td>Pendamping</td>
        <?php if($i<count($qry_pendamping)-1) {?>
        <td>: <input class="nama_pndmpng" type="text" name="pendamping[]" value="<?php echo $qry_pendamping[$i]['nama']?>"/> <span class="del_pndmpng btn btn-mini btn-danger">Hapus</span></td>
        <?php } else { ?>
        <td>: <input class="nama_pndmpng" type="text" name="pendamping[]" value="<?php echo $qry_pendamping[$i]['nama']?>"/> <span class="add_pndmpng btn btn-mini"><i class="icon-plus"></i>Tambah</span></td>
        <?php } ?>
    </tr>
<?php } ?>
<?php } else {?>
    <tr class="tr_widyaiswara">
        <td>Pendamping</td>
        <td>: <input class="nama_pndmpng" type="text" name="pendamping[]"/> <span class="add_pndmpng btn btn-mini"><i class="icon-plus"></i>Tambah</span></td>
    </tr>
<?php } ?>

