<script>
    $(document).ready(function() {
        $('#list').dataTable();
        $('select').attr('class','input-mini');
        $('#program').attr('class','');
        $('#program').change(function(){
            location.href="<?php echo base_url() ?>penyelenggaraan/peserta/list_peserta/"+$('#program').val();
        });
    } );
    
    function accept(id_peserta,id_program){
        data = {
            'id_peserta' : id_peserta,
            'id_program' : id_program
        }
        $.post(
            "<?php echo base_url() ?>penyelenggaraan/peserta/toggle_status/accept",
            data,
            function(){
                $('#status'+id_peserta).attr('class','badge badge-success');           
                $('#status'+id_peserta).html("accept");           
            }
        );
    }
    function cancel(id_peserta,id_program){
        data = {
            'id_peserta' : id_peserta,
            'id_program' : id_program
        }
        $.post(
            "<?php echo base_url() ?>penyelenggaraan/peserta/toggle_status/cancel",
            data,
            function(){
                $('#status'+id_peserta).attr('class','badge badge-info');           
                $('#status'+id_peserta).html("daftar");           
            }
        );
    }
</script>
<div class="row">
    <div class="span12"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
Filter program : <?php echo  form_dropdown('id_program',$pil_program,$id_program,'id="program"')?>
<table id="list" width="100%" class="table">
    <thead>
        <tr>
            <th width="5%">No</th>
            <th width="25%">Nama</th>
            <th width="25%">NIP</th>
            <th width="25%">Status</th>
            <th width="20%">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php for($i=0;$i<count($list);$i++) {?>
        <tr class="peserta<?php echo $list[$i]['id'] ?>">
            <td class="no"><?php echo ($i+1) ?></td>
            <td class="nama"><?php echo $list[$i]['nama'] ?>
            </td>
            <td class="nip"><?php echo $list[$i]['nip'] ?></td>
            <td class="status">
                <span id="status<?php echo $list[$i]['id'] ?>" class="badge <?php if($list[$i]['status']!='accept'){echo 'badge-info';}else{echo 'badge-success';} ?>">
                    <?php echo $list[$i]['status']; ?>
                </span>
            </td>
            <td class="aksi">
                <div class="btn-group" data-toggle="buttons-radio">
                    <button class="btn <?php if($list[$i]['status']!='accept') echo 'active'; ?>" onclick="cancel(<?php echo $list[$i]['id'].','.$list[$i]['id_program'] ?>)">Daftar</button>
                    <button class="btn <?php if($list[$i]['status']=='accept') echo 'active'; ?>" onclick="accept(<?php echo $list[$i]['id'].','.$list[$i]['id_program'] ?>)">Terima</button>
                </div>
            </td>
        <?php }?>
    </tbody>
</table>
<div class="form-actions">
    <a href="penyelenggaraan/peserta/registrasi" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Tambah Peserta</a>
</div>