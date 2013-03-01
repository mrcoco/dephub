<div class="row">
    <div class="span12"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
<br />
<table id="list" width="100%" class="table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th width="5%">No</th>
            <th width="10%">Nomor Kamar</th>
            <th width="40%">Peserta</th>
            <th width="35%">Program</th>
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
				//terisi
				if($list[$i]['id']==$pemakaian[$k]['id_kamar'])
				{
				?>
				<tr class="kamar<?php echo $list[$i]['id'] ?>">
					<td class="no"><?php echo $j; $j++; ?></td>
					<td class="nomor"><?php echo $list[$i]['nama'].$list[$i]['nomor'] ?></td>
					<?php
					$data=$pemakaian[$k];
					?></td>
						<td class="nama">
						<?php 
							for($l=0;$l<count($pemakaian);$l++)
							{
								if($list[$i]['id']==$pemakaian[$l]['id_kamar'])
								{
									echo "- ".$pemakaian[$l]['nip']." - ".$pemakaian[$l]['nama']."</br>";
								}
							}
						?></td>
					<td class="program"><?php echo $data['program']; ?></td>
					<td class="program"><?php echo $data['angkatan']; 
					break;
				}
				else //kamar kosong
				{
					$data=null;
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
