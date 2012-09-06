<script type="text/javascript">
        $(document).ready(function(){		

                $('.del').live('click',function(){
                        $(this).parent().remove();
                });

                $('.add_riwayat_jabatan').live('click',function(){
                    $(this).text('Delete');
                    $(this).attr('class','del');
                    var appendTxt = '<div><input type="text" name="riwayat_jbtn[]"/> <input type="text" name="periode_jbtn[]"/> <span class="add_riwayat_jabatan">Tambah</span></div>';
                    $("#riwayat").append(appendTxt);			
                });
                
                $('.add_dlm_ngri').live('click',function(){
                    $(this).text('Delete');
                    $(this).attr('class','del');
                    var appendTxt = '<div><input type="text" name="dlm_ngri[]"/> <input type="text" name="periode_dlm_ngri[]"/> <span class="add_dlm_ngri">Tambah</span></div>';
                    $("#dlm_ngri").append(appendTxt);			
                });
                
                $('.add_luar_ngri').live('click',function(){
                    $(this).text('Delete');
                    $(this).attr('class','del');
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
<form name="form_widyaiswara" action="penyelenggaraan/widyaiswara/insert_widyaiswara" method="POST">
    <table class="table table-striped table-condensed">
        <tr>
            <th colspan="2">Data Pribadi</th>
        </tr>
        <tr>
            <td>Nama</td>
            <td><input id="nama" type="text" placeholder="Nama" name="nama"/></td>
        </tr>
        <tr>
            <td>NIP</td>
            <td><input id="nip" type="text" placeholder="NIP" name="nip"/></td>
        </tr>
        <tr>
            <td>Tempat Tanggal Lahir</td>
            <td><input type="text" name="tempat" placeholder="Tempat lahir"/>, <input type="text" id="date" name="tanggal" placeholder="Tahun-Bulan-Tanggal"/></td>
        </tr>
        <tr>
            <td>Pangkat/Gol</td>
            <td><input type="text" name="pangkat" placeholder="Pangkat"/>/<input type="text" placeholder="Golongan" name="gol"/></td>
        </tr>
        <tr>
            <td>Instansi</td>
            <td><textarea name="instansi"></textarea></td>
        </tr>
        <tr>
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
            <td>Pendidikan</td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;Tahun</td>
        </tr>
        <tr>
            <td colspan="2">
                <div id="dlm_ngri">
                    <div>
                        <input type="text" name="dlm_ngri[]"/>
                        <input type="text" name="periode_dlm_ngri[]"/>
                        <span class="add_dlm_ngri">Tambah</span>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2">b. Luar negeri</td>
        </tr>
        <tr>
            <td>Pendidikan</td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;Tahun</td>
        </tr>
        <tr>
            <td colspan="2">
                <div id="luar_ngri">
                    <div>
                        <input type="text" name="luar_ngri[]"/>
                        <input type="text" name="periode_luar_ngri[]"/>
                        <span class="add_luar_ngri">Tambah</span>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <th colspan="2">Riwayat Pekerjaan</th>
        </tr>
        <tr>
            <td>Nama Jabatan</td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;Periode</td>
        </tr>
        <tr>
            <td colspan="2">
                <div id="riwayat">
                    <div>
                        <input type="text" name="riwayat_jbtn[]"/>
                        <input type="text" name="periode_jbtn[]"/>
                        <span class="add_riwayat_jabatan">Tambah</span>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <th colspan="2">Riwayat Kursus</th>
        </tr>
        <tr>
            <td>Nama Kursus</td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;Tahun</td>
        </tr>
        <tr>
            <td colspan="2">
                <div id="kursus">
                    <div>
                        <input type="text" name="kursus[]"/>
                        <input type="text" name="thn_kursus[]"/>
                        <span class="add_kursus">Tambah</span>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <th colspan="2">Riwayat Diklat</th>
        </tr>
        <tr>
            <td colspan="2">
                <div id="diklat">
                    <div>
                        <input type="text" name="diklat[]"/>
                        <span class="add_diklat">Tambah</span>
                    </div>
                </div>
            </td>
        </tr>
    </table>
    <div class="form-actions">
        <button onclick="validate()" type="button" class="btn btn-primary">Simpan</button>
        <button type="reset" class="btn cancel">Ulangi</button>
    </div>
</form>