<script>
var list_unit;
$(document).ready(function(){
    $('#instansi').change(function(){
        $.getJSON('<?php echo base_url()?>unit/front/ajax_load_unit/'+$('#instansi').val(),function(data){
            list_unit=data;
        }).then(function(){
            console.log(list_unit);
            $.each(list_unit, function (i, j) {
               document.form1.unit.options[i] = new Option(j);
            });
//            $('#unit').typeahead().attr( "autocomplete", "off" );
//            $('#unit').data('typeahead').source=list_unit;
        });
        
    });
});
</script>
<div class="row">
    <div class="span12"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
<form name="form1" class="well span3 autowidth" action="<?php echo base_url()?>unit/front/login_process" method="post">
    <label>Instansi</label><?php echo form_dropdown('instansi',$ins,'','id="instansi"')?>
    <label>Unit Kerja</label>
    <select name="unit" id="unit">
        <option>--Pilih Unit Kerja--</option>
    </select>
    <!--<input type="text" name="unit" id="unit" placeholder="Masukkan unit kerja"/>-->
    <label>Password</label> <input type="password" name="password" placeholder="Masukkan password"/><br />
    <button class="btn btn-primary" type="submit">Login</button>
</form>
<br style="clear: both" />
<div clas="row">
    <a href="<?php echo base_url() ?>"><i class="icon-arrow-left"></i> Kembali ke Manajemen Diklat</a>
</div>