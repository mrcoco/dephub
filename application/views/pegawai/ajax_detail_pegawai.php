<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3><?php echo $header ?></h3>
</div>
<div class="modal-body">
    <table class="table table-condensed">
        <tr>
            <th colspan="3"><center>DAFTAR RIWAYAT HIDUP</center></th>
        </tr>
        <tr>
            <th width="30%">Nama</th>
            <td><?php echo $pegawai['nama'] ?></td>
            <td rowspan="4" width="77px"><center><img src="<?php echo $pegawai['foto'] ?>" width="75" height="100"/></center></td>
        </tr>
        <tr>
            <th>NIP</th>
            <td><?php echo $pegawai['nip'] ?></td>
        </tr>
        <tr>
            <th>Tempat Tanggal Lahir</th>
            <td><?php echo $pegawai['tempat_lahir'] ?>, <?php echo $this->date->konversi2($pegawai['tanggal_lahir']) ?></td>
        </tr>
        <tr>
            <th>Gol/Pangkat</th>
            <td><?php echo $pangkat[$pegawai['kode_gol']] ?></td>
        </tr>
        <tr>
            <th>Pendidikan terakhir</th>
            <td><?php echo $arr_pendidikan[$pegawai['kode_pendidikan']] ?></td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td><?php echo ($pegawai['jenis_kelamin']=='L'?'Laki-Laki':'Perempuan') ?></td>
            <td></td>
        </tr>
        <tr>
            <th>Agama</th>
            <td><?php echo $pegawai['agama'] ?></td>
            <td></td>
        </tr>
        <tr>
            <th>Alamat Rumah</th>
            <td><?php echo $pegawai['alamat_rumah'] ?></td>
            <td></td>
        </tr>
        <tr>
            <th>Jabatan</th>
            <td><?php echo $pegawai['jabatan']?></td>
            <td></td>
        </tr>
        <tr>
            <th>TMT Golongan</th>
            <td><?php echo $this->date->konversi1($pegawai['tmtgol'])?></td>
            <td></td>
        </tr>
        <tr>
            <th>TMT CPNS</th>
            <td><?php echo $this->date->konversi1($pegawai['tmtcpns'])?></td>
            <td></td>
        </tr>
        <tr>
            <th>TMT PNS</th>
            <td><?php echo $this->date->konversi1($pegawai['tmtpns'])?></td>
            <td></td>
        </tr>
        <tr>
            <th>TMT Jabatan</th>
            <td><?php echo $this->date->konversi1($pegawai['tmtgol'])?></td>
            <td></td>
        </tr>
        <tr>
            <th>TMT Jabatan Baru</th>
            <td><?php echo $this->date->konversi1($pegawai['tmtjabbaru'])?></td>
            <td></td>
        </tr>
        <tr>
            <th>TMT Mutasi</th>
            <td><?php echo $this->date->konversi1($pegawai['tmtmutasi'])?></td>
            <td></td>
        </tr>
        <tr>
            <th>History Pelatihan</th>
            <td>
                <ul>
                <?php
                if(count($history)==0){
                    $text='Tidak ada data history pelatihan';
                }else{
                    foreach($history as $h){
                        echo '<li>'.$h['tahun'].' : '.$h['nama_pelatihan'].'</li>';
                    }
                }
                ?>                    
                </ul>
            </td>
            <td></td>
        </tr>
    </table>
</div>
<div class="modal-footer">
    <a href="pegawai/detail_pegawai_print/<?php echo $pegawai['id'] ?>" class="btn btn-success">Cetak PDF</a>
    <a href="#" class="btn" data-dismiss="modal">Close</a>
</div>