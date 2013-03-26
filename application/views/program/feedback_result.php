<h2><?php echo $diklat['name'] ?> Angkatan <?php echo $program['angkatan'] ?></h2>
<div class="form-actions">
    <a href="program/cetak_feedback_result/<?=$id?>" class="btn btn-success">Cetak PDF</a>
</div>
<?php if($n==0){?>
Belum ada peserta yang mengisi evaluasi diklat
<?php }else{ ?>
<p>Rata-rata nilai evaluasi penyelenggaraan diklat:</p>
<table>
    <?php foreach($result as $r){ ?> 
    <tr>
        <td><?php echo $r['nama_kategori'] ?></td>
        <td>: <?php echo number_format($r['avg(skor)'],2,',','') ?></td>
    </tr>
    <?php } ?>
</table>
<div id="chartdiv" style="height:300px;width:300px; "></div>
<hr />
<p class="lead">Masukan dari peserta</p>
    <?php foreach($kategori as $kat){ ?>
    <?php echo $kat['nama_kategori'] ?>
        <ul>
        <?php if(isset($saran[$kat['id_kategori']])){ ?>
            <?php foreach($saran[$kat['id_kategori']] as $s){ ?>
                <li><?php echo $s ?></li>
            <?php } ?>
        <?php }else{ ?>
                <li>Belum ada saran</li>
        <?php } ?>
        </ul>
    <?php } ?>
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
    <?php foreach($result as $r){ ?> 
    ['<?php echo $r['nama_kategori'] ?>',<?php echo number_format($r['avg(skor)'],2,',','') ?>],
    <?php } ?>
    ];
    $.jqplot('chartdiv', [line3], {
       animate: !$.jqplot.use_excanvas,
       series:[{renderer:$.jqplot.BarRenderer}],
       axes: {
           xaxis: {
             renderer: $.jqplot.CategoryAxisRenderer,
             labelRenderer: $.jqplot.CanvasAxisLabelRenderer,
             tickRenderer: $.jqplot.CanvasAxisTickRenderer,
             tickOptions: {
                 angle: 30,
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
