<div class="row">
    <div class="span12"><?php echo $this->session->flashdata('msg'); ?></div>
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
			<th>No</th>
			<th>ID Kamar</th>
			<th>% Prasarana</th>
			<th>Aksi</th>
        
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
			<td><?php echo $is['nama'].$is['nomor']?></td>
			<?php for($j=0;$j<count($item);$j++) {
				if($item[$j]['kategori']=='lampu')
				{
					//echo "<td><input type=\"checkbox\" name=\"".$list[$i][$j]['id_item']."\" value=\"1\"";
					if($list[$i][$j]['status']!=0)
					{
						$total++;
						//echo " checked";
					}
					//echo "/></td>";
				}
			}?>
			
			<?php for($j=0;$j<count($item);$j++) {
				if($item[$j]['kategori']=='toilet')
				{
					//echo "<td><input type=\"checkbox\" name=\"".$list[$i][$j]['id_item']."\" value=\"1\"";
					if($list[$i][$j]['status']!=0)
					{
						$total++;
						//echo " checked";
					}
					//echo "/></td>";
				}
			}?>
			
			<?php for($j=0;$j<count($item);$j++) {
				if($item[$j]['kategori']=='ac')
				{
					//echo "<td><input type=\"checkbox\" name=\"".$list[$i][$j]['id_item']."\" value=\"1\"";
					if($list[$i][$j]['status']!=0)
					{
						$total++;
						//echo " checked";
					}
					//echo "/></td>";
				}
			}?>
			
			<?php for($j=0;$j<count($item);$j++) {
				if($item[$j]['kategori']=='')
				{
					//echo "<td><input type=\"checkbox\" name=\"".$list[$i][$j]['id_item']."\" value=\"1\"";
					if($list[$i][$j]['status']!=0)
					{
						$total++;
						//echo " checked";
					}
					//echo "/></td>";
				}
			}?>
			<td><?php echo number_format(($total/count($item)*100),2,',','.')."%" ?></td>
			<td>
			<a href="asrama/list_asrama/#<?php echo $is['nama'].$is['nomor'] ?>" class="btn btn-mini"><i class="icon-ok-circle"></i> Check List</a>
			</td>
		</form>
        </tr>
		<?php }?>
    </tbody>
</table>
	