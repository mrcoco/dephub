<script>
    function toggle(item,id_peserta,id_diklat,status){
        data = {'id_peserta' : id_peserta, 'id_diklat' : id_diklat}
        $.post(
            "<?php echo base_url() ?>diklat/ajax_toggle_status/"+status,
            data,
            function(res){
                $('#status'+id_peserta).attr('class','badge badge-success');           
                $('#status'+id_peserta).html("accept");
                if(status==1||status==2){
                    $(item).siblings('#dropdown').removeClass('hide');
                    $(item).siblings('#komentar').addClass('hide');
                }else{
                    $(item).siblings('#komentar').removeClass('hide');
                    $(item).siblings('#dropdown').addClass('hide');
                }
                $(item).siblings('#dropdown').find('select').val(-1);
            }
        );
    }
    
    function update_angkatan(item,id_peserta,id_diklat){
        data = {'max_peserta' : <?php echo $program['jumlah_peserta'] ?>,'id_peserta' : id_peserta, 'id_diklat' : id_diklat, 'id_program' : $(item).val()}
        $.post("<?php echo base_url() ?>diklat/ajax_update_angkatan",data,function(res){
            if(! res){
                $(item).val(-1);
                alert('Program sudah penuh');
            }
        });
    }
    
    function isi_komentar(item,id_peserta,id_diklat){
        data = {
            'komentar' : $(item).siblings('#komentar').val(),
            'id_peserta' : id_peserta,
            'id_diklat' : id_diklat
        }
        $.post("<?php echo base_url() ?>diklat/ajax_update_komentar",data,function(res){
            $('.catatan').text(data['komentar']);
        });
    }
</script>
<div class="row">
    <div class="span9"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
<h2><?php echo $program['name'] ?></h2>
<div id="display_dialog" class="modal hide modal-wide"></div>
        <p>Pilih tahun: 
        <?php foreach($thn_program as $th){ ?>
            <?php if(checkdate(1,1,$th['tahun_program'])){?>
            <a href="<?php echo base_url()?>diklat/terima_peserta/<?php echo $program['id']?>/<?php echo $th['tahun_program'] ?>"><?php echo $th['tahun_program'] ?></a> | 
            <?php } ?>
        <?php } ?>
        </p>
<table id="list" width="100%" class="table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th width="3%">No</th>
            <th width="45%">Nama</th>
            <th width="10%">NIP</th>
            <th width="5%">Gol.</th>
            <th width="22%">Unit Kerja</th>
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
                <div class="btn-group" data-toggle="buttons-radio">
                    <button class="btn <?php if($list[$i]['status']!='accept'&&$list[$i]['status']!='waiting') echo 'active'; ?>" onclick="toggle(this,<?php echo $list[$i]['id_peserta'].','.$list[$i]['id_diklat'] ?>,0)">Abaikan</button>
                    <button class="btn <?php if($list[$i]['status']=='accept') echo 'active'; ?>" onclick="toggle(this,<?php echo $list[$i]['id_peserta'].','.$list[$i]['id_diklat'] ?>,1)">Terima</button>
                    <button class="btn <?php if($list[$i]['status']=='waiting') echo 'active'; ?>" onclick="toggle(this,<?php echo $list[$i]['id_peserta'].','.$list[$i]['id_diklat'] ?>,2)">Waiting</button>
                    
                    <?php 
                    if($list[$i]['status']=='accept'||$list[$i]['status']=='waiting'){
                        $class='class=""';
                        $class2='class="hide"';
                    } else{
                        $class='class="hide"';
                        $class2='class=""';
                    }
                    ?>
                    <span id="dropdown" <?php echo $class?>>
                        <?php echo form_dropdown('angkatan',$pil_angkatan,$list[$i]['id_program'],'style="width: 90px" id="angkatan" onchange="update_angkatan(this,'.$list[$i]['id_peserta'].','.$list[$i]['id_diklat'].')"')?>
                    </span>
                    <span id="komentar" <?php echo $class2?>>
                        <div class="input-append row-fluid">
                            <input class="span3" type="text" id="komentar" placeholder="Alasan" value="<?php echo $list[$i]['komentar']?>"/><button class="btn btn-primary" onclick="isi_komentar(this,<?php echo $list[$i]['id_peserta']?>,<?php echo $list[$i]['id_diklat']?>)">Simpan</button>
                        </div>
                    </span>
                </div>
                Catatan : <span class="catatan"><?php echo $list[$i]['komentar']?></span>
            </td>
            <td class="nip"><?php echo $list[$i]['nip'] ?></td>
            <td class="gol"><?php echo $list[$i]['golongan'] ?></td>
            <td class="unit">
                <?php 
                    if(array_key_exists($list[$i]['kode_unit'], $unit)){
                        echo $unit[$list[$i]['kode_unit']];
                    }
                ?>
            </td>
        <?php }?>
    </tbody>
</table>
<?php if($list){?>
<div class="form-actions">
    <a class="btn btn-success" href="<?php echo base_url()?>diklat/cetak_daftar_peserta/<?php echo $program['id']?>">Cetak PDF</a>
</div>
<?php }else{ ?>
<p>Tidak ada yang mendaftar</p>
<?php }?>
