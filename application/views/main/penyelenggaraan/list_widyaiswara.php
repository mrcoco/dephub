<link rel='stylesheet' type='text/css' href='assets/css/jquery.dataTables.css' />
<script type="text/javascript" src="assets/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('#list').dataTable();
    } );
</script>
Daftar widyaiswara
<br/>
<table id="list" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIP</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php for($i=0;$i<count($list);$i++) {?>
        <tr>
            <td><?php echo ($i+1) ?></td>
            <td><a href="penyelenggaraan/dashboard/detail_widyaiswara/<?php echo $list[$i]['id'] ?>"><?php echo $list[$i]['nama'] ?></a></td>
            <td><?php echo $list[$i]['nip'] ?></td>
            <td>
                <a href="penyelenggaraan/dashboard/edit_widyaiswara/<?php echo $list[$i]['id'] ?>">Edit</a>
                |
                <a onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')" href="penyelenggaraan/dashboard/delete_widyaiswara/<?php echo $list[$i]['id'] ?>">Delete</a>
            </td>
        <?php }?>
    </tbody>
</table>
