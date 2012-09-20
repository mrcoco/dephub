<script>
    var num=0;
    var option;
    var kode_kantor
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
            $('#table'+num+' .id').val(result['id']);
            $('#table'+num+' .nama').val(result['nama']);
            $('#table'+num+' .pangkat').val(result['pangkat']);
            $('#table'+num+' .gol').val(result['golongan']);
            $('#table'+num+' .jabatan').text(result['jabatan']);
            $('#table'+num+' .view_history').attr('onclick','view_history('+result['id']+')');
            $('#table'+num+' .view_detail').attr('onclick','view_detail('+result['id']+')');
        });
    }
    
    function validate_form(){
        var container=$('.alert');
        container.html('');
        
        if(document.form_reg.elements["nama"].value=="" || 
            document.form_reg.elements["nip"].value=="")
        {
            container.show('blind');
            container.append('Isikan kolom nama dan NIP secara lengkap<br />');
        }
        else
        {
            document.form_reg.submit();
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

<!-- Selesai Contoh-->
<div id="display_dialog" class="modal hide"></div>

<form name="form_reg" id="form_reg" action="penyelenggaraan/pegawai/tambah_pegawai_process" method="POST">
    <div id="wrap_form">
    </div>
    <table class="table table-condensed">
        <thead>
            <tr>
                <th colspan="2">Penambahan Pegawai</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <td>NIP/Nama</td>
            <td><input class="nip" type="text" name="nip" placeholder="NIP"/> / <input class="nama" type="text" name="nama" placeholder="Nama"/></td>
        </tr>
        <tr>
            <td>Tempat Tanggal Lahir</td>
            <td><input class="tempat" type="text" name="tempat_lahir" placeholder="Tempat Lahir"/> / <input class="tanggal" type="text" name="tanggal_lahir" placeholder="Tanggal Lahir"/></td>
        </tr>
        <tr>
            <td>Pangkat/Gol</td>
            <td><input class="pangkat" type="text" name="pangkat" placeholder="Pangkat"/> / <input class="gol" type="text" name="golongan" placeholder="Golongan"/></td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td><textarea class="jabatan" name="jabatan" placeholder="Jabatan"></textarea></td>
        </tr>
        <tr>
            <td>Instansi</td>
            <td><input class="instansi" type="text" name="instansi" placeholder="Instansi"/></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td><input class="jenis_kelamin" type="text" name="jenis_kelamin" placeholder="Jenis Kelamin"/></td>
        </tr>
        <tr>
            <td>Gelar Akademis</td>
            <td><input class="gelar_akademis" type="text" name="gelar_akademis" placeholder="Gelar Akademis"/></td>
        </tr>
        <tr>
            <td>Pendidikan Terakhir</td>
            <td><input class="pendidikan_terakhir" type="text" name="pendidikan_terakhir" placeholder="Pendidikan Terakhir"/></td>
        </tr>
        <tr>
            <td>Unit Kerja</td>
            <td><input class="unit_kerja" type="text" name="unit_kerja" placeholder="Unit Kerja"/></td>
        </tr>
        <tr>
            <td>Alamat Rumah</td>
            <td><input class="alamat_rumah" type="text" name="alamat_rumah" placeholder="Alamat Rumah"/></td>
        </tr>
        <tr>
            <td>Agama</td>
            <td><input class="agama" type="text" name="agama" placeholder="Agama"/></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input class="email" type="text" name="email" placeholder="Email"/></td>
        </tr>
        <tr>
            <td>Telepon</td>
            <td><input class="telepon" type="text" name="telepon" placeholder="Telepon"/></td>
        </tr>
        <tr>
            <td>TMT Golongan</td>
            <td><input class="tmtgol" type="text" name="tmtgol" placeholder="TMT Golongan"/></td>
        </tr>
        <tr>
            <td>TMTC PNS</td>
            <td><input class="tmtcpns" type="text" name="tmtcpns" placeholder="TMTC PNS"/></td>
        </tr>
        <tr>
            <td>TMT PNS</td>
            <td><input class="tmtpns" type="text" name="tmtpns" placeholder="TMT PNS"/></td>
        </tr>
        <tr>
            <td>TMT Jabatan</td>
            <td><input class="tmtjabatan" type="text" name="tmtjabatan" placeholder="TMT Jabatan"/></td>
        </tr>
        <tr>
            <td>TMT Jabatan Baru</td>
            <td><input class="tmtjabbaru" type="text" name="tmtjabbaru" placeholder="TMT Jabatan Baru"/></td>
        </tr>
        <tr>
            <td>TMT Mutasi</td>
            <td><input class="tmtmutasi" type="text" name="tmtmutasi" placeholder="TMT Mutasi"/></td>
        </tr>
        </tbody>
    </table>
    <div class="form-actions">
        <input type="button" class="btn btn-large btn-primary pull-right" value="Daftar" onclick="validate_form()"/>
    </div>
</form>