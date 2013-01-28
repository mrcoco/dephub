<?php echo doctype();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?php echo base_url();?>" />
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.jqplot.min.css" />    
    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!--scripts-->
    <script class="include" type="text/javascript" src="assets/js/jquery.js"></script>
    <!--[if lt IE 9]><script language="javascript" type="text/javascript" src="assets/js/excanvas.min.js"></script><![endif]-->
    <script language="javascript" type="text/javascript" src="assets/js/jquery.jqplot.min.js"></script>

</head>
<body>
    <h1 align="center">Rekap Evaluasi Penyelenggaraan Diklat</h1>
<h2 align="center"><?php echo $diklat['name'] ?> Angkatan <?php echo $program['angkatan'] ?></h2>
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
    var h=$.jqplot('chartdiv', [line3], {
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
</body>
</html>