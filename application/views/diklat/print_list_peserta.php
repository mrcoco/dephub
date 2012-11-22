<p align="center">
    <?php echo $judul ?>
</p>
<table width="100%" align="center" border="1" style="border-collapse: collapse; border: 0.5px #000 solid" cellspacing="0" cellpadding="2">
    <thead>
        <tr>
            <th width="5%">No</th>
            <th width="35%">Nama</th>
            <th width="20%">NIP</th>
            <th width="5%">Gol</th>
            <th width="35%">Unit Kerja</th>
        </tr>
    </thead>
    <tbody>
        <?php for($i=0;$i<count($list);$i++) {?>
        <tr>
            <td align="center"><?php echo ($i+1) ?></td>
            <td><?php echo $list[$i]['nama'] ?></td>
            <td align="center"><?php echo $list[$i]['nip'] ?></td>
            <td align="center"><?php echo $list[$i]['golongan'] ?></td>
            <td><?php echo $list[$i]['unit_kerja'] ?></td>
        <?php }?>
    </tbody>
</table>