
	<h4>Check List Prasarana Kamar Asrama</h4>
	
	
	
	
<table width="100%" class="table table-striped table-bordered table-condensed">
    <thead>
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
    </thead>
    <tbody>
        <?php for($i=0;$i<count($list);$i++) {?>
        <tr class="gedung<?php echo $list[$i]['id'] ?>">
            <td class="no"><?php echo ($i+1) ?></td>
            <td class="id_kamar">
			<?php 
				if($list[$i]['id_kamar']==0)
					echo "ok";
				else
					echo $list[$i]['id_kamar']; 
			?>
			</td>
            <td class="lampu1">
			<?php 
				if($list[$i]['lampu1']==0)
					echo "ok";
				else
					echo $list[$i]['lampu1']; 
			?>
			</td>
            <td class="lampu2">
			<?php 
				if($list[$i]['lampu2']==0)
					echo "ok";
				else
					echo $list[$i]['lampu2']; 
			?>
			</td>
            <td class="lampu3">
			<?php 
				if($list[$i]['lampu3']==0)
					echo "ok";
				else
					echo $list[$i]['lampu3']; 
			?>
			</td>
            <td class="lampu4">
			<?php 
				if($list[$i]['lampu4']==0)
					echo "ok";
				else
					echo $list[$i]['lampu4']; 
			?>
			</td>
            <td class="lampu5">
			<?php 
				if($list[$i]['lampu5']==0)
					echo "ok";
				else
					echo $list[$i]['lampu5']; 
			?>
			</td>
            <td class="toilet1">
			<?php 
				if($list[$i]['toilet1']==0)
					echo "ok";
				else
					echo $list[$i]['toilet1']; 
			?>
			</td>
            <td class="toilet2">
			<?php 
				if($list[$i]['toilet2']==0)
					echo "ok";
				else
					echo $list[$i]['toilet2']; 
			?>
			</td>
            <td class="toilet3">
			<?php 
				if($list[$i]['toilet3']==0)
					echo "ok";
				else
					echo $list[$i]['toilet3']; 
			?>
			</td>
            <td class="toilet4">
			<?php 
				if($list[$i]['toilet4']==0)
					echo "ok";
				else
					echo $list[$i]['toilet4']; 
			?>
			</td>
            <td class="toilet5">
			<?php 
				if($list[$i]['toilet5']==0)
					echo "ok";
				else
					echo $list[$i]['toilet5']; 
			?>
			</td>
            <td class="ac1">
			<?php 
				if($list[$i]['ac1']==0)
					echo "ok";
				else
					echo $list[$i]['ac1']; 
			?>
			</td>
            <td class="ac2">
			<?php 
				if($list[$i]['ac2']==0)
					echo "ok";
				else
					echo $list[$i]['ac2']; 
			?>
			</td>
            <td class="lain_lain"><?php echo $list[$i]['lain_lain'] ?></td>
            <td class="kebersihan"><?php echo $list[$i]['kebersihan'] ?></td>
        <?php }?>
    </tbody>
</table>
	