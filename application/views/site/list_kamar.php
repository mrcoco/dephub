<div class="row">
    <div class="span12"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
<table>
	<?php
		$total=0;
	
		for($j=0;$j<count($status);$j++)
		{
			$tot[$j]=0;
		}
		for($i=0;$i<count($list);$i++)
		{
			//ngitung
			for($j=0;$j<count($status);$j++)
			{
				if($list[$i]['status']==$status[$j]['status'])
					$tot[$j]++;
			}
		}
		
		for($j=0;$j<count($status);$j++)
		{
			echo "<tr><td>".strtoupper($status[$j]['status'])."</td><td> : ".$tot[$j]."</td></tr>";
		}
		echo "<tr><td>TOTAL KAMAR </td><td>: ".count($list)."</td></tr>";
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
    var line3 = [ <?php
	for($j=0;$j<count($status);$j++)
	{
		echo "['".strtoupper($status[$j]['status'])."',".$tot[$j]."],";
	}
	?>
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
				$max=0;
				for($j=0;$j<count($status);$j++)
				{
					if($max<$tot[$j])
					{
						$max=$tot[$j];
					}
				}
				echo $max;
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
            <th width="10%">Nomor Kamar</th>
            <th width="40%">Peserta</th>
            <th width="35%">Program</th>
            <th width="10%">Angkatan</th>
            <th width="10%">Sarpras</th>
        </tr>
    </thead>
    <tbody>
        <?php 
		$j=1;
		$flag=0;
		for($i=0;$i<count($list);$i++) {
			 
			$data=null;
			?>
			<tr class="kamar<?php echo $list[$i]['id'] ?>">
				<td class="no"><?php echo $j; $j++; ?></td>
				<td class="nomor"><?php echo $list[$i]['nama'].$list[$i]['nomor'] ?></td>
				<?php
				for($k=0;$k<count($pemakaian);$k++)
				{
					//terisi
					if($list[$i]['id']==$pemakaian[$k]['id_kamar'])
					{
						$data=$pemakaian[$k];
						?>
							<td class="nama">
							<?php 
								for($l=0;$l<count($pemakaian);$l++)
								{
									if($list[$i]['id']==$pemakaian[$l]['id_kamar'])
									{
										echo "- ".$pemakaian[$l]['nip']." - ".$pemakaian[$l]['nama']."</br>";
									}
								}
								$flag=1;
							?></td>
						<td class="program"><?php echo $data['program']; ?></td>
						<td class="angkatan"><?php echo $data['angkatan']."</td>";
						break;
					}
					else //kamar kosong
					{
						$data=null;
					}
				}
				if($flag==0)
				{
					echo "<td/>";
					echo "<td/>";
					echo "<td/>";
				}
				$flag=0;
				?>
				<td class="persen"><?php 
				$total=0;
				for($m=0;$m<count($item);$m++) {
					if($checklist[$list[$i]['id']][$m]['status']!=0)
					{
						$total++;
					}
				}
				echo number_format(($total/count($item)*100),2,',','.')."%</td>"; 
				?>
		</tr>
        <?php }?>
    </tbody>
</table>