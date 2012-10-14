
        			
			<h3>Tipe File</h3>
			<?php if(count($bibliography)<1){?>
			Data kosong
			<?php }
			else{?>
			<ul>
                         
			<?php foreach ($bibliography as $number => $n):?>
			
                            <li><a href="<?php echo $bibliography[$number]['location'];?>"><?php echo $bibliography[$number]['title'];?></a><a href="<?php echo site_url("elibrary/type/delete_bibliography")."/".$bibliography[$number]['id']?>"> Delete</a><a href="<?php echo site_url("elibrary/edit/bibliography")."/".$bibliography[$number]['id']?>"> Edit</a></li> 
			
			<br />
			<?php endforeach; ?>
			<?php }?>
			</ul>
				



