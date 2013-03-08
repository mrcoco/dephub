<div class="row">
    <div class="span12"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
<table>
	<?php
		$total=0;
	
		for($i=0;$i<count($list);$i++) {
			 
			$data=null;
			for($k=0;$k<count($pemakaian);$k++)
			{
				//terisi
				if($list[$i]['id']==$pemakaian[$k]['id_kelas'])
				{
					$total++;
				}
			}
		}
		echo "<tr><td>KELAS TERPAKAI </td><td>: ".$total."</td></tr>";
		echo "<tr><td>KELAS KOSONG </td><td>: ".(count($list)-$total)."</td></tr>";
		echo "<tr><td>TOTAL KELAS </td><td>: ".count($list)."</td></tr>";
		
	?>
	<tr><td><div id="chartdiv" style="height:300px;width:300px; "></div></td></tr>
</table>

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
    ['terpakai',<?php echo $total ?>],
    ['kosong',<?php echo (count($list)-$total) ?>]
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
             min :1,
             max :<?php 
			 if($total>(count($list)-$total))
			 {
				echo $total;
			 }
			 else
			 {
				echo (count($list)-$total);
			 }
			 ?>,
             renderer: $.jqplot.LogAxisRenderer,
             labelRenderer: $.jqplot.CanvasAxisLabelRenderer
           }
         }
    });
});
</script>
<!-- End additional plugins -->

<br />
<table id="list" width="100%" class="table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th width="5%">No</th>
            <th width="10%">Kelas</th>
            <th width="10%">Kepasitas</th>
            <th width="65%">Program</th>
            <th width="10%">Angkatan</th>
        </tr>
    </thead>
    <tbody>
        <?php 
		$j=1;
		for($i=0;$i<count($list);$i++) {
			 
			$data=null;
			for($k=0;$k<count($pemakaian);$k++)
			{
				?>
				<tr class="kelas<?php echo $list[$i]['id'] ?>">
					<td class="no"><?php echo $j; $j++; ?></td>
					<td class="nama"><?php echo $list[$i]['nama'] ?></td>
					<td class="kapasitas"><?php echo $list[$i]['kapasitas'] ?></td>
					<?php
					//terisi
					if($list[$i]['id']==$pemakaian[$k]['id_kelas'])
					{
						$data=$pemakaian[$k];
						?></td>
						<td class="program"><?php echo $data['program']; ?></td>
						<td class="program"><?php echo $data['angkatan']; 
						break;
					}
					else //kamar kosong
					{
						$data=null;
						echo "<td/>";
						echo "<td/>";
					}
			}			
			
			?></td>
		</tr>
        <?php }?>
    </tbody>
</table>
