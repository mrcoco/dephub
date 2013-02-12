<h2>
    <?php echo $diklat['name'] ?> Angkatan <?php echo $program['angkatan'] ?><br />
    <?php echo $materi['judul'] ?> oleh
    <?php if($pengajar['nama_peg']!=''){echo $pengajar['nama_peg']; }  else {echo $pengajar['nama_dostam'];} ?></h2>
<?php if($n_result==0){?>
Belum ada peserta yang mengisi evaluasi pengajar
<?php }else{ ?>
<p>
    Rata-rata nilai evaluasi pengajar:
</p>
<table>
    <?php $i=1; foreach($result as $r){ ?>
    <tr>
        <td><?php echo $i++.'.' ?></td>
        <td><?php echo $r['pertanyaan'] ?></td>
        <td>: <?php echo number_format($r['skor'],2,',','') ?></td>
    </tr>
    <?php } ?>
</table>
<br />
<div id="chartdiv" style="height:400px;width:600px; "></div>
<?php } ?>
<hr />
<p class="lead">Masukan dari peserta</p>
<?php if($n>0){?>
    <ul>
        <?php foreach($saran as $s){ ?>
        <li>
            <?php echo $s['saran'] ?>
        </li>
        <?php } ?>
    </ul>
<?php }else{ ?>
Belum ada saran
<?php } ?>
<div class="form-actions">
    <a href="program/cetak_feedback_result_pengajar/<?=$id?>/<?=$materi['id']?>/<?=$pengajar['id']?>" class="btn btn-success">Cetak PDF</a>
</div>

    <script class="include" type="text/javascript" src="assets/js/plugins/jqplot.canvasTextRenderer.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/plugins/jqplot.logAxisRenderer.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/plugins/jqplot.canvasAxisLabelRenderer.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/plugins/jqplot.canvasAxisTickRenderer.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/plugins/jqplot.categoryAxisRenderer.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/plugins/jqplot.barRenderer.min.js"></script>
<script type="text/javascript">
$(function(){   
    var line3 = [
    <?php $i=1; foreach($result as $r){ ?>
    ['<?php echo $r['pertanyaan'] ?>',<?php echo number_format($r['skor'],2,',','') ?>],
    <?php } ?>
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