<h2><?php echo $materi['judul'] ?></h2>
<h3><?php echo $diklat['name'].' Angkatan '.$program['angkatan'] ?></h3>
<?php if($this->uri->segment(1)=='program'){$this->load->view('sidebar/subnav_nilai');} ?>
<table id="list" width="100%" class="table table-bordered table-condensed table-striped">
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
                <?php echo $this->editor->grading($list_peserta[$i]['nilai_akhir']) ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<div class="form-actions">
    <a class="btn btn-success" href="<?php echo current_url() ?>/print">Cetak PDF</a>
</div>