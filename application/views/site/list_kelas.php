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
</table>
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
<div class="form-actions">
    <a href="kamar/add_kamar" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Tambah</a>
</div>
