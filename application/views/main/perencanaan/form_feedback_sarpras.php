FORMULIR EVALUASI PENYELENGGARAAN
<br/>
<?php echo strtoupper($program['name']) ?>
<br/>
PUSAT PENGEMBANGAN SDM APARATUR PERHUBUNGAN
<br/>
<br/>
<form action="perencanaan/dashboard/insert_feedback_sarpras" method="post">
    <input type="hidden" name="id_program" value="<?php echo $program['id']?>"/>
    <table border="1">
        <thead>
            <tr>
                <th colspan="5" width="900px">
                    Saran/Evaluasi Peserta
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>No</td>
                <td>Bahan Evaluasi</td>
                <td>Kekurangan/Kelemahan</td>
                <td>Alasan</td>
                <td>Saran Konstruktif</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>1</td>
                <td>Kurikulum Diklat : </td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>a. Mata Pelajaran</td>
                <td><textarea name="1a1" cols="50" rows="2"></textarea></td>
                <td><textarea name="1a2" cols="50" rows="2"></textarea></td>
                <td><textarea name="1a3" cols="50" rows="2"></textarea></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>b. Jam Pelajaran</td>
                <td><textarea name="1b1" cols="50" rows="2"></textarea></td>
                <td><textarea name="1b2" cols="50" rows="2"></textarea></td>
                <td><textarea name="1b3" cols="50" rows="2"></textarea></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>c. Kualitas Pembelajaran di Kelas</td>
                <td><textarea name="1c1" cols="50" rows="2"></textarea></td>
                <td><textarea name="1c2" cols="50" rows="2"></textarea></td>
                <td><textarea name="1c3" cols="50" rows="2"></textarea></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>d. Kualitas Bahan Ajar</td>
                <td><textarea name="1d1" cols="50" rows="2"></textarea></td>
                <td><textarea name="1d2" cols="50" rows="2"></textarea></td>
                <td><textarea name="1d3" cols="50" rows="2"></textarea></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>e. Kualitas Evaluasi Pembelajaran<br/>(Ujian Kelulusan Diklat)</td>
                <td><textarea name="1e1" cols="50" rows="2"></textarea></td>
                <td><textarea name="1e2" cols="50" rows="2"></textarea></td>
                <td><textarea name="1e3" cols="50" rows="2"></textarea></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Sarana dan Prasarana Diklat </td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>a. Toilet (sebutkan lokasinya)</td>
                <td><textarea name="2a1" cols="50" rows="2"></textarea></td>
                <td><textarea name="2a2" cols="50" rows="2"></textarea></td>
                <td><textarea name="2a3" cols="50" rows="2"></textarea></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>b. ATK Diklat (sebutkan apa)</td>
                <td><textarea name="2b1" cols="50" rows="2"></textarea></td>
                <td><textarea name="2b2" cols="50" rows="2"></textarea></td>
                <td><textarea name="2b3" cols="50" rows="2"></textarea></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>c. Asrama Diklat (sebutkan di asrama mana, A/B)</td>
                <td><textarea name="2c1" cols="50" rows="2"></textarea></td>
                <td><textarea name="2c2" cols="50" rows="2"></textarea></td>
                <td><textarea name="2c3" cols="50" rows="2"></textarea></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>d. Gedung Olahraga</td>
                <td><textarea name="2d1" cols="50" rows="2"></textarea></td>
                <td><textarea name="2d2" cols="50" rows="2"></textarea></td>
                <td><textarea name="2d3" cols="50" rows="2"></textarea></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>e. Tempat Ibadah</td>
                <td><textarea name="2e1" cols="50" rows="2"></textarea></td>
                <td><textarea name="2e2" cols="50" rows="2"></textarea></td>
                <td><textarea name="2e3" cols="50" rows="2"></textarea></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>f. Kamar (No berapa, di asrama mana)</td>
                <td><textarea name="2f1" cols="50" rows="2"></textarea></td>
                <td><textarea name="2f2" cols="50" rows="2"></textarea></td>
                <td><textarea name="2f3" cols="50" rows="2"></textarea></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>g. Ruang kelas (sebutkan kelas mana)</td>
                <td><textarea name="2g1" cols="50" rows="2"></textarea></td>
                <td><textarea name="2g2" cols="50" rows="2"></textarea></td>
                <td><textarea name="2g3" cols="50" rows="2"></textarea></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>h. Lab Komputer</td>
                <td><textarea name="2h1" cols="50" rows="2"></textarea></td>
                <td><textarea name="2h2" cols="50" rows="2"></textarea></td>
                <td><textarea name="2h3" cols="50" rows="2"></textarea></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>i. Lab Bahasa</td>
                <td><textarea name="2i1" cols="50" rows="2"></textarea></td>
                <td><textarea name="2i2" cols="50" rows="2"></textarea></td>
                <td><textarea name="2i3" cols="50" rows="2"></textarea></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>j. Perpustakaan</td>
                <td><textarea name="2j1" cols="50" rows="2"></textarea></td>
                <td><textarea name="2j2" cols="50" rows="2"></textarea></td>
                <td><textarea name="2j3" cols="50" rows="2"></textarea></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>k. Koperasi</td>
                <td><textarea name="2k1" cols="50" rows="2"></textarea></td>
                <td><textarea name="2k2" cols="50" rows="2"></textarea></td>
                <td><textarea name="2k3" cols="50" rows="2"></textarea></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>l. Fasilitas Internet</td>
                <td><textarea name="2l1" cols="50" rows="2"></textarea></td>
                <td><textarea name="2l2" cols="50" rows="2"></textarea></td>
                <td><textarea name="2l3" cols="50" rows="2"></textarea></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Penyelenggaraan Diklat</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>a. Efektifitas penyelenggaraan</td>
                <td><textarea name="3a1" cols="50" rows="2"></textarea></td>
                <td><textarea name="3a2" cols="50" rows="2"></textarea></td>
                <td><textarea name="3a3" cols="50" rows="2"></textarea></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>b. Kesesuaian pelaksanaan program dengan rencana awal</td>
                <td><textarea name="3b1" cols="50" rows="2"></textarea></td>
                <td><textarea name="3b2" cols="50" rows="2"></textarea></td>
                <td><textarea name="3b3" cols="50" rows="2"></textarea></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>c. Kesiapan Panitia</td>
                <td><textarea name="3c1" cols="50" rows="2"></textarea></td>
                <td><textarea name="3c2" cols="50" rows="2"></textarea></td>
                <td><textarea name="3c3" cols="50" rows="2"></textarea></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>d. Administrasi Diklat</td>
                <td><textarea name="3d1" cols="50" rows="2"></textarea></td>
                <td><textarea name="3d2" cols="50" rows="2"></textarea></td>
                <td><textarea name="3d3" cols="50" rows="2"></textarea></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>e. Pelayanan Terhadap peserta</td>
                <td><textarea name="3e1" cols="50" rows="2"></textarea></td>
                <td><textarea name="3e2" cols="50" rows="2"></textarea></td>
                <td><textarea name="3e3" cols="50" rows="2"></textarea></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>f. Kebersihan Lingkungan Diklat</td>
                <td><textarea name="3f1" cols="50" rows="2"></textarea></td>
                <td><textarea name="3f2" cols="50" rows="2"></textarea></td>
                <td><textarea name="3f3" cols="50" rows="2"></textarea></td>
            </tr>
            <tr>
                <td>4</td>
                <td colspan="4">MANFAAT DARI PROGRAM DIKLAT DI KANTOR ANDA</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="4"><textarea name="manfaat" rows="3"></textarea></td>
            </tr>
            <tr>
                <td>5</td>
                <td>Permakanan/Catering</td>
                <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp</td>
                <td>Kelebihan</td>
                <td colspan="3"><textarea name="kelebihan_catering" rows="2"></textarea></td>
            </tr>
            <tr>
                <td>&nbsp</td>
                <td>Kekurangan</td>
                <td colspan="3"><textarea name="kekurangan_catering" rows="2"></textarea></td>
            </tr>
            <tr>
                <td colspan="2">Keterangan</td>
                <td colspan="3"><textarea name="keterangan" rows="2"></textarea></td>
            </tr>
            <tr>
                <td colspan="5">
                    <input type="submit" value="Simpan"/>
                    <input type="reset" value="Reset"/>
                </td>
            </tr>
        </tbody>
    </table>
</form>