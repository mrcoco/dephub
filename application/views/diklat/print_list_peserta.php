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
<p>Diterima :</p>
<table width="100%" align="center" cellspacing="0" cellpadding="1">
    <thead>
        <tr>
            <th width="3%">No</th>
            <th width="5%">Ang.</th>
            <th width="20%">Nama</th>
            <th width="16%">NIP</th>
            <th width="21%">Pangkat/Gol</th>
            <th width="20%">Jabatan</th>
            <th width="15%">Unit Kerja</th>
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
            <td align="center"><?php echo $pil_angkatan[$l['id_program']] ?></td>
            <td><?php echo $l['nama'] ?></td>
            <td align="center"><?php echo $l['nip'] ?></td>
            <td align="center"><?php echo $l['pangkat'] ?>, <?php echo $l['golongan'] ?></td>
            <td><?php echo $l['jabatan'] ?></td>
            <td><?php echo $l['unit_kerja'] ?></td>
        <?php 
                }elseif($l['status']=='waiting'){$w=1;
                }else{$d=0;} //}else{$d=1;} jika yg tidak diterima ingin ditampilkan
            }
        ?>
    </tbody>
</table>
<?php if($w){?>
<br />
<p>Cadangan :</p>
<table width="100%" align="center" cellspacing="0" cellpadding="1">
    <thead>
        <tr>
            <th width="3%">No</th>
            <th width="30%">Nama</th>
            <th width="16%">NIP</th>
            <th width="21%">Pangkat/Gol</th>
            <th width="30%">Unit Kerja</th>
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
            <td align="center"><?php echo $l['pangkat'] ?>, <?php echo $l['golongan'] ?></td>
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
<table width="100%" align="center" cellspacing="0" cellpadding="1">
    <thead>
        <tr>
            <th width="3%">No</th>
            <th width="30%">Nama</th>
            <th width="16%">NIP</th>
            <th width="21%">Pangkat/Gol</th>
            <th width="30%">Unit Kerja</th>
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
            <td align="center"><?php echo $l['pangkat'] ?>, <?php echo $l['golongan'] ?></td>
            <td><?php echo $l['unit_kerja'] ?></td>
        <?php 
                }
            }
        ?>
    </tbody>
</table>
<?php } ?>