
        			
			<h3>Hasil Pencarian</h3>
			<?php if(count($data)<1){?>
			Tidak ada file yang sesuai.
			<?php }
			else{?>
			<ul>
                         
			<?php foreach ($data as $number => $n):?>
			
                           <li><a href="<?php echo $data[$number]['location'];?>"><?php echo $data[$number]['title'];?></a><a href="<?php echo site_url("elibrary/")."/".$data[$number]['id']?>"> Delete</a></li> 
			
			<br />
			<?php endforeach; ?>
			<?php }?>
			</ul>
				



