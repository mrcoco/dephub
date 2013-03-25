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
<h3 align="center"><?php echo $judul ?></h3>
<h4 align="center">Daftar Nilai Peserta</h4>
Materi: <?php echo $materi['judul'] ?>
<table class="bordered" width="100%" align="center" cellspacing="0" cellpadding="1">
    <thead>
        <tr>
            <th width="3%">No</th>
            <th width="25%">Nama Peserta</th>
            <th width="17%">NIP</th>
            <?php foreach($list_komponen as $l){?>
            <th><?php echo $l['nama_komponen'].'('.$l['bobot'].'%)'?></th>
            <?php } ?>
            <th>Nilai Akhir</th>
            <th>Grade</th>
        </tr>
    </thead>
    <tbody>
        <?php for($i=0;$i<count($list_peserta);$i++){?>
        <tr>
            <td width="3%"><?php echo $i+1?></td>
            <td width="25%"><?php echo $list_peserta[$i]['nama']?></td>
            <td width="17%"><?php echo $list_peserta[$i]['nip']?></td>
            <?php $list_peserta[$i]['nilai_akhir']=0; ?>
            <?php foreach($list_komponen as $l){?>
            <td>
                <?php
                    if(array_key_exists($list_peserta[$i]['id_peserta'], $nilai[$l['id']])){
                        $res_nilai = number_format($nilai[$l['id']][$list_peserta[$i]['id_peserta']],2);
                        $list_peserta[$i]['nilai_akhir']+=(($l['bobot']/100)*$res_nilai);
                        echo $res_nilai;
                    }else{
                        echo '-';
                    }
                ?>
            </td>
            <?php } ?>
            <td><?php echo $list_peserta[$i]['nilai_akhir']?></td>
            <td>
                <?php
                    if($list_peserta[$i]['nilai_akhir']>80){
                        echo 'A';         
                    }else if($list_peserta[$i]['nilai_akhir']>65){
                        echo 'B';         
                    }else if($list_peserta[$i]['nilai_akhir']>55){
                        echo 'C';         
                    }else if($list_peserta[$i]['nilai_akhir']>45){
                        echo 'D';         
                    }else{
                        echo 'E';         
                    }
                ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
    </body>
</html>