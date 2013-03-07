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