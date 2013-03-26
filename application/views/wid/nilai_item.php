<script>
$(function(){
    var tot=<?php echo $tot ?>;
        if(tot!=100 && tot!=0){alert('Total bobot belum 100%');}
        $('.add').live('click',function(){
            $('.cont').append('<p class="input-append input-prepend"><input type="text" class="item" name="item[]" placeholder="Unsur Penilaian"/> <input type="text" class="bobot input-small" name="bobot[]" placeholder="Bobot"/><span class="add-on">%</span> <span class="btn btn-mini btn-danger del"><i class="icon-remove"></i> Hapus</span></p>');
        });

        $('.del').live('click',function(){
            isi = $(this).siblings('.item').val();
            parent = $(this).parent();
            if(isi!=''){
            cek = confirm('Apakah Anda yakin ingin menghapus unsur '+isi+'?');
                if(cek){
                    data={'id_materi': <?php echo $indeks['id_materi']?>,'id_program':<?php echo $indeks['id_program']?>,'nama_komponen':isi};
                    $.post('<?php echo base_url()?>wid/nilai/item_hapus',data,function(res){
                        console.log(res);
                        if(res){parent.remove();}
                    });
                }
            }else{
                $(this).parent().remove();
            }
        });
});
function del(id,isi){
    parent = $('#tr'+id);
    cek = confirm('Apakah Anda yakin ingin menghapus unsur '+isi+'?');
    if(cek){
        data={'id_materi': <?php echo $indeks['id_materi']?>,'id_program':<?php echo $indeks['id_program']?>,'id_komponen':id};
        $.post('<?php echo base_url()?>wid/nilai/item_hapus',data,function(res){
            console.log(res);
            if(res){parent.remove();}
        });
    }
}
function edit(id,itemval,bobotval){
        item = $('#item'+id);
        bobot = $('#bobot'+id);
        item.html('<input type="text" class="item" name="item[]" value="'+itemval+'" placeholder="Unsur Penilaian"/>');
        bobot.html('<input type="text" class="bobot input-small" value="'+bobotval+'" name="bobot[]" placeholder="Bobot"/><span class="add-on">%</span>');
}
</script>
<h2><?php echo $materi['judul'] ?></h2>
<h3><?php echo $diklat['name'].' Angkatan '.$program['angkatan'] ?></h3>
<?php if($this->uri->segment(1)=='program'){$this->load->view('sidebar/subnav_nilai');} ?>
<form action="wid/nilai/item_insert" method="POST">
<input type="hidden" name="id_materi" value="<?php echo $indeks['id_materi']?>"/>
<input type="hidden" name="id_program" value="<?php echo $indeks['id_program']?>"/>
<input type="hidden" name="redirect_url" value="<?php echo current_url()?>"/>
<?php if($list_komponen){ ?>
    <table class="table">
        <tr>
            <th width="220px">Unsur Penilaian</th>
            <th width="150px">Bobot</th>
            <th>Aksi</th>
        </tr>
<?php foreach($list_komponen as $l){ ?>
        <tr id="tr<?php echo $l['id']?>">
            <td>
                <span id="item<?php echo $l['id']?>" class="input-append input-prepend">
                    <?php echo $l['nama_komponen']?>
                </span>
            </td>
            <td align="center">
                <span id="bobot<?php echo $l['id']?>" class="input-append input-prepend">
                    <?php echo $l['bobot']?>%
                </span>
            </td>
            <td>
                <span class="btn-group">
                    <span class="btn btn-mini edit" onclick="edit(<?php echo $l['id'].",'".$l['nama_komponen']."',".$l['bobot']?>)"><i class="icon-edit"></i> Ubah</span>
                    <span class="btn btn-mini btn-danger" onclick="del(<?php echo $l['id'].",'".$l['nama_komponen']."'"?>)"><i class="icon-remove"></i> Hapus</span>
                </span>
            </td>
        </tr>
<?php } ?>
    </table>
Total bobot :
<?php
    if($tot!=100){
        echo '<span class="label label-important">'.$tot.'% (tidak 100%)</span>';
    }else{
        echo '<span class="label label-success">'.$tot.'%</span>';
    }
}
?>
<h2>Tambah Unsur Penilaian</h2>
<div class="cont">
    <p class="input-append input-prepend">
        <input type="text" class="item" name="item[]" placeholder="Unsur Penilaian"/>
        <input type="text" class="bobot input-small" name="bobot[]" placeholder="Bobot"/><span class="add-on">%</span>
        <span class="btn btn-mini btn-danger del"><i class="icon-remove"></i> Hapus</span>
    </p>
</div>
<span class="btn btn-mini add"><i class="icon-plus"></i> Tambah</span>
<div class="form-actions">
    <input type="submit" class="btn btn-primary" value="Simpan" />
</div>
</form>