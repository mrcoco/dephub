<p align="center">
    <?php echo $judul ?>
</p>
<p>Diterima :</p>
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
        <?php 
            $w=0;$d=0;$i=1;
            foreach($list as $l){
                if($l['status']=='accept'){
        ?>
        <tr>
            <td align="center"><?php echo $i++ ?></td>
            <td><?php echo $l['nama'] ?></td>
            <td align="center"><?php echo $l['nip'] ?></td>
            <td align="center"><?php echo $l['golongan'] ?></td>
            <td><?php echo $l['unit_kerja'] ?></td>
        <?php 
                }elseif($l['status']=='waiting'){$w=1;}else{$d=1;}
            }
        ?>
    </tbody>
</table>
<?php if($w){?>
<br />
<p>Cadangan :</p>
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
        <?php 
            $i=1;
            foreach($list as $l){
                if($l['status']=='waiting'){
        ?>
        <tr>
            <td align="center"><?php echo $i++ ?></td>
            <td><?php echo $l['nama'] ?></td>
            <td align="center"><?php echo $l['nip'] ?></td>
            <td align="center"><?php echo $l['golongan'] ?></td>
            <td><?php echo $l['unit_kerja'] ?></td>
        <?php 
                }
            }
        ?>
    </tbody>
</table>
<?php } ?>
<?php if($d){?>
<br />
<p>Tidak diterima :</p>
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
        <?php 
            $i=1;
            foreach($list as $l){
                if($l['status']=='daftar'){
        ?>
        <tr>
            <td align="center"><?php echo $i++ ?></td>
            <td><?php echo $l['nama'] ?></td>
            <td align="center"><?php echo $l['nip'] ?></td>
            <td align="center"><?php echo $l['golongan'] ?></td>
            <td><?php echo $l['unit_kerja'] ?></td>
        <?php 
                }
            }
        ?>
    </tbody>
</table>
<?php } ?>