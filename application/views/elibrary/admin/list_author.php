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
            $.get('<?php echo base_url()?>elibrary/admin/list_author_ajax/'+page+'/'+filter, function(result){
                $('#body_table').html(result);
            });
        }else{
            $.get('<?php echo base_url()?>elibrary/admin/list_author_ajax/'+page, function(result){
                $('#body_table').empty();
                $('#body_table').html(result);
            });
        }
    }
    
    
</script>

<div class="row">
    <div class="span12"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
Search: <input type="text" id="cari" placeholder="Cari Pengarang" rel="tooltip" title="Masukkan nama pengarang" class="tip"/>
<input type="button" class="btn" value="Back" onclick="history.go(-1)"/><div id="body_table"></div>    