
        		<h3>Tambah Buku</h3>	
			<?php echo form_open_multipart('elibrary/perpustakaan/do_input');?>
			<table class="table table-hover">
				<tr><td>Judul Buku</td><td> : <input type="text" name="title" size="20" /> </td></tr>

				<tr><td>Pengarang</td><td> : <select name="authorname" > 
                                            
                                                <?php foreach ($author as $number =>$n):?>
                                                <option value="<?php echo $author[$number]['authorname'];?>"><?php echo $author[$number]['authorname'];?></option>
                                                <?php endforeach; ?>
                                                </select></td></tr>
                                <tr><td>Kategori</td><td> : <select name="categoryname" > 
                                            
                                                <?php foreach ($category as $number =>$n):?>
                                                <option value="<?php echo $category[$number]['categoryname'];?>"><?php echo $category[$number]['categoryname'];?></option>
                                                <?php endforeach; ?>
                                             </select></td></tr>
                                <tr><td>Edisi</td><td> : <textarea name="edition" cols="40" rows="1"/></textarea> </td></tr>
                                <tr><td>Frekuensi terbit</td><td> : <textarea name="frequency" cols="40" rows="1"/></textarea> </td></tr>
                                <tr><td>ISSN/ISBN</td><td> : <textarea name="issnisbn" cols="40" rows="1"/></textarea> </td></tr>
                                <tr><td>Penerbit</td><td> : <textarea name="publisher" cols="40" rows="1"/></textarea> </td></tr>
                                <tr><td>Tempat Terbit</td><td> : <textarea name="publisherplace" cols="40" rows="1"/></textarea> </td></tr>
                                <tr><td>Persediaan buku</td><td> : <textarea name="stock" cols="40" rows="1"/></textarea> </td></tr>
                                <tr><td>Ada digital</td><td> : <textarea name="digital" cols="40" rows="1"/></textarea> </td></tr>
                                <tr><td>Keterangan</td><td> : <textarea name="keterangan" cols="40" rows="3"/></textarea> </td></tr>
                                <tr><td>Tags</td><td> : <textarea name="tags" cols="40" rows="3"/> </textarea> </td></tr>
				
                                <tr><td>Tags adalah keyword dari buku tersebut</td></tr>
				
				

			</table>

			<br /><br />

			<input type="submit" value="Tambahkan" class="btn btn-primary" />

			</form>
        
     
   