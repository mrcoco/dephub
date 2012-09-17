<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3><?php echo $header?></h3>
</div>
<div class="modal-body">
    <table class="table table-condensed" width="200px">
        <tr>
            <th>Nama</th>
            <td><?php echo $peserta['nama']?></td>
            <td rowspan="4" width="77px"><center><img src="<?php echo $peserta['foto']?>" width="75" height="100"/></center></td>
        </tr>
        <tr>
            <th>NIP</th>
            <td><?php echo $peserta['nip']?></td>
        </tr>
        <tr>
            <th>Tempat Tanggal Lahir</th>
            <td><?php echo $peserta['tempat_lahir']?>, <?php echo $this->date->konversi2($peserta['tanggal_lahir'])?></td>
        </tr>
        <tr>
            <th>Pangkat</th>
            <td><?php echo $peserta['pangkat']?></td>
        </tr>
        <tr>
            <th>Golongan</th>
            <td><?php echo $peserta['golongan']?></td>
            <td></td>
        </tr>
        <tr>
            <th>Jabatan</th>
            <td><?php echo $peserta['jabatan']?></td>
            <td></td>
        </tr>
        <tr>
            <th>TMT Golongan</th>
            <td><?php echo $this->date->konversi1($peserta['tmtgol'])?></td>
            <td></td>
        </tr>
        <tr>
            <th>TMT CPNS</th>
            <td><?php echo $this->date->konversi1($peserta['tmtcpns'])?></td>
            <td></td>
        </tr>
        <tr>
            <th>TMT PNS</th>
            <td><?php echo $this->date->konversi1($peserta['tmtpns'])?></td>
            <td></td>
        </tr>
        <tr>
            <th>TMT Jabatan</th>
            <td><?php echo $this->date->konversi1($peserta['tmtgol'])?></td>
            <td></td>
        </tr>
        <tr>
            <th>TMT Jabatan Baru</th>
            <td><?php echo $this->date->konversi1($peserta['tmtjabbaru'])?></td>
            <td></td>
        </tr>
        <tr>
            <th>TMT Mutasi</th>
            <td><?php echo $this->date->konversi1($peserta['tmtmutasi'])?></td>
            <td></td>
        </tr>
    </table>
</div>
<div class="modal-footer">
    <a href="#" class="btn" data-dismiss="modal">Close</a>
</div>