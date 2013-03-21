<html>
    <head>
<style>
@page {
            margin-top: 0.6em;
            margin-bottom: 0.6em;
            margin-left: 1.5em;
            margin-right: 1.5em;
        }
        body{
            font-size: smaller;
        }
    .bordered{
        border-bottom: 1px #000 solid;
        border-right: 1px #000 solid;
        border-left: 0;
        font-size: 8.5pt;
    }
    .bordered td, th{
        border-left: 1px #000 solid;
        border-top: 1px #000 solid;
    }
    .odd{border-bottom: 0px !important;}
    .even{text-align:center;border-top: 0px !important;}
    td{vertical-align: top;}
</style>
    </head>
    <body>
<h3 align="center">
    <?php echo $judul ?>
</h3>
        <h4 align="center">
            DAFTAR HADIR
        </h4>
        <table width="100%">
            <tr>
                <td width="10%">Hari/Tanggal</td>
                <td width="1%">:</td>
                <td width="39%"><?php echo $this->date->hari_tgl($jadwal['tanggal']).', '.$this->date->konversi5($jadwal['tanggal'])?></td>
                <td width="50%">Tanda Tangan Widyaiswara :</td>
            </tr>
            <tr>
                <td>Waktu</td>
                <td>:</td>
                <td><?php echo date('H.i', strtotime($jadwal['jam_mulai'])).' - '.date('H.i', strtotime($jadwal['jam_selesai'])) ?> WIB</td>
                <td rowspan="2">
                <?php if(isset($jadwal['ada_pembicara'])){?>
                    <?php   
                    foreach($jadwal['list_pembicara'] as$l){
                        if($l['nama_peg']!=''){
                            echo $l['nama_peg'] .' _______________<br/>';
                        }else{
                            echo $l['nama_dostam'] .' _______________<br/>';
                        }
                    } 
                    ?>
                <?php } ?>
                </td>
            </tr>
            <tr>
                <td>Kegiatan/Materi</td>
                <td>:</td>
                <td><?php if($jadwal['judul']){echo $jadwal['judul'];}else{echo $jadwal['nama_kegiatan'];} ?></td>
            </tr>
        </table>
        <br />
<table class="bordered" width="100%" align="center" cellspacing="0" cellpadding="1">
    <thead>
        <tr>
            <th width="3%">NO</th>
            <th width="30%">NAMA</th>
            <th width="17%">NIP</th>
            <th width="5%">GOL</th>
            <th width="20%">UNIT KERJA</th>
            <th width="25%">TANDA TANGAN</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1; foreach($list as $l){ ?>
        <tr>
            <td align="center"><?php echo $i ?></td>
            <td><?php echo $l['nama'] ?></td>
            <td align="center"><?php echo $l['nip'] ?></td>
            <td align="center"><?php echo $l['golongan'] ?></td>
            <td align="center"><?php echo $l['unit_kerja'] ?></td>
            <?php if($i%2!=0){ ?>
            <td class="odd"><?php echo $i++ ?></td>
            <?php }else{ ?>
            <td class="even"><?php echo $i++ ?></td>
            <?php } ?>
        <?php } ?>
    </tbody>
</table>
        <br />
        <table width="100%">
            <tr>
                <td width="5%">Keterangan:</td>
                <td width="70%">&nbsp;</td>
                <td align="center" rowspan="3">Petugas Kelas</td>
            </tr>
            <tr>
                <td>Sakit</td>
                <td>= ...... org</td>
            </tr>
            <tr>
                <td>Izin</td>
                <td>= ...... org</td>
            </tr>
            <tr>
                <td>Alpa</td>
                <td>= ...... org</td>
                <td align="center"><hr/></td>
            </tr>
        </table>
    </body>
</html>
