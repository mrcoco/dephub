
        			
			<h3>Hasil Pencarian</h3>
			<?php if(count($bibliography)<1){?>
			Tidak ada file yang sesuai.
			<?php }
			else{?>
			<ul>
                         
			<?php foreach ($bibliography as $number => $n):?>
			
                            <li><a href="<?php echo site_url("elibrary/digital/view")."/".$bibliography[$number]['id']?>"><?php echo $bibliography[$number]['title'];?></a><a href="<?php echo site_url("elibrary/digital/delete_bibliography")."/".$bibliography[$number]['id']?>"> Delete</a></li> 
			
			<br />
			<?php endforeach; ?>
			<?php }?>
			</ul>
				



