<script>
    $(document).ready(function() {
        load(1,'');
        $('#cari').keyup(function(){
            load(1,$(this).val());
        });
    });
    function load(page,filter){
        $('#body_table').empty();
        $('#body_table').append('<center><img src="<?php echo base_url()?>assets/img/spinner.gif"/></center>');
        if(filter!=''){
            $.get('<?php echo base_url()?>penyelenggaraan/pembicara_int/ajax_list/'+page+'/'+filter, function(result){
                $('#body_table').html(result);
            });
        }else{
            $.get('<?php echo base_url()?>penyelenggaraan/pembicara_int/ajax_list/'+page, function(result){
                $('#body_table').empty();
                $('#body_table').html(result);
            });
        }
    }
    function status(jenis,id){
        $('#jenis'+id).text('');
        $('#jenis'+id).append('<img src="<?php echo base_url()?>assets/img/loading_animation.gif" width=15 height=15/>');
        $.get('<?php echo base_url()?>penyelenggaraan/pembicara_int/update_status/'+jenis+'/'+id,function(result){
            text_jenis='';
            if(jenis==0){
                text_jenis='bukan pembicara'
            }else if(jenis==1){
                text_jenis='non widyaiswara'
            }else if(jenis==2){
                text_jenis='widyaiswara'
            }
            $('#jenis'+id).empty();
            $('#jenis'+id).text(text_jenis);
        });
    }
</script>

Cari Pembicara: <input type="text" id="cari" placeholder="Masukkan nama/nip"/>
<div id="body_table"></div>    