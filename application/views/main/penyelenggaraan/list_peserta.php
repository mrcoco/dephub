<script>
    $(document).ready(function() {
        $('#list').dataTable();
        $('select').attr('class','input-mini');
        $('#program').attr('class','');
        $('#program').change(function(){
            location.href="<?php echo base_url() ?>penyelenggaraan/dashboard/list_peserta/"+$('#program').val();
        });
    } );
    
    function accept(id_peserta,id_program){
        data = {
            'id_peserta' : id_peserta,
            'id_program' : id_program
        }
        $.post(
            "<?php echo base_url() ?>penyelenggaraan/dashboard/toggle_status/accept",
            data,
            function(){
                $('.peserta'+id_peserta+' > .status').text("accept");
                $('.peserta'+id_peserta+' > .aksi').empty();
                $('.peserta'+id_peserta+' > .aksi').append('<a href="javascript:cancel('+id_peserta+','+id_program+')">Cancel</a>');
            }
        );
    }
    function cancel(id_peserta,id_program){
        data = {
            'id_peserta' : id_peserta,
            'id_program' : id_program
        }
        $.post(
            "<?php echo base_url() ?>penyelenggaraan/dashboard/toggle_status/cancel",
            data,
            function(){
                $('.peserta'+id_peserta+' > .status').text("daftar");
                $('.peserta'+id_peserta+' > .aksi').empty();
                $('.peserta'+id_peserta+' > .aksi').append('<a href="javascript:accept('+id_peserta+','+id_program+')">Accept</a>');
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
            <td class="nama"><?php echo $list[$i]['nama'] ?></td>
            <td class="nip"><?php echo $list[$i]['nip'] ?></td>
            <td class="status"><?php echo $list[$i]['status'] ?></td>
            <td class="aksi">
                <?php if($list[$i]['status']!='accept'){ ?>
                    <a href="javascript:accept(<?php echo $list[$i]['id'].','.$list[$i]['id_program'] ?>)">Accept</a>
                <?php }else{ ?>
                    <a href="javascript:cancel(<?php echo $list[$i]['id'].','.$list[$i]['id_program'] ?>)">Cancel</a>
                <?php } ?>
            </td>
        <?php }?>
    </tbody>
</table>
<div class="form-actions">
    <a href="penyelenggaraan/dashboard/registrasi" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Tambah Peserta</a>
</div>