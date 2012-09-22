    <div class="tab-content">
        <div class="tab-pane active" id="i">
            <table class="table table-condensed">
                <tr>
                    <th colspan="3"><center>DAFTAR RIWAYAT HIDUP</center></th>
                </tr>
                <tr>
                    <th width="30%">Nama</th>
                    <td><?php echo $pegawai['nama']?></td>
                    <td rowspan="4" width="77px"><center><img src="<?php echo $pegawai['foto']?>" width="75" height="100"/></center></td>
                </tr>
                <tr>
                    <th>NIP</th>
                    <td><?php echo $pegawai['nip']?></td>
                </tr>
                <tr>
                    <th>Tempat Tanggal Lahir</th>
                    <td><?php echo $pegawai['tempat_lahir']?>, <?php echo $this->date->konversi2($pegawai['tanggal_lahir'])?></td>
                </tr>
                <tr>
                    <th>Pangkat</th>
                    <td><?php echo $pegawai['pangkat']?></td>
                </tr>
                <tr>
                    <th>Golongan</th>
                    <td><?php echo $pegawai['golongan']?></td>
                    <td></td>
                </tr>
                <tr>
                    <th>NPWP</th>
                    <td><?php //echo $pegawai['npwp']?></td>
                    <td></td>
                </tr>
                <!--
                <tr>
                    <th>Jabatan</th>
                    <td><?php //echo $pegawai['jabatan']?></td>
                    <td></td>
                </tr>
                <tr>
                    <th>Instansi</th>
                    <td><?php //echo $pegawai['instansi']?></td>
                    <td></td>
                </tr>
                -->
                <tr>
                    <th>Jenis Kelamin</th>
                    <td><?php echo $pegawai['jenis_kelamin']?></td>
                    <td></td>
                </tr>
                <!--
                <tr>
                    <th>Gelar Akademis</th>
                    <td><?php //echo $pegawai['gelar_akademis']?></td>
                    <td></td>
                </tr>
                <tr>
                    <th>Pendidikan Terakhir</th>
                    <td><?php //echo $pegawai['pendidikan_terakhir']?></td>
                    <td></td>
                </tr>
                <tr>
                    <th>Unit Kerja</th>
                    <td><?php //echo $pegawai['unit_kerja']?></td>
                    <td></td>
                </tr>
                -->
                <tr>
                    <th>Agama</th>
                    <td><?php echo $pegawai['agama']?></td>
                    <td></td>
                </tr>
                <tr>
                    <th>Status Perkawinan</th>
                    <td><?php //echo $pegawai['status']?></td>
                    <td></td>
                </tr>
                <tr>
                    <th>Alamat Rumah</th>
                    <td><?php echo $pegawai['alamat_rumah']?></td>
                    <td></td>
                </tr>
                <tr>
                    <th>Keterangan Badan</th>
                    <td><?php //echo $pegawai['keterangan']?></td>
                    <td></td>
                </tr>
                <tr>
                    <th>Kegemaran (hobby)</th>
                    <td><?php //echo $pegawai['hobby']?></td>
                    <td></td>
                </tr>
                <!--
                <tr>
                    <th>Email</th>
                    <td><?php //echo $pegawai['email']?></td>
                    <td></td>
                </tr>
                <tr>
                    <th>Telepon</th>
                    <td><?php //echo $pegawai['telepon']?></td>
                    <td></td>
                </tr>
                <tr>
                    <th>TMT Golongan</th>
                    <td><?php //echo $this->date->konversi2($pegawai['tmtgol'])?></td>
                    <td></td>
                </tr>
                <tr>
                    <th>TMTC PNS</th>
                    <td><?php //echo $this->date->konversi2($pegawai['tmtcpns'])?></td>
                    <td></td>
                </tr>
                <tr>
                    <th>TMT PNS</th>
                    <td><?php //echo $this->date->konversi2($pegawai['tmtpns'])?></td>
                    <td></td>
                </tr>
                <tr>
                    <th>TMT Jabatan</th>
                    <td><?php //echo $this->date->konversi2($pegawai['tmtjabatan'])?></td>
                    <td></td>
                </tr>
                <tr>
                    <th>TMT Jabatan Baru</th>
                    <td><?php //echo $this->date->konversi2($pegawai['tmtjabbaru'])?></td>
                    <td></td>
                </tr>
                <tr>
                    <th>TMT Mutasi</th>
                    <td><?php //echo $this->date->konversi2($pegawai['tmtmutasi'])?></td>
                    <td></td>
                </tr>
                <tr>
                    <th>History</th>
                    <td>
                        <?php 
                    //foreach($history as $h){
                        //echo "- ".$h['nama_pelatihan']." (".$h['tahun'].")<br/>";
                        //}
                        ?>
                    </td>
                    <td></td>
                </tr>
                -->


            </table>
        </div>

        <div class="tab-pane" id="ii">

        </div>

        <div class="tab-pane" id="iii">

        </div>

        <div class="tab-pane" id="iv">

        </div>

        <div class="tab-pane" id="v">

        </div>

        <div class="tab-pane" id="vi">

        </div>

        <div class="tab-pane" id="vii">

        </div>
    </div>