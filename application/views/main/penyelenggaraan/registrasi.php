<script>
    var num=1;
    $(document).ready(function(){
        $('#example').hide();
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
        obj_table=$('#example').clone();
        $('#wrap_form').append(obj_table);
        num++;
        obj_table.removeAttr('id');
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
<table width="800" id="example" class="table table-condensed">
    <thead>
        <tr>
            <th colspan="2">Peserta ke-<span class="num"></span></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Nama/NIP</td>
            <td><input type="text" name="nama[]" placeholder="Nama"/> / <input type="text" name="nip[]" placeholder="NIP"/></td>
        </tr>
        <tr>
            <td>Pangkat/Gol</td>
            <td><input type="text" name="pangkat[]" placeholder="Pangkat"/> / <input type="text" name="gol[]" placeholder="Golongan"/></td>
        </tr>
        <tr>
            <td>Tanggal lahir</td>
            <td><input type="text" class="datepicker" name="tgl_lahir[]"/></td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td><textarea name="jabatan[]"></textarea></td>
        </tr>
        <tr>
            <td colspan="2"><hr/></td>
        </tr>
    </tbody>
</table>

<!-- Selesai Contoh-->

<form name="form_reg" action="penyelenggaraan/dashboard/registrasi_proses" method="POST">
    <table width="600">
        <tr>
            <td>Program Diklat</td>
            <td><?php echo form_dropdown('program', $pil_program, '', 'id="pil_prog"') ?></td>
        </tr>
        <tr>
            <td>Asal Instansi Peserta</td>
            <td><textarea id="instansi" name="instansi"></textarea></td>
        </tr>
    </table>
    <div id="wrap_form">
        <table id="table1" class="table table-condensed" width="800">
            <thead>
                <tr>
                    <th colspan="2">Peserta ke-1</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Nama/NIP</td>
                    <td><input type="text" name="nama[]" placeholder="Nama"/> / <input type="text" name="nip[]" placeholder="NIP"/></td>
                </tr>
                <tr>
                    <td>Pangkat/Gol</td>
                    <td><input type="text" name="pangkat[]" placeholder="Pangkat"/> / <input type="text" name="gol[]" placeholder="Golongan"/></td>
                </tr>
                <tr>
                    <td>Tgl lahir</td>
                    <td><input type="text" name="tgl_lahir[]" class="datepicker"/></td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td><textarea name="jabatan[]"></textarea></td>
                </tr>
                <tr>
                    <td colspan="2"><hr/></td>
                </tr>
            </tbody>
        </table>
    </div>
    <a href="javascript:append_table()" class="btn btn-small"><i class="icon-plus"></i> Tambah Peserta</a>
    <a href="javascript:delete_table()" class="btn btn-small"><i class="icon-minus"></i> Hapus</a>
    <div class="form-actions">
        <input type="button" class="btn btn-large btn-primary" value="Daftarkan Semua" onclick="validate_form()"/>
    </div>
</form>