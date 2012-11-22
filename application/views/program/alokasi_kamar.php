<div class="row">
    <div class="span9"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
<table id="list" width="100%" class="table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th width="5%">No</th>
            <th width="45%">Nama</th>
            <th width="15%">NIP</th>
            <th width="10%">Jenis Kelamin</th>
            <th width="15%">Kamar</th>
        </tr>
    </thead>
    <tbody>
        <?php for($i=0;$i<count($list);$i++) {?>
        <tr class="peserta<?php echo $list[$i]['id_peserta'] ?>">
            <td class="no"><?php echo ($i+1) ?></td>
            <td class="nama"><?php echo $list[$i]['nama'] ?>
            </td>
            <td class="nip"><?php echo $list[$i]['nip'] ?></td>
            <td class="nip"><?php echo $list[$i]['jenis_kelamin'] ?></td>
            <td class="aksi">
                <?php if(array_key_exists($list[$i]['id_peserta'], $kamar)){
                        echo $kamar[$list[$i]['id_peserta']];
                    }else{
                        echo '-';
                    }
                ?>
            </td>
        <?php }?>
    </tbody>
</table>
<div class="form-actions">
    <a class="btn btn-success" href="<?php echo base_url()?>program/alokasi_kamar_process/<?php echo $program['id']?>">Alokasi Kamar</a>
</div>
