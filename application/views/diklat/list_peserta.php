<script>
    function toggle(id_peserta,id_program,status){
        data = {
            'id_peserta' : id_peserta,
            'id_program' : id_program
        }
        $.post(
            "<?php echo base_url() ?>diklat/ajax_toggle_status/"+status,
            data,
            function(){
                $('#status'+id_peserta).attr('class','badge badge-success');           
                $('#status'+id_peserta).html("accept");           
            }
        );
    }
</script>
<div class="row">
    <div class="span9"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
<table id="list" width="100%" class="table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th width="5%">No</th>
            <th width="25%">Nama</th>
            <th width="25%">NIP</th>
            <th width="45%">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php for($i=0;$i<count($list);$i++) {?>
        <tr class="peserta<?php echo $list[$i]['id'] ?>">
            <td class="no"><?php echo ($i+1) ?></td>
            <td class="nama"><?php echo $list[$i]['nama'] ?>
            </td>
            <td class="nip"><?php echo $list[$i]['nip'] ?></td>
            <td class="aksi">
                <div class="btn-group" data-toggle="buttons-radio">
                    <button class="btn <?php if($list[$i]['status']!='accept'&&$list[$i]['status']!='waiting') echo 'active'; ?>" onclick="toggle(<?php echo $list[$i]['id'].','.$list[$i]['id_program'] ?>,0)">Abaikan</button>
                    <button class="btn <?php if($list[$i]['status']=='accept') echo 'active'; ?>" onclick="toggle(<?php echo $list[$i]['id'].','.$list[$i]['id_program'] ?>,1)">Terima</button>
                    <button class="btn <?php if($list[$i]['status']=='waiting') echo 'active'; ?>" onclick="toggle(<?php echo $list[$i]['id'].','.$list[$i]['id_program'] ?>,2)">Waiting</button>
                </div>
            </td>
        <?php }?>
    </tbody>
</table>
<div class="form-actions">
    <a href="penyelenggaraan/peserta/registrasi" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Tambah</a>
</div>