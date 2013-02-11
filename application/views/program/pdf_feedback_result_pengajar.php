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
    <h1 align="center">Rekap Evaluasi Pengajar</h1>
    <h2 align="center">
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
<div>
    <img src="<?=$chart ?>" />
</div>
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
</body>
</html>