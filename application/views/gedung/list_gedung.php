<script type="text/javascript">
    function add_gedung(){
        $('#add').modal({show:true});
    }
    function edit_gedung(nama,id){
        $('#edit').modal({show:true});
        $('#edit').find('input:text').val(nama);
        $('#edit').find('input:hidden').val(id);
    }
</script>
<div class="row">
    <div class="span12"><?php echo $this->session->flashdata('msg'); ?></div>
</div>


<table width="100%" id="list" class="table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th rowspan="2" width="5%">No</th>
            <th rowspan="2" width="10%">Nama Gedung</th>
            <th colspan="3" width="20%"><center>Terisi</center></th>
            <th colspan="3" width="20%"><center>Kosong</center></th>
            <th rowspan="2">Aksi</th>
        </tr>
		<tr>
			<th>Tersedia</th>
			<th>Rusak</th>
			<th>Diperbaiki</th>
			<th>Tersedia</th>
			<th>Rusak</th>
			<th>Diperbaiki</th>
		</tr>
    </thead>
    <tbody>
        <?php 
		for($i=0;$i<count($list);$i++)
		{
			$terisitersedia=0;
			$terisirusak=0;
			$terisidiperbaiki=0;
			$tersedia=0;
			$rusak=0;
			$diperbaiki=0;
			
			for($j=0;$j<count($kamar);$j++)
			{
				//kamar di gedung ke j
				if($list[$i]['id']==$kamar[$j]['asrama'])
				{
					if($kamar[$j]['status']==1)
					{
						$tersedia++;
					}
					else if($kamar[$j]['status']==2)
					{
						$rusak++;
					}
					else
					{
						$diperbaiki++;
					}
					
					for($k=0;$k<count($pemakaian);$k++)
					{
						//terisi
						if($kamar[$j]['id']==$pemakaian[$k]['id_kamar'])
						{
							if($kamar[$j]['status']==1)
							{
								$terisitersedia++;
							}
							else if($kamar[$j]['status']==2)
							{
								$terisirusak++;
							}
							else
							{
								$terisidiperbaiki++;
							}
						}
					}
				}
			}
			
			$kosongtersedia=$tersedia-$terisitersedia;
			$kosongrusak=$rusak-$terisirusak;
			$kosongdiperbaiki=$diperbaiki-$terisidiperbaiki;
			
		?>
			<tr class="gedung<?php echo $list[$i]['id'] ?>">
				<td class="no"><?php echo ($i+1) ?></td>
				<td class="nama"><?php echo $list[$i]['nama'] ?></td>
				<td><?php echo $terisitersedia;?></td>
				<td><?php echo $terisirusak;?></td>
				<td><?php echo $terisidiperbaiki;?></td>
				<td><?php echo $kosongtersedia;?></td>
				<td><?php echo $kosongrusak;?></td>
				<td><?php echo $kosongdiperbaiki;?></td>
				<td class="aksi">
					<a href='kamar/list_kamar_gedung/<?php echo $i+1?>' class='btn btn-mini'><i class="icon-zoom-in"></i> Lihat Kamar</a>
	<!--                <a href="gedung/edit_gedung/<?php echo $list[$i]['id']?>" class="btn btn-mini"><i class="icon-edit"></i> Ubah</a>-->
					<a href="javascript:edit_gedung('<?php echo $list[$i]['nama']?>',<?php echo $list[$i]['id']?>)" class="btn btn-mini"><i class="icon-edit"></i> Ubah</a>
					<a href="gedung/delete_gedung/<?php echo $list[$i]['id']?>"  class="btn btn-danger btn-mini"
					onclick="return confirm('Apakah Anda yakin ingin menghapus <?php echo $list[$i]['nama'] ?>?')">
						<i class="icon-trash"></i> Hapus</a>
				</td>
			</tr>
        <?php 
		}
		?>	
    </tbody>
</table>

<div class="form-actions">
    <a href="javascript:add_gedung()" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Tambah</a>
</div>
    <form action="<?php echo base_url()?>gedung/add_gedung_process" method="post">
<div class="modal hide" id="add">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h3>Tambah Gedung</h3>
        </div>
        <div class="modal-body">
            <p>Nama Gedung : <input type="text" name="nama"/></p>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn" data-dismiss="modal">Cancel</a>
            <input class="btn btn-primary" type="submit" value="Simpan"/>
        </div>
</div>
</form>
    <form action="<?php echo base_url()?>gedung/edit_gedung_process" method="post">
<div class="modal hide" id="edit">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h3>Ubah Gedung</h3>
        </div>
        <div class="modal-body">
            <p><input type="text" name="nama"/><input type="hidden" name="id"/></p>
            <p>Nama Gedung : <input type="text" name="nama"/><input type="hidden" name="id"/></p>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn" data-dismiss="modal">Cancel</a>
            <input class="btn btn-primary" type="submit" value="Simpan"/>
        </div>
</div>
</form>