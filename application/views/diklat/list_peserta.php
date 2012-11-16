<script>
    function toggle(item,id_peserta,id_diklat,status){
        data = {'id_peserta' : id_peserta, 'id_diklat' : id_diklat}
        $.post(
            "<?php echo base_url() ?>diklat/ajax_toggle_status/"+status,
            data,
            function(data){
                $('#status'+id_peserta).attr('class','badge badge-success');           
                $('#status'+id_peserta).html("accept");
                if(status==1){
                    $(item).siblings('#dropdown').removeClass('hide');
                }else{
                    $(item).siblings('#dropdown').addClass('hide');
                }
            }
        );
    }
    
    function update_angkatan(item,id_peserta,id_diklat,status){
        data = {'max_peserta' : <?php echo $program['jumlah_peserta'] ?>,'id_peserta' : id_peserta, 'id_diklat' : id_diklat, 'id_program' : $(item).val()}
        $.post("<?php echo base_url() ?>diklat/ajax_update_angkatan",data,function(res){
            if(! res){
                $(item).val(-1);
                alert('Program sudah penuh');
            }
        });
    }
    
    function alokasi_kamar(){
        $.getJSON("<?php echo base_url() ?>diklat/ajax_alokasi_kamar", function(data){
            
        });
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
            <th width="15%">NIP</th>
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
                    <button class="btn <?php if($list[$i]['status']!='accept'&&$list[$i]['status']!='waiting') echo 'active'; ?>" onclick="toggle(this,<?php echo $list[$i]['id'].','.$list[$i]['id_diklat'] ?>,0)">Abaikan</button>
                    <button class="btn <?php if($list[$i]['status']=='accept') echo 'active'; ?>" onclick="toggle(this,<?php echo $list[$i]['id'].','.$list[$i]['id_diklat'] ?>,1)">Terima</button>
                    <button class="btn <?php if($list[$i]['status']=='waiting') echo 'active'; ?>" onclick="toggle(this,<?php echo $list[$i]['id'].','.$list[$i]['id_diklat'] ?>,2)">Waiting</button>
                    
                    <?php 
                    if($list[$i]['status']=='accept'){
                        $class='class=""';
                    } else{
                        $class='class="hide"';
                    }
                    ?>
                    <span id="dropdown" <?php echo $class?>>    
                        <?php echo form_dropdown('angkatan',$pil_angkatan,$list[$i]['id_program'],'style="width: 90px" id="angkatan" onchange="update_angkatan(this,'.$list[$i]['id'].','.$list[$i]['id_diklat'].')"')?>
                    </span>
                </div>
            </td>
        <?php }?>
    </tbody>
</table>