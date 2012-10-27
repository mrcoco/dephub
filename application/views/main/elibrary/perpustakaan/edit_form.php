
        		<h3>Edit Buku</h3>	
			<?php echo form_open_multipart('elibrary/perpustakaan/do_edit_books');?>
			<table class="table table-hover">
				<tr><td>Judul Buku</td><td> : <input type="text" name="title" size="20" value="<?php echo $books[0]['title'];?>"/> </td></tr>

				<tr><td>Pengarang</td><td> : <select name="authorname" > 
                                                <option value="<?php echo $books[0]['authorname'];?>"> <?php echo $books[0]['authorname'];?></option>
                                                <?php foreach ($author as $number =>$n):?>
                                                <option value="<?php echo $author[$number]['authorname'];?>"><?php echo $author[$number]['authorname'];?></option>
                                                <?php endforeach; ?>
                                                </select></td></tr>
                                <tr><td>Kategori</td><td> : <select name="categoryname" > 
                                                <option value="<?php echo $books[0]['categoryname'];?>"><?php echo $bibliography[0]['categoryname'];?> </option>
                                                <?php foreach ($category as $number =>$n):?>
                                                <option value="<?php echo $category[$number]['categoryname'];?>"><?php echo $category[$number]['categoryname'];?></option>
                                                <?php endforeach; ?>
                                             </select></td></tr>
                                <tr><td>Edisi</td><td> : <input name="edition" value="<?php echo $books[0]['edition'];?>"/> </td></tr>
                                <tr><td>Frekuensi terbit</td><td> : <input name="frequency" value="<?php echo $books[0]['frequency'];?>"/> </td></tr>
                                <tr><td>ISSN/ISBN</td><td> : <input name="issnisbn" value="<?php echo $books[0]['issnisbn'];?>"/> </td></tr>
                                <tr><td>Penerbit</td><td> : <input name="publisher" value="<?php echo $books[0]['publisher'];?>"/> </td></tr>
                                <tr><td>Tempat Terbit</td><td> : <input name="publisherplace" value="<?php echo $books[0]['publisherplace'];?>"/> </td></tr>
                                <tr><td>Persediaan buku</td><td> : <input name="stock" value="<?php echo $books[0]['stock'];?>"/></td></tr>
                                <tr><td>Ada digital</td><td> : <input name="digital" value="<?php echo $books[0]['digital'];?>"/></textarea> </td></tr>
                                <tr><td>Keterangan</td><td> : <textarea name="keterangan" value="<?php echo $books[0]['keterangan'];?>" /> </td></tr>
                                <tr><td>Tags</td><td> : <textarea name="tags" value="<?php echo $books[0]['tags'];?>"/> </td></tr>
				<input name="id" type="hidden" value="<?php echo $books[0]['id'];?>">
                                <tr><td>Tags adalah keyword dari buku tersebut</td></tr>
				
				

			</table>

			<br /><br />

			<input type="submit" value="Tambahkan" class="btn btn-primary" />

			</form>
        
     
   