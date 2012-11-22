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
<form action="<?php echo base_url()?>unit/front/login_process" method="post">
    Instansi : <?php echo form_dropdown('instansi',$ins,'','id="instansi"')?>
    <br/>
    Unit : <input type="text" name="unit" id="unit"/>
    <br/>
    Password : <input type="password" name="password"/>
    <br/>
    <input type="submit" value="login"/>
</form>
