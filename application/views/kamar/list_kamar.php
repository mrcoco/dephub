<div class="row">
    <div class="span9"><?php echo $this->session->flashdata('msg'); ?></div>
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
	
	?>
</table>
<br />
<table id="list" width="100%" class="table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th width="5%">No</th>
            <th width="10%">Nomor Kamar</th>
            <th width="5%">Bed</th>
            <th width="5%">Status</th>
            <th width="5%">Terisi</th>
            <th width="5%">Jenis Kelamin</th>
            <th width="25%">Program</th>
            <th width="25%">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php 
		for($i=0;$i<count($list);$i++) {
			
		?>
        <tr class="gedung<?php echo $list[$i]['id'] ?>">
            <td class="no"><?php echo ($i+1) ?></td>
            <td class="nomor"><?php echo $list[$i]['nama'].$list[$i]['nomor'] ?></td>
            <td class="bed"><?php echo $list[$i]['bed'] ?></td>
			<td class="status"><?php echo $list[$i]['status'] ?></td>
			<td class="status"><?php 
			$data=null;
			for($k=0;$k<count($pemakaian);$k++)
			{
				//terisi
				if($list[$i]['id']==$pemakaian[$k]['id_kamar'])
				{
					echo "Terisi";
					$data=$pemakaian[$k];
					break;
				}
				else
				{
					echo "Kosong";
					$data=null;
				}
			}			
			?></td>
			<td class="status"><?php 
			if($data!=null)
				echo $data['jenis_kelamin'];
			else
				echo "-"
			?></td>
			<td class="status"><?php 
			if($data!=null)
				echo $data['program'];
			else
				echo "-"
			?></td>
            <td class="aksi">
                <a href='kamar/edit_kamar/<?php echo $list[$i]['id']?>' class='btn btn-mini'><i class="icon-edit"></i> Ubah</a>
                <a href='kamar/delete_kamar/<?php echo $list[$i]['id']?>' class='btn btn-mini btn-danger'
                   onclick="return confirm('Apakah anda yakin ingin menghapus?');"><i class="icon-remove"></i> Hapus</a>
				<?php
					if($data!=null)
						echo "<a href='kamar/list_kamar_detail/".$data['id_kamar']."' class='btn btn-mini'> Detail</a>";
				?>
            </td>
		</tr>
        <?php }?>
    </tbody>
</table>
<div class="form-actions">
    <a href="kamar/add_kamar" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i>Tambah</a>
</div>
