<script>
    var option;
    var kode_kantor;
    var syarat=<?php echo json_encode($program) ?>;
    var pendidikan=<?php echo json_encode($arr_pendidikan) ?>;
    var pangkat=<?php echo json_encode($pangkat) ?>;
    var num=0
    $(document).ready(function(){        
        console.log(syarat);
        $('#example').hide();
        append_table();
        $('#instansi').focus(function(){
            $.getJSON('<?php echo base_url() ?>instansi/json_list_instansi',function(result){
                option=result;
                $('#instansi').typeahead({
                    'source':option,
                    updater : function(item){
                        $.get('<?php echo base_url() ?>instansi/ajax_kode_instansi/'+item,function(result){
                            kode_kantor=result;
                        });
                        return item;
                    }
                }).attr( "autocomplete", "off" );
            });
            
        });
    });
    
    function tes(num){
        if(kode_kantor>0){
            $.getJSON('<?php echo base_url() ?>pegawai/json_list_pegawai/'+kode_kantor,function(result){
                option=result;
                $('#nip'+num).typeahead({'source':option}).attr( "autocomplete", "off" );
            });
        }else{
            alert('Masukkan instansi lebih dahulu');
            $('#instansi').focus();
        }
    }
    
    function tes2(num){
        id_diklat=$('#id_diklat').val();
        nip=$('#nip'+num).val();
        tahun=$('#tahun').val();
        message='';
        
        $.get('<?php echo base_url() ?>diklat/ajax_cek_daftar/'+id_diklat+'/'+nip+'/'+tahun,function(result){
            if(result=='false'){
                alert('Pegawai dengan nip '+nip+' sudah terdaftar untuk diklat ini di tahun ini');
                $('#table'+num+' .nip').val('');
                $('#table'+num+' .nip').focus();
            }else{
                $.getJSON('<?php echo base_url() ?>pegawai/json_data_pegawai/'+nip,function(result){
                    console.log(syarat['syarat_usia']);
                    if(syarat['syarat_usia']>0){
                        if(result['usia']<=syarat['syarat_usia']){
                            syarat_usia=true;
                        }else{
                            syarat_usia=false;
                            message+='\nSyarat usia, usia yang diperbolehkan maksimal '+syarat['syarat_usia'];
                        }
                    }else{
                        syarat_usia=true;
                    }
                    if(syarat['syarat_masa_kerja']!=-1&&syarat['syarat_masa_kerja']!=0){
                        if(result['masa_kerja']>=syarat['syarat_masa_kerja']){
                            syarat_masa_kerja=true;
                        }else{
                            syarat_masa_kerja=false;
                            message+='\nSyarat masa kerja, masa kerja yang diperbolehkan minimal '+syarat['syarat_masa_kerja'];
                        }
                    }else{
                        syarat_masa_kerja=true;
                    }
                    if(syarat['syarat_pangkat_gol']!=''&&syarat['syarat_pangkat_gol']!=-1){
                        idx_pangkat=parseInt(result['kode_gol']);
                        idx_syarat_pangkat=parseInt(syarat['syarat_pangkat_gol']);

                        if(idx_pangkat<=idx_syarat_pangkat){
                            syarat_pangkat_gol=true;
                        }else{
                            syarat_pangkat_gol=false;
                            message+='\nSyarat pangkat/golongan';
                        }
                    }else{
                        syarat_pangkat_gol=true;
                    }
                    if(syarat['syarat_pendidikan']!=''&&syarat['syarat_pendidikan']!=-1){
                        idx_pendidikan=parseInt(result['kode_pendidikan']);
                        idx_syarat_pendidikan=parseInt(syarat['syarat_pendidikan']);
                        if(idx_pendidikan<=idx_syarat_pendidikan){
                            syarat_pendidikan=true;
                        }else{
                            syarat_pendidikan=false;
                            message+='\nSyarat tingkat pendidikan';
                        }
                    }else{
                        syarat_pendidikan=true;
                    }
                    if(syarat_usia&&syarat_masa_kerja&&syarat_pangkat_gol&&syarat_pendidikan){
                        $('#table'+num+' .id').val(result['id']);
                        $('#table'+num+' .nama').val(result['nama']);
                        $('#table'+num+' .gol').val(pangkat[result['kode_gol']]);
                        $('#table'+num+' .jabatan').text(result['jabatan']);
                        $('#table'+num+' .view_history').attr('onclick','view_history('+result['id']+')');
                        $('#table'+num+' .view_detail').attr('onclick','view_detail('+result['id']+')');
                    }else{
                        alert('Ada syarat yang tidak terpenuhi, syarat tersebut antara lain : '+message);
                        in_nip=$('#table'+num+' .nip');
                        tbody=in_nip.parent().parent().parent().parent();
                        tbody.find('input').val('');
                        tbody.find('textarea').val('');
                        in_nip.val('');
                        in_nip.focus();
                    }
                });
            }
        });
    }
    
    function view_history(num){
        if($('#nip'+num).val()==''){
            alert('Anda harus mengisi NIP untuk melihat data history pelatihannya');
        }else{
            $.get("<?php echo base_url() ?>pegawai/ajax_history_pelatihan/"+num,function(result){
                $('#display_dialog').html(result);
                $('#display_dialog').modal('show');
            })
        }
    }
    
    function view_detail(num){
        if($('#nip'+num).val()==''){
            alert('Anda harus mengisi NIP untuk melihat data history pelatihannya');
        }else{
            $.get("<?php echo base_url() ?>pegawai/ajax_detail_peserta/"+num,function(result){
                $('#display_dialog').html(result);
                $('#display_dialog').modal('show');
            })
        }
    }
    function validate_form(){
        pil_prog=$('#pil_prog').attr('value');
        instansi=$('#instansi').val();
        var container=$('.alert');
        container.html('');
        if(pil_prog==-1){
            container.show('blind');
            container.append('Anda belum memilih program<br />');
        }else{
            if(instansi==""){
                container.show('blind');
                container.append('Anda belum mengisi instansi<br />');
            }else{
                container.show('blind');
                data_nama = document.form_reg.elements["nama[]"];
                data_nip = document.form_reg.elements["nip[]"];

                if(num==1){
                    if(data_nama.value==""||data_nip.value==""){
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
        $('#table'+num+' .cek').attr('onclick','tes2('+num+')');
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
<h2>Peserta <?php echo $program['name'] ?></h2>
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
        <td>NIP</td>
        <td><div class="input-append">
            <input class="nip" type="text" name="nip[]" placeholder="NIP"/><span class="cek btn">Cek!</span>    
            </div>
        </td>
    </tr>
    <tr>
        <td>Nama</td>
        <td><input class="nama" type="text" name="nama[]" placeholder="Nama" readonly/></td>
    </tr>
    <tr>
        <td>Pangkat/Gol</td>
        <td><input class="gol" type="text" name="gol[]" placeholder="Golongan" readonly/></td>
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

<form name="form_reg" id="form_reg" action="diklat/registrasi_proses" method="POST">
    <input type="hidden" id="id_diklat" name="id_diklat" value="<?php echo $id_diklat?>"/>
    <table width="800" class="table table-condensed">
        <tr>
            <td>Asal Instansi Peserta</td>
            <td><input type="text" id="instansi" name="instansi"/></td>
        </tr>
        <tr>
            <td>Tahun registrasi</td>
            <?php
            $now = date('Y');
            $arr_thn = array($now => $now, $now + 1 => $now + 1, $now + 2 => $now + 2, $now + 3 => $now + 3, $now + 4 => $now + 4);
            ?>
            <td><?php echo form_dropdown('tahun', $arr_thn, $now, 'id="tahun"') ?></td>
        </tr>
    </table>
    <div id="wrap_form">
    </div>
    <div class="form-actions">
        <a href="javascript:append_table()" class="btn btn-small"><i class="icon-plus"></i> Tambah Peserta</a>
        <a href="javascript:delete_table()" class="btn btn-small"><i class="icon-minus"></i> Hapus</a>
        <input type="button" class="btn btn-large btn-primary pull-right" value="Simpan Semua" onclick="validate_form()"/>
    </div>
</form>