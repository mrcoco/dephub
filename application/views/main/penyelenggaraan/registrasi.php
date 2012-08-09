<script>
    var num=1;
    $(document).ready(function(){
        $('.example').hide();
    });
    function append_table(){
        obj_table=$('.example').clone();
        $('#wrap_form').append(obj_table);
        num++;
        obj_table.removeAttr('class');
        obj_table.attr('id', 'table'+num);
        $('#table'+num+' .num').text(num);
        obj_table.show('blind');    
    }
    function delete_table(obj){
        if(num>1){
            $('table:last-child','#wrap_form').hide('blind',function(){
                $('table:last-child','#wrap_form').remove();
            });
            num--;
        }
    }
</script>
<script type="text/javascript">
$().ready(function() {    
	var container = $('div.alert');
	var validator = $("#form1").validate({
		errorLabelContainer: container,
		errorContainer: $(container),
                rules: {
		},
		messages: {
		}
	});
	$(".cancel").click(function() {
		validator.resetForm();
	});
});
</script>
<div class="alert alert-error fade in none">
    <h4>Error!</h4>
</div>

<!-- Contoh buat di clone -->
<table width="800" class="example">
    <tr>
        <td colspan="1">Peserta ke-<span class="num"></span></td>
    </tr>
    <tr>
        <td>Nama/NIP</td>
        <td><input type="text" name="nama[]"/>/<input type="text" name="nip[]"/></td>
    </tr>
    <tr>
        <td>Pangkat/Gol</td>
        <td><input type="text" name="pangkat[]"/>/<input type="text" name="gol[]"/></td>
    </tr>
    <tr>
        <td>Tanggal lahir</td>
        <td><input type="date" name="tgl_lahir[]"/></td>
    </tr>
    <tr>
        <td>Jabatan</td>
        <td><textarea name="jabatan[]"></textarea></td>
    </tr>
    <tr>
        <td colspan="2"><hr/></td>
    </tr>
</table>

<!-- Selesai Contoh-->


<form id="form1" action="" method="POST">
    Program Diklat : <?php echo form_dropdown('program', $pil_program) ?>
    <hr/>
    <div id="wrap_form">
        <table id="table1" width="800">
        <tr>
            <td colspan="1">Peserta ke-1</td>
        </tr>
        <tr>
            <td>Nama/NIP</td>
            <td><input type="text" name="nama[]"/>/<input type="text" name="nip[]"/></td>
        </tr>
        <tr>
            <td>Pangkat/Gol</td>
            <td><input type="text" name="pangkat[]"/>/<input type="text" name="gol[]"/></td>
        </tr>
        <tr>
            <td>Tanggal lahir</td>
            <td><input type="date" name="tgl_lahir[]"/></td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td><textarea name="jabatan[]"></textarea></td>
        </tr>
        <tr>
            <td colspan="2"><hr/></td>
        </tr>
        </table>
    </div>
    <a href="javascript:append_table()" class="btn btn-primary"><i class="icon-plus"></i> Tambah</a>
    <a href="javascript:delete_table()" class="btn"><i class="icon-minus"></i> Hapus</a>
</form>
