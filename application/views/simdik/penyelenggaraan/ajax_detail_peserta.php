<div class="modal-header">
    <h3><?php echo $header?></h3>
</div>
<div class="modal-body">
    <table>
        <tr>
            <td colspan="2"><img src="<?php echo $peserta['foto']?>"/></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><?php echo $peserta['nama']?></td>
        </tr>
        <tr>
            <td>NIP</td>
            <td><?php echo $peserta['nip']?></td>
        </tr>
        <tr>
            <td>Pangkat</td>
            <td><?php echo $peserta['pangkat']?></td>
        </tr>
        <tr>
            <td>Golongan</td>
            <td><?php echo $peserta['golongan']?></td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td><?php echo $peserta['jabatan']?></td>
        </tr>
        <tr>
            <td>TMT Golongan</td>
            <td><?php echo $peserta['tmtgol']?></td>
        </tr>
        <tr>
            <td>TMT CPNS</td>
            <td><?php echo $peserta['tmtcpns']?></td>
        </tr>
        <tr>
            <td>TMT PNS</td>
            <td><?php echo $peserta['tmtpns']?></td>
        </tr>
        <tr>
            <td>TMT Jabatan</td>
            <td><?php echo $peserta['tmtgol']?></td>
        </tr>
        <tr>
            <td>TMT Jabatan Baru</td>
            <td><?php echo $peserta['tmtjabbaru']?></td>
        </tr>
        <tr>
            <td>TMT Mutasi</td>
            <td><?php echo $peserta['tmtmutasi']?></td>
        </tr>
    </table>
</div>
<div class="modal-footer">
    <a href="#" class="btn" data-dismiss="modal">Close</a>
</div>
