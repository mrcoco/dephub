<div class="row">
    <div class="span9"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
<div id="display_dialog" class="modal hide modal-wide"></div>
<h2><?php echo $diklat['name'] . ' Angkatan ' . $program['angkatan']; ?></h2>
<table id="list" width="100%" class="table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th width="5%">No</th>
            <th width="30%">Nama</th>
            <th width="15%">NIP</th>
            <th width="20%">Unit Kerja</th>
            <th width="15%">Status</th>
            <th width="15%">Kelulusan</th>
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
            <td class="nip"><?php echo $list[$i]['unit_kerja'] ?></td>
            <td class="aksi">
                <?php
                    echo $this->editor->status($list[$i]['status']);

                    $alumni=$this->slng->get_alumni($list[$i]['id_peserta'],$program['id']);
                    if($alumni){echo '&Lulus';}
                ?>
            </td>
            <td>
                <a href="javascript:kelulusan(<?php echo $list[$i]['id_peserta'].','.$program['id'] ?>)" class="btn btn-mini btn-primary">
                    <i class="icon-check icon-white"></i> Ubah
                </a>
                <a href="program/kelulusan_delete/<?php echo $list[$i]['id_peserta'].'/'.$program['id'] ?>" class="btn btn-mini btn-danger">
                    <i class="icon-remove icon-white"></i> Batal
                </a>
            </td>
        <?php }?>
    </tbody>
</table>
<?php if($list){?>
<div class="form-actions">
    <a class="btn btn-success" href="javascript:preview_peserta(<?php echo $program['id']?>)">Publish Daftar Panggilan</a>
    <a class="btn btn-success" href="<?php echo base_url()?>program/cetak_peserta_ang/<?php echo $program['id']?>">Cetak PDF</a>
</div>
<?php }else{ ?>
<p>Tidak ada yang mendaftar</p>
<?php }?>
<form action="<?php echo base_url()?>program/publish_daftar_peserta" method="post" class="form-horizontal">
<div id="preview_dialog" class="modal hide modal-wide"></div>
</form>
<form action="<?php echo base_url()?>program/kelulusan" method="post" class="form-horizontal" enctype="multipart/form-data">
<div id="lulus_dialog" class="modal hide"></div>
</form>
<script>
    function preview_peserta(num){
        $.get("<?php echo base_url() ?>program/ajax_daftar_peserta/"+num,function(result){
            $('#preview_dialog').html(result);
            $('#preview_dialog').modal('show');
        })
    }
    function kelulusan(num,pro){
        $.get("<?php echo base_url() ?>program/ajax_kelulusan/"+num+"/"+pro,function(result){
            $('#lulus_dialog').html(result);
            $('#lulus_dialog').modal('show');
        })
    }
</script>