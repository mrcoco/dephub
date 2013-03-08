
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
            $.get('<?php echo base_url()?>elibrary/admin/list_category_ajax/'+page+'/'+filter, function(result){
                $('#body_table').html(result);
            });
        }else{
            $.get('<?php echo base_url()?>elibrary/admin/list_category_ajax/'+page, function(result){
                $('#body_table').empty();
                $('#body_table').html(result);
            });
        }
    }
    
    
</script>

<div class="row">
    <div class="span12"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
<div class="actionlink">Search: <input type="text" id="cari" placeholder="Cari Kategori" rel="tooltip" title="Masukkan nama kategori" class="tip"/>
 <a class="btn btn-primary" href="<?php echo site_url("elibrary/admin/add_category"); ?>">Tambah Kategori</a> <input type="button" class="btn" value="Back" onclick="history.go(-1)"/></div>
<div id="body_table"></div>    