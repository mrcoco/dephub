<div class="row">
    
     <div class="span3">
        <div class="well sidemenu">
            <ul class="nav nav-list">
                <li>TEGUH NUGRAHA</li>
                <li class="divider"></li>
                <li><a href="#">Edit Profil</a></li>
                <li><a href="site/dashboard/library/">Logout</a></li>
            </ul>
        </div>
        <div class="well sidemenu">
            <ul class="nav nav-list">
                <li class="nav-header">Menu</li>
                <li ><a href="#">Home</a></li>
                <li><a href="#">Riwayat</a></li>
                <li><a href="#">Favorit</a></li>
		<li ><a href="<?php echo site_url("elibrary/upload"); ?>">Upload</a></li>
                <li class="nav-header">Kategori file</li>
                <li ><a href="<?php echo site_url("elibrary/type/text"); ?>"><i class="icon-file icon-white"></i>Kategori Text</a></li>
                <li><a href="#"><i class="icon-film"></i>Kategori 2</a></li>
                <li><a href="#"><i class="icon-picture"></i>Kategori 3</a></li>
                <li><a href="#"><i class="icon-book"></i>Kategori 4</a></li>
                <li class="divider"></li>
                <li><a href="#">Peraturan</a></li>
                <li><a href="#">Tentang E-library</a></li>
            </ul>
        </div>
    </div>
    <div class="span9">
        			
			<h3>Tipe File</h3>
			<?php if(count($bibliography)<1){?>
			Data kosong
			<?php }
			else{?>
			<ul>
                         
			<?php foreach ($bibliography as $number => $n):?>
			
                            <li><a href="<?php echo $bibliography[$number]['location'];?>"><?php echo $bibliography[$number]['title'];?></a><a href="<?php echo site_url("elibrary/type/delete_bibliography")."/".$bibliography[$number]['id']?>"> Delete</a></li> 
			
			<br />
			<?php endforeach; ?>
			<?php }?>
			</ul>
				
				

        
        
    </div>
</div>


