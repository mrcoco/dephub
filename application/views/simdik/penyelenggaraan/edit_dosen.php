<script type="text/javascript">
    $(document).ready(function(){		
        
        $('.pns').hide();

        if($('#kategori').val()==1){
            $('.pns').show();
        }

        $('#kategori').live('change',function(){
            if($(this).val()==1){
                $('.pns').show();
            }else{
                $('.pns').hide();
            }
        });
        
        $('.del').live('click',function(){
            $(this).parent().remove();
        });

        $('.add_riwayat_jabatan').live('click',function(){
            $(this).text('Delete');
            $(this).attr('class','del btn btn-danger btn-mini');
            $('.input_riwayat').clone().removeClass().appendTo('#riwayat');
        });
                
        $('.add_dlm_ngri').live('click',function(){
            $(this).text('Delete');
            $(this).attr('class','del btn btn-danger btn-mini');
            $('.input_dlm_ngri').clone().removeClass().appendTo('#dlm_ngri');
        });
                
        $('.add_luar_ngri').live('click',function(){
            $(this).text('Delete');
            $(this).attr('class','del btn btn-danger btn-mini');
            $('.input_luar_ngri').clone().removeClass().appendTo('#luar_ngri');
        });
        
        $('.add_kursus').live('click',function(){
            $(this).text('Delete');
            $(this).attr('class','del btn btn-danger btn-mini');
            $('.input_kursus').clone().removeClass().appendTo('#kursus');
        });

        $('.add_diklat').live('click',function(){
            $(this).text('Delete');
            $(this).attr('class','del btn btn-danger btn-mini');
            $('.input_diklat').clone().removeClass().appendTo('#diklat');
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
            document.form_dosen.submit();
        }
    }
        
</script>
<p align="center" class="lead">Curriculum Vitae Pengajar/Penceramah</p>
<form name="form_dosen" action="penyelenggaraan/dosen_tamu/edit_process" method="POST">
    <input type="hidden" name="id" value="<?php echo $data['id'] ?>"/>    
    <table class="table table-striped table-condensed">
        <tr>
            <td>Nama</td>
            <td><input id="nama" type="text" name="nama" value="<?php echo $data['nama'] ?>"/></td>
        </tr>
        <tr>
            <td>Kategori</td>
            <td><?php echo form_dropdown('kategori',$kategori,$data['is_pns'],'id="kategori"')?></td>
        </tr>
        <tr class="pns">
            <td>NIP</td>
            <td><input id="nip" type="text" name="nip" value="<?php echo $data['nip'] ?>"/></td>
        </tr>
        <tr>
            <td>Tempat Tanggal Lahir</td>
            <td><input type="text" name="tempat" value="<?php echo $data['tempat_lahir'] ?>"/>, <input type="text" id="date" name="tanggal" value="<?php echo $data['tanggal_lahir'] ?>"/></td>
        </tr>
        <tr class="pns">
            <td>Pangkat/Gol</td>
            <td><input type="text" name="pangkat" value="<?php echo $data['pangkat'] ?>"/>/<input type="text" name="gol" value="<?php echo $data['pangkat'] ?>"/></td>
        </tr>
        <tr class="pns">
            <td>Instansi</td>
            <td><textarea name="instansi"><?php echo $data['instansi'] ?></textarea></td>
        </tr>
        <tr class="pns">
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
                    <?php for($i=0;$i<count($data['dn']);$i++){?>
                    <div>
                        <input type="text" name="dlm_ngri[]" value="<?php echo $data['dn'][$i]?>"/>
                        <input type="text" class="input-small" name="periode_dlm_ngri[]" value="<?php echo $data['periode_dn'][$i]?>"/>
                        <button type="button" class="del btn btn-mini btn-danger">Delete</button>
                    </div>
                    <?php } ?>
                    <div>
                        <input type="text" placeholder="Pendidikan" name="dlm_ngri[]"/>
                        <input type="text" class="input-small" placeholder="Tahun" name="periode_dlm_ngri[]"/>
                        <button type="button" class="add_dlm_ngri btn btn-mini"><i class="icon-plus"></i> Tambah</button>
                    </div>
                    <div class="input_dlm_ngri hide">
                        <input type="text" placeholder="Pendidikan" name="dlm_ngri[]"/>
                        <input type="text" class="input-small" placeholder="Tahun" name="periode_dlm_ngri[]"/>
                        <button type="button" class="add_dlm_ngri btn btn-mini"><i class="icon-plus"></i> Tambah</button>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2">b. Luar negeri</td>
        </tr>
        <tr>
            <td colspan="2">
                <div id="luar_ngri">
                    <?php for($i=0;$i<count($data['ln']);$i++){?>
                    <div>
                        <input type="text" name="luar_ngri[]" value="<?php echo $data['ln'][$i]?>"/>
                        <input type="text" class="input-small" name="periode_luar_ngri[]" value="<?php echo $data['periode_ln'][$i]?>"/>
                        <button type="button" class="del btn btn-mini btn-danger">Delete</button>
                    </div>
                    <?php } ?>
                    <div>
                        <input type="text" placeholder="Pendidikan" name="dlm_ngri[]"/>
                        <input type="text" class="input-small" placeholder="Tahun" name="periode_dlm_ngri[]"/>
                        <button type="button" class="add_luar_ngri btn btn-mini"><i class="icon-plus"></i> Tambah</button>
                    </div>
                    <div class="input_luar_ngri hide">
                        <input type="text" placeholder="Pendidikan" name="dlm_ngri[]"/>
                        <input type="text" class="input-small" placeholder="Tahun" name="periode_dlm_ngri[]"/>
                        <button type="button" class="add_luar_ngri btn btn-mini"><i class="icon-plus"></i> Tambah</button>
                    </div>
                </div>
            </td>
        </tr>
        <tr class="pns">
            <th colspan="2">Riwayat Pekerjaan</th>
        </tr>
        <tr class="pns">
            <td colspan="2">
                <div id="riwayat">
                    <?php for($i=0;$i<count($data['riwayat']);$i++){?>
                    <div>
                        <input type="text" name="riwayat_jbtn[]" value="<?php echo $data['riwayat'][$i]?>"/>
                        <input type="text" class="input-small" name="periode_jbtn[]" value="<?php echo $data['periode'][$i]?>"/>
                        <button type="button" class="del btn btn-mini btn-danger">Delete</button>
                    </div>
                    <?php } ?>
                    <div>
                        <input type="text" placeholder="Jabatan" name="riwayat_jbtn[]"/>
                        <input type="text" class="input-small" placeholder="Tahun" name="periode_jbtn[]"/>
                        <button type="button" class="add_riwayat_jabatan btn btn-mini"><i class="icon-plus"></i> Tambah</button>
                    </div>
                    <div class="input_riwayat hide">
                        <input type="text" placeholder="Jabatan" name="riwayat_jbtn[]"/>
                        <input type="text" class="input-small" placeholder="Tahun" name="periode_jbtn[]"/>
                        <button type="button" class="add_riwayat_jabatan btn btn-mini"><i class="icon-plus"></i> Tambah</button>
                    </div>
                </div>
            </td>
        </tr>
        <tr class="pns">
            <th colspan="2">Riwayat Kursus</th>
        </tr>
        <tr class="pns">
            <td colspan="2">
                <div id="kursus">
                    <?php for($i=0;$i<count($data['kursus']);$i++){?>
                    <div>
                        <input type="text" name="kursus[]" value="<?php echo $data['kursus'][$i]?>"/>
                        <input type="text" class="input-small" name="thn_kursus[]" value="<?php echo $data['periode_kursus'][$i]?>"/>
                        <button type="button" class="del btn btn-mini btn-danger">Delete</button>
                    </div>
                    <?php } ?>
                    <div>
                        <input type="text" placeholder="Nama Kursus" name="kursus[]"/>
                        <input type="text" class="input-small" placeholder="Tahun" name="thn_kursus[]"/>
                        <button type="button" class="add_kursus btn btn-mini"><i class="icon-plus"></i> Tambah</button>
                    </div>
                    <div class="input_kursus hide">
                        <input type="text" placeholder="Nama Kursus" name="kursus[]"/>
                        <input type="text" class="input-small" placeholder="Tahun" name="thn_kursus[]"/>
                        <button type="button" class="add_kursus btn btn-mini"><i class="icon-plus"></i> Tambah</button>
                    </div>
                </div>
            </td>
        </tr>
        <tr class="pns">
            <th colspan="2">Riwayat Diklat</th>
        </tr>
        <tr class="pns">
            <td colspan="2">
                <div id="diklat">
                    <?php for($i=0;$i<count($data['diklat']);$i++){?>
                    <div>
                        <input type="text" name="diklat[]" value="<?php echo $data['diklat'][$i]?>"/>
                        <button type="button" class="del btn btn-mini btn-danger">Delete</button>
                    </div>
                    <?php } ?>
                    <div>
                        <input type="text" placeholder="Nama Diklat" name="diklat[]"/>
                        <button type="button" class="add_diklat btn btn-mini"><i class="icon-plus"></i> Tambah</button>
                    </div>
                    <div class="input_diklat hide">
                        <input type="text" placeholder="Nama Diklat" name="diklat[]"/>
                        <button type="button" class="add_diklat btn btn-mini"><i class="icon-plus"></i> Tambah</button>
                    </div>
                </div>
            </td>
        </tr>
    </table>
    <div class="form-actions">
        <input type="submit" class="btn btn-primary btn-large" value="Simpan"/>
        <input type="button" class="btn btn-large" value="Cancel" onclick="history.go(-1)" />
    </div>
</form>