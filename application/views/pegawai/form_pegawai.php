<script>   

    $(document).ready(function(){	
        $('.add_riwayat_jabatan').live('click',function(){
            $(this).text('Delete');
            $(this).attr('class','del btn btn-danger btn-mini');
            $('.input_riwayat').clone().removeClass().appendTo('#riwayat');
        });
		
        $('.del').live('click',function(){
            $(this).parent().remove();
        });
	});
	


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
<form name="form_reg" id="form_reg" action="<?php echo base_url();
    if($type=='add')
        echo "pegawai/tambah_pegawai_process"; 
    else
        echo "pegawai/edit_pegawai_process/".$data['id'];
    ?>" method="POST" enctype="multipart/form-data">
    <div id="wrap_form">
    </div>
    <table class="table table-condensed">
        <tbody>
		<input class="nip" type="hidden"  name="id" value="<?php $data['id']?>">
        <tr>
            <td>Foto 3x4</td>
            <td>
                <p><img src="assets/public/foto/<?php echo $data['foto'] ?>" height="100"/></p>
                <input type="file" name="foto" />
                <p>Jenis file: jpg, png, gif, max 200kB</p>
            </td>
        </tr>
        <tr>
            <td>NIP/Nama</td>
            <td><input class="nip" type="text" name="nip" placeholder="NIP" value="<?php echo $data['nip']?>"/> / <input class="nama" type="text" name="nama" placeholder="Nama"  value="<?php echo $data['nama']?>"/></td>
        </tr>
        <tr>
            <td>Tempat Tanggal Lahir</td>
            <td><input class="tempat" type="text" name="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $data['tempat_lahir']?>"/> / 
                <input class="tgllahir" type="text" name="tanggal_lahir" placeholder="Tanggal Lahir (tgl-bln-thn)"  <?php if ($data['tanggal_lahir']) echo 'value="'.$this->date->konversi1($data['tanggal_lahir']).'"'; ?>/></td>
        </tr>
        <tr>
            <td>Pangkat/Gol</td>
            <td><?php echo form_dropdown('kode_gol',$pil_pangkat)?></td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td><textarea class="jabatan" name="jabatan" placeholder="Jabatan" value="<?php echo $data['jabatan']?>"></textarea></td>
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
            <td><input class="gelar_akademis" type="text" name="gelar_akademis" placeholder="Gelar Akademis" value="<?php echo $data['gelar_akademis']?>"/></td>
        </tr>
        <tr>
            <td>Pendidikan Terakhir</td>
            <td><?php echo form_dropdown('kode_pendidikan',$pil_pendidikan)?></td>
        </tr>
        <tr>
            <td>Unit Kerja</td>
            <td><input class="unit_kerja" type="text" name="unit_kerja" placeholder="Unit Kerja" value="<?php echo $data['unit_kerja']?>"/></td>
        </tr>
        <tr>
            <td>Alamat Rumah</td>
            <td><input class="alamat_rumah" type="text" name="alamat_rumah" placeholder="Alamat Rumah" value="<?php echo $data['alamat_rumah']?>"/></td>
        </tr>
        <tr>
            <td>Agama</td>
            <td><input class="agama" type="text" name="agama" placeholder="Agama" value="<?php echo $data['agama']?>"/></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input class="email" type="text" name="email" placeholder="Email" value="<?php echo $data['email']?>"/></td>
        </tr>
        <tr>
            <td>Telepon</td>
            <td><input class="telepon" type="text" name="telepon" placeholder="Telepon" value="<?php echo $data['telepon']?>"/></td>
        </tr>
        <tr>
            <td>TMT Golongan</td>
            <td><input class="tanggal tmtgol" type="text" name="tmtgol" placeholder="TMT Golongan" value="<?php echo $data['tmtgol']?>"/></td>
        </tr>
        <tr>
            <td>TMTC PNS</td>
            <td><input class="tanggal tmtcpns" type="text" name="tmtcpns" placeholder="TMTC PNS" value="<?php echo $data['tmtcpns']?>"/></td>
        </tr>
        <tr>
            <td>TMT PNS</td>
            <td><input class="tanggal tmtpns" type="text" name="tmtpns" placeholder="TMT PNS" value="<?php echo $data['tmtpns']?>"/></td>
        </tr>
        <tr>
            <td>TMT Jabatan</td>
            <td><input class="tanggal tmtjabatan" type="text" name="tmtjabatan" placeholder="TMT Jabatan" value="<?php echo $data['tmtjabatan']?>"/></td>
        </tr>
        <tr>
            <td>TMT Jabatan Baru</td>
            <td><input class="tanggal tmtjabbaru" type="text" name="tmtjabbaru" placeholder="TMT Jabatan Baru" value="<?php echo $data['tmtjabbaru']?>"/></td>
        </tr>
        <tr>
            <td>TMT Mutasi</td>
            <td><input class="tanggal tmtmutasi" type="text" name="tmtmutasi" placeholder="TMT Mutasi" value="<?php echo $data['tmtmutasi']?>"/></td>
        </tr>
        </tbody>
		
        <tr>
            <td>History Pelatihan</td>
            <td colspan="2" class="pns">
                <div id="riwayat">
                    <?php
						if($history!='')
						{
						foreach($history as $h){
					?>
                    <div>
                        <input type="text" class="input-small" name="periode_jbtn[]" value="<?php echo $h['tahun']?>"/>
                        <input type="text" name="riwayat_jbtn[]" value="<?php echo $h['nama_pelatihan']?>"/>
                        <button type="button" class="del btn btn-mini btn-danger">Delete</button>
                    </div>
                    <?php }} ?>
                    <div>
                        <input type="text" class="input-small" placeholder="Tahun" name="periode_jbtn[]"/>
                        <input type="text" placeholder="Jabatan" name="riwayat_jbtn[]"/>
                        <button type="button" class="add_riwayat_jabatan btn btn-mini"><i class="icon-plus"></i> Tambah</button>
                    </div>
                    <div class="input_riwayat hide">
                        <input type="text" class="input-small" placeholder="Tahun" name="periode_jbtn[]"/>
                        <input type="text" placeholder="Jabatan" name="riwayat_jbtn[]"/>
                        <button type="button" class="add_riwayat_jabatan btn btn-mini"><i class="icon-plus"></i> Tambah</button>
                    </div>
                </div>
            </td>
        </tr>
		
    </table>
    <div class="form-actions">
        <input type="submit" class="btn btn-large btn-primary" value="Simpan" onclick="validate_form()"/>
    </div>
</form>