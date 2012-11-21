<script type="text/javascript">
    var jum_pengajar = <?php echo count($pengajar)?>;
    var array_dosen=<?php echo json_encode($pembicara)?>;
    var array_id=<?php echo json_encode($id)?>;
    var id_materi = <?php echo $materi['id']?>;
    $(function(){
        $('.dosen').typeahead({
            'source' : array_dosen
        });
        
        $('.add').live('click',function(){
            add();
        });
        
        $('input').live('change',function(){
           parent=$(this).parent();
           nama=$(this).val();
           data={'id_materi': id_materi,'id_pembicara':array_id[nama]};
           if(array_id[nama]>0){
                $.post('<?php echo base_url()?>materi/ajax_save',data,function(res){
                    if(res){
                        parent.append(' <span class="label label-success">disimpan</span>');
                        $('.label-success').delay(2*1000).fadeOut();
                    }else{
                        alert('Penambahan gagal');
                        parent.find('input').val('');
                    }
                });
            }else{
                alert('Penambahan gagal ');
                parent.find('input').val('');
            }
        });
        
        $('.hapus').live('click',function(){
           parent=$(this).parent();
           nama=parent.find('input').val();
           data={'id_materi': id_materi,'id_pembicara':array_id[nama]};
           $.post('<?php echo base_url()?>materi/ajax_hapus',data,function(res){
               console.log(res);
               if(res){
                   parent.remove();
               }
           });
        });
    });
    function add(){
        $('.cont').append('<div class="item"><input type="text" class="dosen"/> <span class="hapus btn btn-mini btn-danger"><i class="icon-remove"></i> Hapus</span></div>');
        $('.dosen').typeahead({
            'source' : array_dosen
        });
    }
</script>
<h2><?php echo $materi['judul'] ?></h2>
<div class="cont">
    <?php foreach($pengajar as $p){?>
    <div class="item"><input type="text" class="dosen" value="<?php echo $key_pembicara[$p['id_pembicara']]?>"/> <span class="hapus btn btn-mini btn-danger"><i class="icon-remove"></i> Hapus</span></div>
    <?php } ?>
    <div class="item"><input type="text" class="dosen"/> <span class="hapus btn btn-mini btn-danger"><i class="icon-remove"></i> Hapus</span></div>
</div>
<span class="add btn btn-mini"><i class="icon-plus"></i> Tambah</span>
<div class="form-actions">
    <a href="<?php echo base_url()?>materi/list_materi" class="btn btn-primary"><i class="icon-arrow-left icon-white"></i> Daftar materi</a>
    <a href="<?php echo base_url()?>materi/edit/<?php echo $materi['id'] ?>" class="btn">Ubah materi</a>
</div>
