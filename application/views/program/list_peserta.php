<div class="row">
    <div class="span9"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
<div id="display_dialog" class="modal hide modal-wide"></div>
<table id="list" width="100%" class="table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th width="5%">No</th>
            <th width="45%">Nama</th>
            <th width="15%">NIP</th>
            <th width="25%">Status</th>
        </tr>
    </thead>
    <tbody>
        <?php for($i=0;$i<count($list);$i++) {?>
        <tr class="peserta<?php echo $list[$i]['id'] ?>">
            <td class="no"><?php echo ($i+1) ?></td>
            <td class="nama">
                <a href="javascript:view_detail(<?php echo $list[$i]['id_peserta'] ?>)" class="tip-right" title="Klik untuk detail">
                    <?php echo $list[$i]['nama'] ?>
                </a>
            </td>
            <td class="nip"><?php echo $list[$i]['nip'] ?></td>
            <td class="aksi">
                <?php echo $this->editor->status($list[$i]['status'])?>
            </td>
        <?php }?>
    </tbody>
</table>
<div class="form-actions">
    <a class="btn btn-success" href="<?php echo base_url()?>program/cetak_peserta_ang/<?php echo $program['id']?>">Cetak PDF</a>
</div>