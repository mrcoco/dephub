<script>
    var num=0;
    var option;
    var kode_kantor;
    var syarat=<?php echo json_encode($program)?>;
    var pendidikan=<?php echo json_encode($arr_pendidikan)?>;
    var pangkat=<?php echo json_encode($pangkat)?>;
    $(document).ready(function(){        
        $('#example').hide();
        append_table();
        $('#instansi').focus(function(){
            $.getJSON('<?php echo base_url() ?>penyelenggaraan/peserta/list_instansi',function(result){
                option=result;
                $('#instansi').typeahead({'source':option});
            });
            
        });
        $('#instansi').change(function(){
            console.log($('#instansi').val());
            $.get('<?php echo base_url() ?>penyelenggaraan/peserta/get_kode_instansi/'+$('#instansi').val(),function(result){
                kode_kantor=result;
//                console.log(kode_kantor);
            });
        });
    });
    
    function tes(num){
        if(kode_kantor>0){
            console.log(kode_kantor);
            $.getJSON('<?php echo base_url() ?>penyelenggaraan/peserta/get_cv_peserta/'+kode_kantor,function(result){
                option=result;
                $('#nip'+num).typeahead({'source':option});
            });
        }else{
            alert('Masukkan instansi lebih dahulu');
            $('#instansi').focus();
        }
    }
    
    function tes2(num){
        nip=$('#nip'+num).val();
        $.getJSON('<?php echo base_url() ?>penyelenggaraan/peserta/get_data_peserta/'+nip,function(result){
                if(syarat['syarat_usia']!=-1){
                    if(result['usia']>=syarat['syarat_usia']){
                        syarat_usia=true;
                    }else{
                        syarat_usia=false;
                    }
                }else{
                    syarat_usia=true;
                }
                if(syarat['syarat_masa_kerja']!=-1){
                    if(result['masa_kerja']>=syarat['syarat_masa_kerja']){
                        syarat_masa_kerja=true;
                    }else{
                        syarat_masa_kerja=false;
                    }
                }else{
                    syarat_masa_kerja=true;
                }
                if(syarat['syarat_pangkat_gol']!=''){
                    idx_pangkat=pangkat[result['golongan']];
                    idx_syarat_pangkat=pangkat[syarat['syarat_pangkat_gol']];
                    if(idx_pangkat>=idx_syarat_pangkat){
                        syarat_pangkat_gol=true;
                    }else{
                        syarat_pangkat_gol=false;
                    }
                }else{
                    syarat_pangkat_gol=true;
                }
                if(syarat['syarat_pendidikan']!=''){
                    idx_pendidikan=pendidikan[result['pendidikan_terakhir']];
                    idx_syarat_pendidikan=pendidikan[syarat['syarat_pendidikan']];
                    if(idx_pendidikan>=idx_syarat_pendidikan){
                        syarat_pendidikan=true;
                    }else{
                        syarat_pendidikan=false;
                    }
                }else{
                    syarat_pendidikan=true;
                }
                if(syarat_usia&&syarat_masa_kerja&&syarat_pangkat_gol&&syarat_pendidikan){
                    $('#table'+num+' .id').val(result['id']);
                    $('#table'+num+' .nama').val(result['nama']);
                    $('#table'+num+' .pangkat').val(result['pangkat']);
                    $('#table'+num+' .gol').val(result['golongan']);
                    $('#table'+num+' .jabatan').text(result['jabatan']);
                    $('#table'+num+' .view_history').attr('onclick','view_history('+result['id']+')');
                    $('#table'+num+' .view_detail').attr('onclick','view_detail('+result['id']+')');
                }else{
                    alert('Ada syarat yang tidak terpenuhi');
                    $('#table'+num+' .nip').val('');
                    $('#table'+num+' .nip').focus();
                }
                console.log(syarat_usia);
                console.log(syarat_masa_kerja);
                console.log(syarat_pangkat_gol);
                console.log(syarat_pendidikan);
        });
    }
    
    function view_history(num){
        if($('#nip'+num).val()==''){
            alert('Anda harus mengisi NIP untuk melihat data history pelatihannya');
        }else{
            $.get("<?php echo base_url() ?>penyelenggaraan/peserta/get_history_pelatihan/"+num,function(result){
                $('#display_dialog').html(result);
                $('#display_dialog').modal('show');
            })
        }
    }
    
    function view_detail(num){
        if($('#nip'+num).val()==''){
            alert('Anda harus mengisi NIP untuk melihat data history pelatihannya');
        }else{
            $.get("<?php echo base_url() ?>penyelenggaraan/peserta/get_detail_peserta/"+num,function(result){
                $('#display_dialog').html(result);
                $('#display_dialog').modal('show');
            })
        }
    }
    function validate_form(){
        pil_prog=$('#pil_prog').attr('value');
        instansi=$('#instansi').val();
        var container=$('.alert');
        if(pil_prog==-1){
            container.show('blind');
            container.append('Anda belum memilih program<br />');
        }else{
            if(instansi==""){
                container.show('blind');
                container.append('Anda belum mengisi instansi<br />');
            }else{
                data_nama = document.form_reg.elements["nama[]"];
                data_nip = document.form_reg.elements["nip[]"];

                if(num==1){
                    if(data_nama.value==""||data_nip.value==""){
                        container.show('blind');
                        container.append('Isikan kolom nama dan NIP secara lengkap<br />');
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
                        container.show('blind');
                        container.append('Isikan kolom nama dan NIP secara lengkap<br />');
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
        $('#table'+num+' .nip').attr('id','nip'+num);
        $('#table'+num+' .nip').attr('onclick','tes('+num+')');
        $('#table'+num+' .nip').attr('onchange','tes2('+num+')');
        obj_table.show('blind');
        $(function(){
            $('#table'+num+' .tgl').datepicker({
                format: 'yyyy-mm-dd'
            });
        });
    }
    function delete_table(obj){
        if(num>1){
            $('table:last-child','#wrap_form').hide('blind',function(){
                $('table:last-child','#wrap_form').remove();
            });
            num--;
        }
    }
    

    
    $(function(){
        $('#table1 .tgl').datepicker({
            format: 'yyyy-mm-dd'
        });
        $('#display_history').modal({
            show: false
        });
    });
</script>
<div class="alert alert-error fade in none"></div>
<!-- Contoh buat di clone -->
<table id="example" class="table table-condensed">
    <thead>
        <tr>
            <th colspan="2">Peserta ke-<span class="num"></span></th>
        </tr>
    </thead>
    <tbody>
        <input class="id" type="hidden" name="id[]"/>
        <tr>
            <td>NIP/Nama</td>
            <td><input class="nip" type="text" name="nip[]" placeholder="NIP"/> / <input class="nama" type="text" name="nama[]" placeholder="Nama" readonly/></td>
        </tr>
        <tr>
            <td>Pangkat/Gol</td>
            <td><input class="pangkat" type="text" name="pangkat[]" placeholder="Pangkat" readonly/> / <input class="gol" type="text" name="gol[]" placeholder="Golongan" readonly/></td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td><textarea class="jabatan" name="jabatan[]" readonly></textarea></td>
        </tr>
        <tr>
            <td colspan="2">
                <span class="view_detail btn btn-mini btn-info">Lihat detail peserta</span> <span class="view_history btn btn-mini btn-info">Lihat history pelatihan</span> 
            </td>
        </tr>
    </tbody>
</table>
<!-- Selesai Contoh-->

<div id="display_dialog" class="modal hide"></div>
<p class="lead" align="center"><?php echo $program['name'] ?></p>
<form name="form_reg" id="form_reg" action="penyelenggaraan/peserta/registrasi_proses" method="POST">
    <input type="hidden" name="program" id="pil_prog" value="<?php echo $id ?>" />
    <div class="well">Asal Instansi Peserta :
        <input type="text" style="margin: 0 auto;" id="instansi" class="input-xlarge" name="instansi"/>
    </div>
    <div id="wrap_form">
    </div>
    <div class="form-actions">
        <a href="javascript:append_table()" class="btn btn-small"><i class="icon-plus"></i> Tambah Peserta</a>
        <a href="javascript:delete_table()" class="btn btn-small"><i class="icon-minus"></i> Hapus</a>
        <input type="button" class="btn btn-large btn-primary pull-right" value="Simpan Semua" onclick="validate_form()"/>
    </div>
</form>