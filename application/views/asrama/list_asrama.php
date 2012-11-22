

	<h4>Check List Prasarana Kamar</h4>
	
	
	
<div class="row">
    <div class="span9"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
	
	
	
<table id="list" width="100%" class="table table-striped table-bordered table-condensed">
    <thead>
		
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
			<th rowspan='2'>ID Kamar</th>
            <th colspan='<?php echo $lampu ?>'><div align="center">Lampu</div></th>
            <th colspan='<?php echo $toilet ?>'><div align="center">Toilet</div></th>
            <th colspan='<?php echo $ac ?>'><div align="center">AC</div></th>
			<?php for($i=0;$i<count($item);$i++) {
				if($item[$i]['kategori']=='')
				{?>
				<th rowspan='2'><div align="center"><?php echo $item[$i]['item'] ?></div></th>
			<?php }}?>
			
			<th rowspan='2'><div align="center">%</div></th>
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
        <?php foreach($kamar as $is) {
		$i=$is['id'];
		$total=0;
		?>
        <tr>
		<!--
			<td><?php //echo $list[$i][1]['id_kamar'] ?></td>
			<td><?php //echo $list[$i][1]['id_item'] ?></td>
            <td><?php //echo $list[$i][1]['status'] ?></td>
		-->
		<form name="form_edit" id="form_reg" action="asrama/update_checklist/<?php echo $i ?>" method="POST">
			<td><?php echo $i?></td>
			<td><?php echo $is['nama_kamar']?></td>
			<?php for($j=0;$j<count($item);$j++) {
				if($item[$j]['kategori']=='lampu')
				{
					echo "<td><input type=\"checkbox\" name=\"".$list[$i][$j]['id_item']."\" value=\"1\"";
					if($list[$i][$j]['status']!=0)
					{
						$total++;
						echo " checked";
					}
					echo "/></td>";
				}
			}?>
			
			<?php for($j=0;$j<count($item);$j++) {
				if($item[$j]['kategori']=='toilet')
				{
					echo "<td><input type=\"checkbox\" name=\"".$list[$i][$j]['id_item']."\" value=\"1\"";
					if($list[$i][$j]['status']!=0)
					{
						$total++;
						echo " checked";
					}
					echo "/></td>";
				}
			}?>
			
			<?php for($j=0;$j<count($item);$j++) {
				if($item[$j]['kategori']=='ac')
				{
					echo "<td><input type=\"checkbox\" name=\"".$list[$i][$j]['id_item']."\" value=\"1\"";
					if($list[$i][$j]['status']!=0)
					{
						$total++;
						echo " checked";
					}
					echo "/></td>";
				}
			}?>
			
			<?php for($j=0;$j<count($item);$j++) {
				if($item[$j]['kategori']=='')
				{
					echo "<td><input type=\"checkbox\" name=\"".$list[$i][$j]['id_item']."\" value=\"1\"";
					if($list[$i][$j]['status']!=0)
					{
						$total++;
						echo " checked";
					}
					echo "/></td>";
				}
			}?>
			<td><?php echo number_format(($total/count($item)*100),2,',','.')."%" ?></td>
			<td><input type="submit" class="btn btn-mini btn-primary pull-right" value="Save"/></td>
		</form>
        </tr>
		<?php }?>
    </tbody>
</table>
	