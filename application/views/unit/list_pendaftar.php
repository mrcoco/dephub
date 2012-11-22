<table width="100%" class="table table-bordered table-condensed">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Program Diklat</th>
            <th>Tahun Daftar</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php for($i=0;$i<count($pendaftar);$i++){?>
        <tr>
            <td><?php echo $i+1?></td>
            <td><?php echo $pendaftar[$i]['nama']?></td>
            <td><?php echo $diklat[$pendaftar[$i]['id_diklat']]?></td>
            <td><?php echo $pendaftar[$i]['tahun_daftar']?></td>
            <td><?php echo $this->editor->status($pendaftar[$i]['status'])?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
