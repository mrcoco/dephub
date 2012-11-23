<h2><?php echo $program['name'] ?></h2>
<?php if($n==0){?>
Belum ada peserta yang mengisi evaluasi pembicara
<?php }else{ ?>
<p>Dari responden <?php echo $n ?> peserta diperoleh hasil evaluasi penyelenggaraan sebagai berikut.</p>
<table>
    <tr>
        <td>a. </td>
                        <td>Penguasaan materi</td>
        <td>: <?php echo number_format($result['a'],2,',','') ?></td>
    </tr>
    <tr>
        <td>b. </td>
                        <td>Sistimatika penyajian</td>
        <td>: <?php echo number_format($result['b'],2,',','') ?></td>
    </tr>
    <tr>
        <td>c. </td>
                        <td>Kemampuan menyajikan</td>
        <td>: <?php echo number_format($result['c'],2,',','') ?></td>
    </tr>
    <tr>
        <td>d. </td>
                        <td>Ketepatan waktu, kehadiran dan cara menyajikan</td>
        <td>: <?php echo number_format($result['d'],2,',','') ?></td>
    </tr>
    <tr>
        <td>e. </td>
                        <td>Penggunaan metode dan sarana diklat</td>
        <td>: <?php echo number_format($result['e'],2,',','') ?></td>
    </tr>
    <tr>
        <td>f. </td>
                        <td>Sikap dan perilaku</td>
        <td>: <?php echo number_format($result['f'],2,',','') ?></td>
    </tr>
    <tr>
        <td>g. </td>
                        <td>Cara menjawab pertanyaan peserta</td>
        <td>: <?php echo number_format($result['g'],2,',','') ?></td>
    </tr>
    <tr>
        <td>h. </td>
                        <td>Penggunaan bahasa</td>
        <td>: <?php echo number_format($result['h'],2,',','') ?></td>
    </tr>
    <tr>
        <td>i. </td>
                        <td>Pemberian motivasi kepada peserta</td>
        <td>: <?php echo number_format($result['i'],2,',','') ?></td>
    </tr>
    <tr>
        <td>j. </td>
                        <td>Pencapaian tujuan instruksional</td>
        <td>: <?php echo number_format($result['j'],2,',','') ?></td>
    </tr>
    <tr>
        <td>k. </td>
                        <td>Kerapian berpakaian</td>
        <td>: <?php echo number_format($result['k'],2,',','') ?></td>
    </tr>
    <tr>
        <td>l. </td>
                        <td>Kerjasama antar widyaiswara (dalam tim)</td>
        <td>: <?php echo number_format($result['l'],2,',','') ?></td>
    </tr>
</table>
<hr />
<p class="lead">Masukan dari peserta</p>
    <ul>
        <?php foreach($saran as $s){ ?>
        <li>
            <?php echo $s['saran'] ?>
        </li>
        <?php } ?>
    </ul>
<?php } ?>