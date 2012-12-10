<h2><?php echo $diklat['name'] ?> Angkatan <?php echo $program['angkatan'] ?></h2>
<?php if($n==0){?>
Belum ada peserta yang mengisi evaluasi pengajar
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
<div id="chartdiv" style="height:400px;width:600px; "></div>
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
<!-- Additional plugins go here -->

    <script class="include" type="text/javascript" src="assets/js/plugins/jqplot.canvasTextRenderer.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/plugins/jqplot.logAxisRenderer.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/plugins/jqplot.canvasAxisLabelRenderer.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/plugins/jqplot.canvasAxisTickRenderer.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/plugins/jqplot.categoryAxisRenderer.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/plugins/jqplot.barRenderer.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){   
    var line3 = [
        ['Penguasaan materi',<?php echo number_format($result['a'],2,',','') ?>],
        ['Sistimatika penyajian',<?php echo number_format($result['b'],2,',','') ?>],
        ['Kemampuan menyajikan',<?php echo number_format($result['c'],2,',','') ?>],
        ['Ketepatan waktu, kehadiran dan cara menyajikan',<?php echo number_format($result['d'],2,',','') ?>],
        ['Penggunaan metode dan sarana diklat',<?php echo number_format($result['e'],2,',','') ?>],
        ['Sikap dan perilaku',<?php echo number_format($result['f'],2,',','') ?>],
        ['Cara menjawab pertanyaan peserta',<?php echo number_format($result['g'],2,',','') ?>],
        ['Penggunaan bahasa',<?php echo number_format($result['h'],2,',','') ?>],
        ['Pemberian motivasi kepada peserta',<?php echo number_format($result['i'],2,',','') ?>],
        ['Pencapaian tujuan instruksional',<?php echo number_format($result['j'],2,',','') ?>],
        ['Kerapian berpakaian',<?php echo number_format($result['k'],2,',','') ?>],
        ['Kerjasama antar widyaiswara (dalam tim)',<?php echo number_format($result['l'],2,',','') ?>]
    ]
    $.jqplot('chartdiv', [line3], {
       animate: !$.jqplot.use_excanvas,
       series:[{renderer:$.jqplot.BarRenderer}],
       axes: {
           xaxis: {
             renderer: $.jqplot.CategoryAxisRenderer,
             labelRenderer: $.jqplot.CanvasAxisLabelRenderer,
             tickRenderer: $.jqplot.CanvasAxisTickRenderer,
             tickOptions: {
                 angle: -30,
                 fontFamily: 'Courier New',
                 fontSize: '9pt'
             }

           },
           yaxis: {
             min :50,
             max :100,
             renderer: $.jqplot.LogAxisRenderer,
             labelRenderer: $.jqplot.CanvasAxisLabelRenderer
           }
         }
    });
     
     
});
</script>

<!-- End additional plugins -->
