<<<<<<< HEAD
<script>
    var num=1;
    $(document).ready(function(){
        $('.example').hide();
    });
    
    function validate_form(){
        pil_prog=$('#pil_prog').attr('value');
        instansi=$('#instansi').val();
        if(pil_prog==-1){
            alert('Anda belum memilih program');
        }else{
            if(instansi==""){
                alert('Anda belum mengisi instansi');
            }else{
                data_nama = document.form_reg.elements["nama[]"];
                data_nip = document.form_reg.elements["nip[]"];

                if(num==1){
                    if(data_nama.value==""||data_nip.value==""){
                        alert('Isikan kolom nama dan nip secara lengkap');
                    }else{
                        document.form_reg.submit();
                    }
                }else{
                    error=false;
                    for(i=0;i<data_nama.length;i++){
                        if(data_nama[i].value==""||data_nip[i].value==""){
                            error=true;
                            break;
                        }
                    }
                    if(error){
                        alert('Isikan kolom nama dan nip secara lengkap');
                    }else{
                        document.form_reg.submit();
                    }
                }
            }
        }
    }
    
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
        <td>Tgl lahir</td>
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

<form name="form_reg" action="penyelenggaraan/dashboard/registrasi_proses" method="POST">
    Program Diklat : <?php echo form_dropdown('program', $pil_program,'','id="pil_prog"') ?>
    <br/>
    Instansi : <textarea id="instansi" name="instansi"></textarea>
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
            <td>Tgl lahir</td>
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
    <a href="javascript:append_table()">Tambah</a>&nbsp;&nbsp;<a href="javascript:delete_table()">Hapus</a>
    <br/><br/><br/>
    <div><input type="button" value="Daftarkan" onclick="validate_form()"/></div>
</form>
=======
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
>>>>>>> 1fc017a6951e02f175652e94c2e6886cf4d70434
