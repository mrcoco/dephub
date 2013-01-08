<script>
    $(document).ready(function() {
        load(1,'');
        $('#cari').keyup(function(){
            load(1,$(this).val());
        });
    });
    function load(page,filter){
        $('#body_table').empty();
        $('#body_table').append('<center>Loading... <img src="<?php echo base_url()?>assets/img/spinner.gif"/></center>');
        if(filter!=''){
            $.get('<?php echo base_url()?>pegawai/list_pegawai_ajax/'+page+'/'+filter, function(result){
                $('#body_table').html(result);
            });
        }else{
            $.get('<?php echo base_url()?>pegawai/list_pegawai_ajax/'+page, function(result){
                $('#body_table').empty();
                $('#body_table').html(result);
            });
        }
    }
    
    
</script>

<div class="row">
    <div class="span12"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
Cari: <input type="text" id="cari" placeholder="Masukkan nama/NIP"/>
<div id="body_table"></div>
<div class="form-actions">
    <a href="pegawai/tambah_pegawai" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Tambah</a>
</div>