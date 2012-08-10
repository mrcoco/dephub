<link rel='stylesheet' type='text/css' href='assets/css/jquery.dataTables.css' />
<script type="text/javascript" src="assets/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('#list').dataTable();
    } );
</script>
<?php 
echo $msg;
?>
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
            <td><?php echo $list[$i]['nama'] ?></td>
            <td><?php echo $list[$i]['nip'] ?></td>
            <td><?php echo $list[$i]['status'] ?></td>
            <td>
                Edit
                |
                Delete
                |
                
            </td>
        <?php }?>
    </tbody>
</table>

