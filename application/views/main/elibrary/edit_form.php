
        			
			<?php echo form_open_multipart('elibrary/edit/edit_bibliography');?>
			<table>
				<tr><td>Judul</td><td> : <input type="text" name="title" size="20" value="<?php echo $bibliography[0]['title'];?>"/> </td></tr>
				<tr><td>Category</td><td> : <input type="text" name="category" size="20" value="<?php echo $bibliography[0]['category'];?>"/> </td></tr>
                                <tr><td>Keterangan</td><td> : <textarea name="keterangan" cols="40" rows="6"/><?php echo $bibliography[0]['keterangan'];?> </textarea> </td></tr>
				<input name="id" type="hidden" value="<?php echo $bibliography[0]['id'];?>">
				
			</table>

			<br /><br />

			<input type="submit" value="Kirim" />

			</form>
        
     
   