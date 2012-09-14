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
        $('.add_riwayat_jabatan').live('click',function(){
            $(this).text('Delete');
            $(this).attr('class','del btn btn-danger btn-mini');
            $('.input_riwayat').clone().removeClass().appendTo('#riwayat');
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
        kategori=$('#kategori').val();
        if(nama==''){
            alert('Harap isi nama');
        }else if(kategori==-1){
            alert('Harap isi kategori pembicara');
        }else if(nip==''){
            if($('#kategori').val()==1){
                alert('Harap isi nip');
            }else{
                document.form_dosen.submit();
            }
        }else{
            document.form_dosen.submit();
        }
    }
        
</script>

<p align="center" class="lead">Curriculum Vitae Dosen Tamu</p>
<form name="form_dosen" action="penyelenggaraan/dosen_tamu/insert_dosen" method="POST">
    <table class="table table-striped">
        <tr>
            <th colspan="2">Data Pribadi</th>
        </tr>
        <tr>
            <td>Nama</td>
            <td><input id="nama" type="text" placeholder="Nama" name="nama"/></td>
        </tr>
        <tr>
            <td>Kategori</td>
            <td><?php echo form_dropdown('kategori',$kategori,'','id="kategori"')?></td>
        </tr>
        <tr class="pns">
            <td>NIP</td>
            <td><input id="nip" type="text" placeholder="NIP" name="nip"/></td>
        </tr>
        <tr>
            <td>Tempat Tanggal Lahir</td>
            <td><input type="text" name="tempat" placeholder="Tempat lahir"/>, <input type="text" id="date" name="tanggal" placeholder="Tahun-Bulan-Tanggal"/></td>
        </tr>
        <tr class="pns">
            <td>Pangkat/Gol</td>
            <td><input type="text" name="pangkat" placeholder="Pangkat"/>/<input type="text" placeholder="Golongan" name="gol"/></td>
        </tr>
        <tr class="pns">
            <td>Instansi</td>
            <td><textarea name="instansi"></textarea></td>
        </tr>
        <tr class="pns">
            <td>Jabatan</td>
            <td><textarea name="jabatan"></textarea></td>
        </tr>
        <tr>
            <td>Alamat rumah</td>
            <td><textarea name="alamat_rumah"></textarea></td>
        </tr>
        <tr>
            <td>Telepon rumah</td>
            <td><input type="text" name="tlp_rumah"/></td>
        </tr>
        <tr>
            <td>Alamat kantor</td>
            <td><textarea name="alamat_kantor"></textarea></td>
        </tr>
        <tr>
            <td>Telepon kantor</td>
            <td><input type="text" name="tlp_kantor"/></td>
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
                    <div class="form-inline">
                        <input type="text" placeholder="Pendidikan" name="luar_ngri[]"/>
                        <input type="text" class="input-small" placeholder="Tahun" name="periode_luar_ngri[]"/>
                        <button type="button" class="add_luar_ngri btn btn-mini"><i class="icon-plus"></i> Tambah</button>
                    </div>
                    <div class="input_luar_ngri hide">
                        <div class="form-inline">
                            <input type="text" placeholder="Pendidikan" name="luar_ngri[]"/>
                            <input type="text" class="input-small" placeholder="Tahun" name="periode_luar_ngri[]"/>
                            <button type="button" class="add_luar_ngri btn btn-mini"><i class="icon-plus"></i> Tambah</button>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        <tr class="pns">
            <th colspan="2">Riwayat Pekerjaan</th>
        </tr>
        <tr  class="pns">
            <td colspan="2">
                <div id="riwayat">
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
        <tr  class="pns">
            <th colspan="2">Riwayat Kursus</th>
        </tr>
        <tr  class="pns">
            <td colspan="2">
                <div id="kursus">
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
        <tr  class="pns">
            <th colspan="2">Riwayat Diklat</th>
        </tr>
        <tr  class="pns">
            <td colspan="2">
                <div id="diklat">
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
        <button onclick="validate()" type="button" class="btn btn-primary btn-large">Simpan Dosen</button>
    </div>
</form>