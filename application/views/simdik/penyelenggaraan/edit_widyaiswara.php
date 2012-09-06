<script type="text/javascript">
    $(document).ready(function(){		

        $('.del').live('click',function(){
            $(this).parent().remove();
        });

        $('.add_riwayat_jabatan').live('click',function(){
            $(this).remove();
            var appendTxt = '<div><input type="text" name="riwayat_jbtn[]"/> <input type="text" name="periode_jbtn[]"/> <span class="add_riwayat_jabatan">Tambah</span></div>';
            $("#riwayat").append(appendTxt);			
        });
                
        $('.add_dlm_ngri').live('click',function(){
            $(this).remove();
            var appendTxt = '<div><input type="text" name="dlm_ngri[]"/> <input type="text" name="periode_dlm_ngri[]"/> <span class="add_dlm_ngri">Tambah</span></div>';
            $("#dlm_ngri").append(appendTxt);			
        });
                
        $('.add_luar_ngri').live('click',function(){
            $(this).remove();
            var appendTxt = '<div><input type="text" name="luar_ngri[]"/> <input type="text" name="periode_luar_ngri[]"/> <span class="add_luar_ngri">Tambah</span></div>';
            $("#luar_ngri").append(appendTxt);			
        });
        
        $('.add_kursus').live('click',function(){
            $(this).text('Delete');
            $(this).attr('class','del');
            var appendTxt = '<div><input type="text" name="kursus[]"/> <input type="text" name="thn_kursus[]"/> <span class="add_kursus">Tambah</span></div>';
            $("#kursus").append(appendTxt);			
        });

        $('.add_diklat').live('click',function(){
            $(this).text('Delete');
            $(this).attr('class','del');
            var appendTxt = '<div><input type="text" name="diklat[]"/> <span class="add_diklat">Tambah</span></div>';
            $("#diklat").append(appendTxt);			
        });
    });
        
    function validate(){
        nama=$('#nama').val();
        nip=$('#nip').val();
        if(nama==''){
            alert('Harap isi nama');
        }else if(nip==''){
            alert('Harap isi nip');
        }else{
            document.form_widyaiswara.submit();
        }
    }
        
</script>
<p align="center" class="lead">Curriculum Vitae Pengajar/Penceramah</p>
<form name-form_widyaiswara action="penyelenggaraan/widyaiswara/edit_process" method="POST">
    <input type="hidden" name="id" value="<?php echo $data['id'] ?>"/>    
    <table class="table table-striped table-condensed">
        <tr>
            <td>Nama</td>
            <td><input id="nama" type="text" name="nama" value="<?php echo $data['nama'] ?>"/></td>
        </tr>
        <tr>
            <td>NIP</td>
            <td><input id="nip" type="text" name="nip" value="<?php echo $data['nip'] ?>"/></td>
        </tr>
        <tr>
            <td>Tempat Tanggal Lahir</td>
            <td><input type="text" name="tempat" value="<?php echo $data['tempat_lahir'] ?>"/>, <input type="text" id="date" name="tanggal" value="<?php echo $data['tanggal_lahir'] ?>"/></td>
        </tr>
        <tr>
            <td>Pangkat/Gol</td>
            <td><input type="text" name="pangkat" value="<?php echo $data['pangkat'] ?>"/>/<input type="text" name="gol" value="<?php echo $data['pangkat'] ?>"/></td>
        </tr>
        <tr>
            <td>Instansi</td>
            <td><textarea name="instansi"><?php echo $data['instansi'] ?></textarea></td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td><textarea name="jabatan"><?php echo $data['jabatan'] ?></textarea></td>
        </tr>
        <tr>
            <td>Alamat rumah</td>
            <td><textarea name="alamat_rumah"><?php echo $data['alamat_rumah'] ?></textarea></td>
        </tr>
        <tr>
            <td>Telepon rumah</td>
            <td><input type="text" name="tlp_rumah" value="<?php echo $data['tlp_rumah'] ?>"/></td>
        </tr>
        <tr>
            <td>Alamat kantor</td>
            <td><textarea name="alamat_kantor"><?php echo $data['alamat_kantor'] ?></textarea></td>
        </tr>
        <tr>
            <td>Telepon kantor</td>
            <td><input type="text" name="tlp_kantor" value="<?php echo $data['tlp_kantor'] ?>"/></td>
        </tr>
        <tr>
            <th colspan="2">Pendidikan</th>
        </tr>
        <tr>
            <td colspan="2">a. Dalam negeri</td>
        </tr>
        <tr>
            <td colspan="2">
                <div id="dlm_ngri">
                    <?php if(count($data['dn'])==0){ ?>
                    <div>
                        <input type="text" name="dlm_ngri[]"/>
                        <input type="text" name="periode_dlm_ngri[]"/>
                        <span class="add_dlm_ngri">Tambah</span>
                    </div>
                    <?php } else { ?>
                    <?php for($i=0;$i<count($data['dn']);$i++){?>
                    <div>
                        <input type="text" name="dlm_ngri[]" value="<?php echo $data['dn'][$i]?>"/>
                        <input type="text" name="periode_dlm_ngri[]" value="<?php echo $data['periode_dn'][$i]?>"/>
                        <span class="del">Delete</span>
                        <?php if($i==(count($data['dn'])-1)) {?>
                        <span class="add_dlm_ngri">Tambah</span>
                        <?php } ?>
                    </div>
                    <?php } ?>
                    <?php } ?>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2">b. Luar negeri</td>
        </tr>
        <tr>
            <td colspan="2">
                <div id="luar_ngri">
                    <?php if(count($data['ln'])==0){?>
                    <div>
                        <input type="text" name="luar_ngri[]"/>
                        <input type="text" name="periode_luar_ngri[]"/>
                        <span class="add_luar_ngri">Tambah</span>
                    </div>
                    <?php } else {?>
                    <?php for($i=0;$i<count($data['ln']);$i++){?>
                    <div>
                        <input type="text" name="luar_ngri[]" value="<?php echo $data['ln'][$i]?>"/>
                        <input type="text" name="periode_luar_ngri[]" value="<?php echo $data['periode_ln'][$i]?>"/>
                        <span class="del">Delete</span>
                        <?php if($i==(count($data['ln'])-1)) {?>
                        <span class="add_luar_ngri">Tambah</span>
                        <?php } ?>
                    </div>
                    <?php } ?>
                    <?php } ?>
                </div>
            </td>
        </tr>
        <tr>
            <th colspan="2">Riwayat Pekerjaan</th>
        </tr>
        <tr>
            <td>Nama Jabatan</td>
            <td>Periode</td>
        </tr>
        <tr>
            <td colspan="2">
                <div id="riwayat">
                    <?php if(count($data['riwayat'])==0){?>
                    <div>
                        <input type="text" name="riwayat_jbtn[]"/>
                        <input type="text" name="periode_jbtn[]"/>
                        <span class="add_riwayat_jabatan">Tambah</span>
                    </div>
                    <?php } else { ?>
                    <?php for($i=0;$i<count($data['riwayat']);$i++){?>
                    <div>
                        <input type="text" name="riwayat_jbtn[]" value="<?php echo $data['riwayat'][$i]?>"/>
                        <input type="text" name="periode_jbtn[]" value="<?php echo $data['periode'][$i]?>"/>
                        <span class="del">Delete</span>
                        <?php if($i==(count($data['riwayat'])-1)) {?>
                        <span class="add_riwayat_jabatan">Tambah</span>
                        <?php } ?>
                    </div>
                    <?php } ?>
                    <?php } ?>
                </div>
            </td>
        </tr>
        <tr>
            <th colspan="2">Riwayat Kursus</th>
        </tr>
        <tr>
            <td>Nama Kursus</td>
            <td>Tahun</td>
        </tr>
        <tr>
            <td colspan="2">
                <div id="kursus">
                    <?php if(count($data['kursus'])==0){?>
                    <div>
                        <input type="text" name="kursus[]"/>
                        <input type="text" name="thn_kursus[]"/>
                        <span class="add_kursus">Tambah</span>
                    </div>
                    <?php } else { ?>
                    <?php for($i=0;$i<count($data['kursus']);$i++){?>
                    <div>
                        <input type="text" name="kursus[]" value="<?php echo $data['kursus'][$i]?>"/>
                        <input type="text" name="thn_kursus[]" value="<?php echo $data['periode_kursus'][$i]?>"/>
                        <span class="del">Delete</span>
                        <?php if($i==(count($data['kursus'])-1)) {?>
                        <span class="add_kursus">Tambah</span>
                        <?php } ?>
                    </div>
                    <?php } ?>
                    <?php } ?>
                </div>
            </td>
        </tr>
        <tr>
            <th colspan="2">Riwayat Diklat</th>
        </tr>
        <tr>
            <td colspan="2">
                <div id="diklat">
                    <?php if(count($data['diklat'])==0){?>
                    <div>
                        <input type="text" name="diklat[]"/>
                        <span class="add_diklat">Tambah</span>
                    </div>
                    <?php } else { ?>
                    <?php for($i=0;$i<count($data['diklat']);$i++){?>
                    <div>
                        <input type="text" name="diklat[]" value="<?php echo $data['diklat'][$i]?>"/>
                        <span class="del">Delete</span>
                        <?php if($i==(count($data['diklat'])-1)) {?>
                        <span class="add_diklat">Tambah</span>
                        <?php } ?>
                    </div>
                    <?php } ?>
                    <?php } ?>
                </div>
            </td>
        </tr>
    </table>
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button onclick="location.href='<?php echo base_url()?>penyelenggaraan/widyaiswara/detail_widyaiswara/<?php echo $data['id'] ?>'" type="button" class="btn btn-primary">Batal</button>
    </div>
</form>