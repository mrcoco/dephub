<div id="display_dialog" class="modal hide modal-wide"></div>
<table id="list" class="table table-striped table-bordered table-condensed">
    <thead>
        <th>No</th>
        <th>Nama</th>
        <th>NIP</th>
        <th>Jenis</th>
    </thead>
    <tbody>
        <?php $i=1 ?>
        <?php foreach($list as $l){?>
        <tr>
            <td><?php echo $i?></td>
            <td>
                <a href="javascript:view_detail(<?php echo $l['id'] ?>)" class="tip-right" title="Klik untuk detail">
                    <?php echo $l['nama']?>
                </a>
            </td>
            <td><?php echo $l['nip']?></td>
            <td><?php echo $l['jenis']==1?'Non Widyaiswara':'Widyaiwsara'?></td>
        </tr>
        <?php $i++?>
        <?php } ?>
    </tbody>
</table>
<div class="form-actions">
    <a href="<?php echo base_url()?>pembicara_int/add_pembicara" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Tambah</a>
</div>
