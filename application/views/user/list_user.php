<table id="list" width="100%" class="table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <td>No</td>
            <td>Nama</td>
            <td>Role</td>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1 ?>
        <?php foreach($list as $l){ ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $l['nama'] ?></td>
            <td><?php echo $role[$l['id_role']] ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>