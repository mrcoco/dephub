<table id="list" class="table table-striped table-bordered table-condensed">
    <thead>
        <th>No</th>
        <th>Nama</th>
        <th>NIP</th>
        <th>Jenis</th>
    </thead>
    <tbody>
        <?php $i=1 ?>
        <?php foreach($list as $l){?>
        <td><?php echo $i?></td>
        <td><?php echo $l['nama']?></td>
        <td><?php echo $l['nip']?></td>
        <td><?php echo $l['jenis']?></td>
        <?php $i++?>
        <?php } ?>
    </tbody>
</table>
<div class="form-actions">
    <a href="penyelenggaraan/pembicara_int/add_pembicara" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Tambah Pembicara Internal</a>
</div>
