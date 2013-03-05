<script>
$(function(){
        $('.add').live('click',function(){
            $('.cont').append('<p><input type="text" class="item" name="item[]" placeholder="Unsur"/> <input type="text" class="bobot" name="bobot[]" placeholder="Bobot"/> <span class="btn btn-mini btn-danger del"><i class="icon-remove"></i> Hapus</span></p>');
        });
        
        $('.del').live('click',function(){
            $(this).parent().remove();
        });
});
</script>
<div class="cont">
    <p>
        <input type="text" class="item" name="item[]" placeholder="Unsur"/>
        <input type="text" class="bobot" name="bobot[]" placeholder="Bobot"/>
        <span class="btn btn-mini btn-danger del"><i class="icon-remove"></i> Hapus</span>
    </p>
</div>
<span class="btn btn-mini add"><i class="icon-plus"></i> Tambah</span>