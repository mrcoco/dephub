<style>
    table{
        border: 1px #000 solid;
        border-left: 0;
        font-size: x-small;
    }
    td, th{
        border-left: 1px #000 solid;
        border-top: 1px #000 solid;
    }
</style>
<p align="center">
    <?php echo $judul ?>
</p>
<table width="100%" align="center" cellspacing="0" cellpadding="1">
    <thead>
        <tr>
            <th width="3%">No</th>
            <th width="20%">Nama</th>
            <th width="16%">NIP</th>
            <th width="21%">Pangkat/Gol</th>
            <th width="20%">Jabatan</th>
            <th width="15%">Unit Kerja</th>
            <th width="5%">Status</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1; foreach($list as $l){ ?>
        <tr>
            <td align="center"><?php echo $i++ ?></td>
            <td><?php echo $l['nama'] ?></td>
            <td align="center"><?php echo $l['nip'] ?></td>
            <td align="center"><?php echo $l['pangkat'] ?>, <?php echo $l['golongan'] ?></td>
            <td><?php echo $l['jabatan'] ?></td>
            <td><?php echo $l['unit_kerja'] ?></td>
            <td align="center"><?php echo $this->editor->status($l['status']) ?></td>
        <?php } ?>
    </tbody>
</table>