

	
	
	
<table id="list" width="100%" class="table table-striped table-bordered table-condensed">
    <thead>
	<!--
        <tr>
            <th width="5%" rowspan='2'>No</th>
            <th width="10%" rowspan='2'>ID Kamar</th>
            <th width="25%" colspan='5'><div align="center">Lampu</div></th>
            <th width="25%" colspan='5'><div align="center">Toilet</div></th>
            <th width="10%" colspan='2'><div align="center">AC</div></th>
            <th width="10%" rowspan='2'><div align="center">Fasilitas Lain</div></th>
            <th width="5%" rowspan='2'><div align="center">Kebersihan</div></th>
        </tr>
        <tr>
            <th>TL-E 22W</th>
            <th>TL-D 18W</th>
            <th>PL-C 14W</th>
            <th>PL-C 13W</th>
            <th>LP Bel</th>
            <th>SHO</th>
            <th>CLO</th>
            <th>JE-S</th>
            <th>WAS</th>
            <th>EX-F</th>
            <th>REM</th>
            <th>BAT</th>
        </tr>
		-->
		
        <?php 
		$lampu=0;
		$toilet=0;
		$ac=0;
		for($i=0;$i<count($item);$i++) {
			if($item[$i]['kategori']=='lampu')
				$lampu++;
			if($item[$i]['kategori']=='toilet')
				$toilet++;
			if($item[$i]['kategori']=='ac')
				$ac++;
		}?>
		<tr>
			<th rowspan='2'>No</th>
            <th colspan='<?php echo $lampu ?>'><div align="center">Lampu</div></th>
            <th colspan='<?php echo $toilet ?>'><div align="center">Toilet</div></th>
            <th colspan='<?php echo $ac ?>'><div align="center">AC</div></th>
			<?php for($i=0;$i<count($item);$i++) {
				if($item[$i]['kategori']=='')
				{?>
				<th rowspan='2'><div align="center"><?php echo $item[$i]['item'] ?></div></th>
			<?php }}?>
			
			<th rowspan='2'><div align="center">Aksi</div></th>
		</tr>
		<tr>
			<?php for($i=0;$i<count($item);$i++) {
				if($item[$i]['kategori']=='lampu')
				{?>
				<th><div align="center"><?php echo $item[$i]['item'] ?></div></th>
			<?php }}?>
			
			<?php for($i=0;$i<count($item);$i++) {
				if($item[$i]['kategori']=='toilet')
				{?>
				<th><div align="center"><?php echo $item[$i]['item'] ?></div></th>
			<?php }}?>
			
			<?php for($i=0;$i<count($item);$i++) {
				if($item[$i]['kategori']=='ac')
				{?>
				<th><div align="center"><?php echo $item[$i]['item'] ?></div></th>
			<?php }}?>
		</tr>
		
        
    </thead>
	
    <tbody>
        <?php for($i=1;$i<=count($list);$i++) {?>
        <tr>
		<!--
			<td><?php //echo $list[$i][1]['id_kamar'] ?></td>
			<td><?php //echo $list[$i][1]['id_item'] ?></td>
            <td><?php //echo $list[$i][1]['status'] ?></td>
		-->
		<form name="form_edit" id="form_reg" action="kelas/update_checklist/<?php echo $i ?>" method="POST">
			<td><?php echo $i?></td>
			<?php for($j=0;$j<count($item);$j++) {
				if($item[$j]['kategori']=='lampu')
				{
					echo "<td><input type=\"checkbox\" name=\"s2\" value=\"1\"";
					if($list[$i][$j]['status']!=0)
						echo " checked";
					echo "/> ok</td>";
				}
			}?>
			
			<?php for($j=0;$j<count($item);$j++) {
				if($item[$j]['kategori']=='toilet')
				{
					echo "<td><input type=\"checkbox\" name=\"s2\" value=\"1\"";
					if($list[$i][$j]['status']!=0)
						echo " checked";
					echo "/> ok</td>";
				}
			}?>
			
			<?php for($j=0;$j<count($item);$j++) {
				if($item[$j]['kategori']=='ac')
				{
					echo "<td><input type=\"checkbox\" name=\"s2\" value=\"1\"";
					if($list[$i][$j]['status']!=0)
						echo " checked";
					echo "/> ok</td>";
				}
			}?>
			
			<?php for($j=0;$j<count($item);$j++) {
				if($item[$j]['kategori']=='')
				{
					echo "<td><input type=\"checkbox\" name=\"s2\" value=\"1\"";
					if($list[$i][$j]['status']!=0)
						echo " checked";
					echo "/> ok</td>";
				}
			}?>
			<td><input type="submit" class="btn btn-mini btn-primary pull-right" value="Save"/></td>
		</form>
        </tr>
		<?php }?>
    </tbody>
</table>
	