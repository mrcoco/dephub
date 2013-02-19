<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Materi Ajar</h3>
</div>
<div class="modal-body">
<h3><?php echo $pegawai['nama'] ?> (<?php echo $pegawai['nip'] ?>)</h3>
    <?php if($materi){ ?>
        <?php foreach($materi as $m){ ?>
        <h3><?php echo $m['judul'] ?></h3>
        <table class="table-condensed table">
            <tr>
                <th width="20%">Total Jam Ajar</th>
                <td><?php echo $total_jam[$m['id']] ?> jam</td>
            </tr>
            <tr>
                <th>Deskripsi</th>
                <td><?php echo $m['deskripsi'] ?></td>
            </tr>
        </table>
        <?php } ?>
    <?php }else{ ?>
    Tidak bertugas memberikan materi
    <?php } ?>
</div>
<div class="modal-footer">
    <a href="#" class="btn" data-dismiss="modal">Close</a>
</div>