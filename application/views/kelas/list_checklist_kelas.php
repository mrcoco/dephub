<div class="row">
    <div class="span12"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
<div class="row">	
<div class="span12">	
<table width="100%" id="list" class="table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th width="5%" rowspan='2'>No</th>
            <th width="20%" rowspan='2'>Nama Kelas</th>
            <th width="15%" colspan='4'><div align="center">LCD Proyektor</div></th>
            <th width="10%" colspan='2'><div align="center">Sound System</div></th>
            <th width="15%" colspan='3'><div align="center">Meja</div></th>
            <th width="10%" colspan='3'><div align="center">Kursi</div></th>
            <th width="5%"><div align="center">Whiteboard</div></th>
            <th width="5%"><div align="center">Panaboard</div></th>
            <th width="5%"><div align="center">Flipchart</div></th>
			<th width="5%" rowspan='2'><div align="center">Aksi</div></th>
        </tr>
        <tr>
            <th>Type</th>
            <th>OK</th>
            <th>Jml</th>
            <th>Lap Time</th>
            <th>Type</th>
            <th>OK</th>
            <th>Type</th>
            <th>OK</th>
            <th>Jml</th>
            <th>Type</th>
            <th>OK</th>
            <th>Jml</th>
            <th>OK</th>
            <th>OK</th>
            <th>OK</th>
        </tr>
    </thead>
    
    <tbody>
        <?php for($i=0;$i<count($list);$i++) {?>
        <tr class="gedung<?php echo $list[$i]['id'] ?>">
		<form name="form_edit" id="form_reg" action="kelas/update_checklist/<?php echo $list[$i]['id'] ?>" method="POST">
            <td class="no"><?php echo ($i+1) ?></td>
            <td class="nama"><?php echo $list[$i]['nama'] ?></td>
            <td class="l1"><input type="text" class="angka" name="l1" value="<?php echo $list[$i]['l1']; ?>" />
			</td>
            <td class="l2"><input type="checkbox" name="l2" value="1"
			<?php 
				if($list[$i]['l2']!=0)
					echo "checked";
			?>/>
			</td>
            <td class="l3"><input type="text" class="angka" name="l3" value="<?php echo $list[$i]['l3']; ?>" />
			</td>
            <td class="l4"><input type="text" class="angka" name="l4" value="<?php echo $list[$i]['l4']; ?>" />
			</td>
			<td class="s1"><input type="text" class="angka" name="s1" value="<?php echo $list[$i]['s1']; ?>" />
			</td>
			<td class="s2"><input type="checkbox" name="s2" value="1"
			<?php 
				if($list[$i]['s2']!=0)
					echo "checked"; 
			?>/>
			</td>
			<td class="m1"><input type="text" class="angka" name="m1" value="<?php echo $list[$i]['m1']; ?>" />
			</td>
			<td class="m2"><input type="checkbox" name="m2" value="1"
			<?php 
				if($list[$i]['m2']!=0)
					echo "checked";
			?>/>
			</td>
			<td class="m3"><input type="text" class="angka" name="m3" value="<?php echo $list[$i]['m3']; ?>" />
			</td>
			<td class="k1"><input type="text" class="angka" name="k1" value="<?php echo $list[$i]['k1']; ?>" />
			</td>
			<td class="k2"><input type="checkbox" name="k2" value="1"
			<?php 
				if($list[$i]['k2']!=0)
					echo "checked";
			?>/>
			</td>
			<td class="k3"><input type="text" class="angka" name="k3" value="<?php echo $list[$i]['k3']; ?>" />
			</td>
			<td class="wb"><input type="checkbox" name="wb" value="1"
			<?php 
				if($list[$i]['wb']!=0)
					echo "checked";
			?>/>
			</td>
			<td class="pb"><input type="checkbox" name="pb" value="1"
			<?php 
				if($list[$i]['pb']!=0)
					echo "checked";
			?>/>
			</td>
			<td class="fc"><input type="checkbox" name="fc" value="1"
			<?php 
				if($list[$i]['fc']!=0)
					echo "checked";
			?>/>
			</td>
			
			<td>
				<input type="submit" class="btn btn-mini btn-primary" value="Simpan"/>
				<!--<a href="kelas/edit_checklist/<?php echo $list[$i]['id'] ?>" class="btn btn-mini btn-primary pull-right"/>Ubah</a>-->
			</td>
			
            </form>
		</tr>
        <?php }?>
    </tbody>
</table>
</div>	
</div>	