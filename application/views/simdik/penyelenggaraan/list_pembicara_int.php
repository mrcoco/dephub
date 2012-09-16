<script>
    $(document).ready(function() {
        $('#list').dataTable();
        $('select').attr('class','input-mini');
    } );
</script>
<table id="list">
    <thead>
        <th>No</th>
        <th>Nama</th>
        <th>NIP</th>
        <th>Jenis</th>
    </thead>
    <tbody>
        <?php $i=1 ?>
        <?php foreach($list as $l){?>
        <tr>
            <td><?php echo $i?></td>
            <td><?php echo $l['nama']?></td>
            <td><?php echo $l['nip']?></td>
            <td><?php echo $l['jenis']==1?'non widyaiswara':'widyaiwsara'?></td>
        </tr>
        <?php $i++?>
        <?php } ?>
    </tbody>
</table>
