
	<h4>Check List Prasarana Kelas</h4>
	
	
	
<div class="row">
    <div class="span9"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
	
<table width="100%" class="table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th width="5%" rowspan='2'>No</th>
            <th width="15%" rowspan='2'>Nama Kelas</th>
            <th width="20%" colspan='4'><div align="center">LCD Proyektor</div></th>
            <th width="10%" colspan='2'><div align="center">Sound System</div></th>
            <th width="15%" colspan='3'><div align="center">Meja</div></th>
            <th width="15%" colspan='3'><div align="center">Kursi</div></th>
            <th width="5%"><div align="center">Whiteboard</div></th>
            <th width="5%"><div align="center">Panaboard</div></th>
            <th width="5%"><div align="center">Flipchart</div></th>
        </tr>
        <tr>
            <th>Type</th>
            <th>Kondisi</th>
            <th>Jumlah</th>
            <th>Lap Time</th>
            <th>Type</th>
            <th>Kondisi</th>
            <th>Type</th>
            <th>Kondisi</th>
            <th>Jumlah</th>
            <th>Type</th>
            <th>Kondisi</th>
            <th>Jumlah</th>
            <th>Kondisi</th>
            <th>Kondisi</th>
            <th>Kondisi</th>
        </tr>
    </thead>
    
    <tbody>
        <?php for($i=0;$i<count($list);$i++) {?>
        <tr class="gedung<?php echo $list[$i]['id'] ?>">
            <td class="no"><?php echo ($i+1) ?></td>
            <td class="nama"><?php echo $list[$i]['nama'] ?></td>
            <td class="l1">
			<?php 
				if($list[$i]['l1']==0)
					echo "ok";
				else
					echo $list[$i]['l1']; 
			?>
			</td>
            <td class="l2">
			<?php 
				if($list[$i]['l2']==0)
					echo "ok";
				else
					echo $list[$i]['l2']; 
			?>
			</td>
            <td class="l3">
			<?php 
				if($list[$i]['l3']==0)
					echo "ok";
				else
					echo $list[$i]['l3']; 
			?>
			</td>
            <td class="l4">
			<?php 
				if($list[$i]['l4']==0)
					echo "ok";
				else
					echo $list[$i]['l4']; 
			?>
			</td>
			<td class="s1">
			<?php 
				if($list[$i]['s1']==0)
					echo "ok";
				else
					echo $list[$i]['s1']; 
			?>
			</td>
			<td class="s2">
			<?php 
				if($list[$i]['s2']==0)
					echo "ok";
				else
					echo $list[$i]['s2']; 
			?>
			</td>
			<td class="m1">
			<?php 
				if($list[$i]['m1']==0)
					echo "ok";
				else
					echo $list[$i]['m1']; 
			?>
			</td>
			<td class="m2">
			<?php 
				if($list[$i]['m2']==0)
					echo "ok";
				else
					echo $list[$i]['m2']; 
			?>
			</td>
			<td class="m3">
			<?php 
				if($list[$i]['m3']==0)
					echo "ok";
				else
					echo $list[$i]['m3']; 
			?>
			</td>
			<td class="k1">
			<?php 
				if($list[$i]['k1']==0)
					echo "ok";
				else
					echo $list[$i]['k1']; 
			?>
			</td>
			<td class="k2">
			<?php 
				if($list[$i]['k2']==0)
					echo "ok";
				else
					echo $list[$i]['k2']; 
			?>
			</td>
			<td class="k3">
			<?php 
				if($list[$i]['k3']==0)
					echo "ok";
				else
					echo $list[$i]['k3']; 
			?>
			</td>
			<td class="wb">
			<?php 
				if($list[$i]['wb']==0)
					echo "ok";
				else
					echo $list[$i]['wb']; 
			?>
			</td>
			<td class="pb">
			<?php 
				if($list[$i]['pb']==0)
					echo "ok";
				else
					echo $list[$i]['pb']; 
			?>
			</td>
			<td class="fc">
			<?php 
				if($list[$i]['fc']==0)
					echo "ok";
				else
					echo $list[$i]['fc']; 
			?>
			</td>
            
        <?php }?>
    </tbody>
</table>
	