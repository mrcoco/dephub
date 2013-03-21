<script>
$(function(){
        $('.add').live('click',function(){
            $('.cont').append('<p class="input-append input-prepend"><input type="text" class="item" name="item[]" placeholder="Unsur Penilaian"/> <input type="text" class="bobot input-small" name="bobot[]" placeholder="Bobot"/><span class="add-on">%</span> <span class="btn btn-mini btn-danger del"><i class="icon-remove"></i> Hapus</span></p>');
        });
        
        $('.del').live('click',function(){
            isi = $(this).siblings('.item').val();
            if(isi!=''){
            cek = confirm('Apakah Anda yakin ingin menghapus unsur '+isi+'?');
                if(cek){$(this).parent().remove();}
            }else{
                $(this).parent().remove();
            }
        });
});
</script>
<h2><?php echo $materi['judul'] ?></h2>
<form action="wid/nilai/item_insert" method="POST">
<input type="hidden" name="id_materi" value="<?php echo $indeks['id_materi']?>"/>
<input type="hidden" name="id_program" value="<?php echo $indeks['id_program']?>"/>
<div class="cont">
<?php foreach($list_komponen as $l){?>
    <p class="input-append input-prepend">
        <input type="text" class="item" name="item[]" placeholder="Unsur Penilaian" value="<?php echo $l['nama_komponen']?>"/>
        <input type="text" class="bobot input-small" name="bobot[]" placeholder="Bobot" value="<?php echo $l['bobot']?>"/><span class="add-on">%</span>
        <span class="btn btn-mini btn-danger del"><i class="icon-remove"></i> Hapus</span>
    </p>
<?php } ?>
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