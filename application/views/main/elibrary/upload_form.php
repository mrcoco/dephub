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
        			
			<?php echo form_open_multipart('elibrary/upload/do_upload');?>
			<table>
				<tr><td>File </td><td> : <input type="file" name="userfile" size="20" /> </td></tr>
				<tr><td>Kategori </td><td> : <input type="text" name="category" size="20" /> </td></tr>
				<!-- <tr><td>Tipe File </td><td> : <input type="text" name="type" size="20" /> </td></tr> -->
				<!-- <tr><td>Image</td> <td> : <input type="file" name="image" size="20" /> </td></tr> -->
				<tr><td>Keterangan </td><td> : <input type="text" name="keterangan" size="20" /> </td></tr>
			</table>

			<br /><br />

			<input type="submit" value="upload" />

			</form>
        
     
    </div>
</div>