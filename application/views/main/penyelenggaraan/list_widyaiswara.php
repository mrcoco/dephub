<link rel='stylesheet' type='text/css' href='assets/css/jquery.dataTables.css' />
<script type="text/javascript" src="assets/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('#list').dataTable();
    } );
</script>
<<<<<<< HEAD
<div class="row">
    <div class="span12"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
=======
<?php 
echo $msg;
?>
Daftar widyaiswara
<br/>
>>>>>>> daa6b1070fd272ad17eae7f738df5efc912d95a2
<table id="list" width="100%">
    <thead>
        <tr>
            <th width="5%">No</th>
            <th width="35%">Nama</th>
            <th width="35%">NIP</th>
            <th width="25%">Aksi</th>
        </tr>
    </thead>
    <tbody>
<<<<<<< HEAD
        <?php for ($i = 0; $i < count($list); $i++) { ?>
            <tr>
                <td><?php echo ($i + 1) ?></td>
                <td><a href="penyelenggaraan/dashboard/detail_widyaiswara/<?php echo $list[$i]['id'] ?>"><?php echo $list[$i]['nama'] ?></a></td>
                <td><?php echo $list[$i]['nip'] ?></td>
                <td>
                    <a href="penyelenggaraan/dashboard/edit_widyaiswara/<?php echo $list[$i]['id'] ?>">Edit</a>
                    |
                    <a onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')" href="penyelenggaraan/dashboard/delete_widyaiswara/<?php echo $list[$i]['id'] ?>">Delete</a>
                </td>
            <?php } ?>
    </tbody>
</table>
<div class="form-actions">
    <a href="penyelenggaraan/dashboard/add_widyaiswara" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Tambah Widyaiswara</a>
</div>
=======
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

>>>>>>> daa6b1070fd272ad17eae7f738df5efc912d95a2
