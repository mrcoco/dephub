<h2><?php echo $program['name'] ?></h2>
<div class="row">
    <div class="span9">
    <table class="table table-striped">
        <tbody>
            <tr>
                <th width="30%">Kategori Program</th><td><?php echo $pil_kategori[$program['parent']] ?></td>
            </tr>
            <tr>
                <th>Jumlah peserta</th><td><?php echo $program['jumlah_peserta'] ?></td>
            </tr>
            <tr>
                <?php if($program['syarat_usia']==-1||$program['syarat_usia']==0){
                    $program['syarat_usia']='tidak ada';
                }?>
                <th>Syarat Usia</th><td><?php echo $program['syarat_usia'] ?></td>
            </tr>
            <tr>
                <?php if($program['syarat_masa_kerja']==-1||$program['syarat_masa_kerja']==0){
                    $program['syarat_masa_kerja']='tidak ada';
                }?>
                <th>Syarat Masa Kerja</th><td><?php echo $program['syarat_masa_kerja'] ?></td>
            </tr>
            <tr>
                <th>Syarat Pendidikan</th>
                <td>
                <?php if($program['syarat_pendidikan']>0){
                    echo $pil_pendidikan[$program['syarat_pendidikan']];
                }else{
                    echo 'tidak ada';
                }?>
                </td>
            </tr>
            <tr>
                <th>Syarat Pangkat/Gol</th>
                <td>
                <?php if($program['syarat_pangkat_gol']>0){
                    echo $pil_pangkat[$program['syarat_pangkat_gol']];
                }else{
                    echo 'tidak ada';
                }?>
                </td>
            </tr>
            <tr>
                <th>Materi</th>
                <td>
                    <ul>
                    <?php foreach($materi as $m){?>
                        <li><?php echo $m['judul']?></li>
                    <?php }?>
                    </ul>
                </td>
            </tr>
            <tr>
                <th>Deskripsi Singkat</th><td><?php echo $program['deskripsi'] ?></td>
            </tr>
            <tr>
                <th>Tujuan Kurikuler</th><td><?php echo $program['tujuan'] ?></td>
            </tr>
            <tr>
                <th>Indikator Keluaran</th><td><?php echo $program['indikator'] ?></td>
            </tr>
        </tbody>
    </table>
    </div>
    <div class="span3">
        <div class="well sidemenu">
            <ul class="nav nav-list">
                <li><a href="pes/front/add_feedback_diklat/<?php echo $program['id'] ?>">Evaluasi Diklat</a></li>
                <li><a>Evaluasi Pembicara</a></li>
                <li><a>Jadwal</a></li>
            </ul>
        </div>
    </div>
</div>