<script>
    $(document).ready(function() {
        $('#program').attr('class','');
        $('#program').change(function(){
            location.href="<?php echo base_url() ?>penyelenggaraan/peserta/list_peserta/"+$('#program').val();
        });
    } );
    
    function toggle(id_peserta,id_program,status){
        data = {
            'id_peserta' : id_peserta,
            'id_program' : id_program
        }
        $.post(
            "<?php echo base_url() ?>penyelenggaraan/peserta/toggle_status/"+status,
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
Diklat &nbsp;: <?php echo  form_dropdown('id_program',$pil_program,$id_program,'id="program"')?>
<table id="list" width="100%" class="table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th width="5%">No</th>
            <th width="25%">Nama</th>
            <th width="25%">NIP</th>
<!--            <th width="25%">Status</th>-->
<!--            <th width="20%">Aksi</th>-->
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
<!--            <td class="status">
                <span id="status<?php echo $list[$i]['id'] ?>" class="badge <?php if($list[$i]['status']!='accept'){echo 'badge-info';}else{echo 'badge-success';} ?>">
                    <?php echo $list[$i]['status']; ?>
                </span>
            </td>-->
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