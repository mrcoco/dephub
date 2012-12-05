<h2><?php echo $program['name'] ?></h2>
<?php if($n==0){?>
Belum ada peserta yang mengisi evaluasi diklat
<?php }else{ ?>
Dari responden <?php echo $n ?> peserta diperoleh hasil evaluasi penyelenggaraan sebagai berikut.
<table>
    <tr>
        <td>Kurikulum</td>
        <td>: <?php echo number_format($kurikulum,2,',','') ?></td>
    </tr>
    <tr>
        <td>Sarpras</td>
        <td>: <?php echo number_format($sarpras,2,',','') ?></td>
    </tr>
    <tr>
        <td>Penyelenggaraan</td>
        <td>: <?php echo number_format($slng,2,',','') ?></td>
    </tr>
    <tr>
        <td>Catering</td>
        <td>: <?php echo number_format($catering,2,',','') ?></td>
    </tr>
</table>
<table id="list" class="table table-condensed table-bordered table-striped">
    <thead>
        <tr>
            <th>Saran Kurikulum</th>
            <th>Saran Sarpras</th>
            <th>Saran Penyelenggaraan</th>
            <th>Manfaat</th>
            <th>Saran Catering</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($result as $r){ ?>
        <tr>
            <td><?php echo $r['saran_kurikulum'] ?></td>
            <td><?php echo $r['saran_sarpras'] ?></td>
            <td><?php echo $r['saran_penyelenggaraan'] ?></td>
            <td><?php echo $r['manfaat'] ?></td>
            <td><?php echo $r['saran_catering'] ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<?php } ?>