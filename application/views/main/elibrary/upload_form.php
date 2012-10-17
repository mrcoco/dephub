
        			
			<?php echo form_open_multipart('elibrary/upload/do_upload');?>
			<table>
				<tr><td>File </td><td> : <input type="file" name="userfile" size="20" /> </td></tr>
				<tr><td>Pengarang</td><td>:<select name="authorname" > 
                                            
                                                <?php foreach ($author as $number =>$n):?>
                                                <option value="<?php echo $author[$number]['authorname'];?>"><?php echo $author[$number]['authorname'];?></option>
                                                <?php endforeach; ?>
                                                </select></td></tr>
                                <tr><td>Kategori</td><td> : <select name="categoryname" > 
                                            
                                                <?php foreach ($category as $number =>$n):?>
                                                <option value="<?php echo $category[$number]['categoryname'];?>"><?php echo $category[$number]['categoryname'];?></option>
                                                <?php endforeach; ?>
                                             </select></td></tr>
                                <tr><td>Keterangan</td><td> : <textarea name="keterangan" cols="40" rows="6"/></textarea> </td></tr>
                                <tr><td>Tags</td><td> : <textarea name="tags" cols="40" rows="6"/> </textarea> </td></tr>
				
                                <tr><td>Tags adalah keyword dari file tersebut</td></tr>
				<!-- <tr><td>Tipe File </td><td> : <input type="text" name="type" size="20" /> </td></tr> -->
				<!-- <tr><td>Image</td> <td> : <input type="file" name="image" size="20" /> </td></tr> -->
				
			</table>

			<br /><br />

			<input type="submit" value="upload" />

			</form>
        
     
   