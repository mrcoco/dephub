<script>   
    $(function(){
        $('.tanggal').datepicker({
            format: 'yyyy-mm-dd'
        });
        $('#display_history').modal({
            show: false
        });
    });
</script>
<div class="alert alert-error fade in none"></div>

<form name="form_reg" id="form_reg" action="<?php echo base_url()?>pegawai/tambah_pegawai_process" method="POST">
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
            <td><?php echo form_dropdown('kode_gol',$pil_pangkat)?></td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td><textarea class="jabatan" name="jabatan" placeholder="Jabatan"></textarea></td>
        </tr>
        <tr>
            <td>Instansi</td>
            <td><?php echo form_dropdown('instansi',$pil_instansi)?></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td><?php echo form_dropdown('jenis_kelamin',array('L'=>'Laki-Laki','P'=>'Perempuan'))?></td>
        </tr>
        <tr>
            <td>Gelar Akademis</td>
            <td><input class="gelar_akademis" type="text" name="gelar_akademis" placeholder="Gelar Akademis"/></td>
        </tr>
        <tr>
            <td>Pendidikan Terakhir</td>
            <td><?php echo form_dropdown('kode_pendidikan',$pil_pendidikan)?></td>
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
            <td><input class="tanggal tmtgol" type="text" name="tmtgol" placeholder="TMT Golongan"/></td>
        </tr>
        <tr>
            <td>TMTC PNS</td>
            <td><input class="tanggal tmtcpns" type="text" name="tmtcpns" placeholder="TMTC PNS"/></td>
        </tr>
        <tr>
            <td>TMT PNS</td>
            <td><input class="tanggal tmtpns" type="text" name="tmtpns" placeholder="TMT PNS"/></td>
        </tr>
        <tr>
            <td>TMT Jabatan</td>
            <td><input class="tanggal tmtjabatan" type="text" name="tmtjabatan" placeholder="TMT Jabatan"/></td>
        </tr>
        <tr>
            <td>TMT Jabatan Baru</td>
            <td><input class="tanggal tmtjabbaru" type="text" name="tmtjabbaru" placeholder="TMT Jabatan Baru"/></td>
        </tr>
        <tr>
            <td>TMT Mutasi</td>
            <td><input class="tanggal tmtmutasi" type="text" name="tmtmutasi" placeholder="TMT Mutasi"/></td>
        </tr>
        </tbody>
    </table>
    <div class="form-actions">
        <input type="submit" class="btn btn-large btn-primary pull-right" value="Daftar" onclick="validate_form()"/>
    </div>
</form>