<script>
var list_unit;
$(document).ready(function(){
    $('#unit').focus(function(){
        $.getJSON('<?php echo base_url()?>unit/front/ajax_load_unit/'+$('#instansi').val(),function(data){
            list_unit=data;
        }).then(function(){
            console.log(list_unit);
            $('#unit').typeahead();
            $('#unit').data('typeahead').source=list_unit;
        });
        
    });
});
</script>
<form class="well span3" action="<?php echo base_url()?>unit/front/login_process" method="post">
    <label>Instansi</label><?php echo form_dropdown('instansi',$ins,'','id="instansi" class="xx-large"')?>
    <label>Unit Kerja</label> <input type="text" name="unit" id="unit" placeholder="Masukkan unit kerja"/>
    <label>Password</label> <input type="password" name="password" placeholder="Masukkan password"/>
    <button class="btn btn-primary" type="submit">Login</button>
</form>
