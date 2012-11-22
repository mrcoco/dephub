<h2><?php echo $program['name'] ?></h2>
Dari responden <?php echo $n ?> peserta diperoleh hasil evaluasi diklat sebagai berikut.
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