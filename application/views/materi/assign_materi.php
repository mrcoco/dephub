<script>
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
        
        $('.save').live('click',function(){
           parent=$(this).parent();
           nama=parent.find('input').val();
           data={'id_materi': id_materi,'id_pembicara':array_id[nama]};
           tombol=$(this);
           $.post('<?php echo base_url()?>materi/ajax_save',data,function(res){
               if(res){
                   tombol.text('Hapus');
                   tombol.attr('class','hapus');
               }else{
                   alert('penambahan gagal');
                   parent.find('input').val('');
               }
           });
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
        $('.cont').append('<div class="item"><input type="text" class="dosen"/> <span class="save">Simpan</span></div>');
        $('.dosen').typeahead({
            'source' : array_dosen
        });
    }
</script>
<div class="cont">
    <?php foreach($pengajar as $p){?>
    <div class="item"><input type="text" class="dosen" value="<?php echo $key_pembicara[$p['id_pembicara']]?>"/> <span class="hapus">Hapus</span></div>
    <?php } ?>
    <div class="item"><input type="text" class="dosen"/> <span class="save">Simpan</span></div>
</div>
<span class="add">Tambah</span>
