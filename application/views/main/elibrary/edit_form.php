
                        <h3>Edit File</h3>
			<?php echo form_open_multipart('elibrary/edit/edit_bibliography');?>
			<table>
				<tr><td>Judul</td><td> : <input type="text" name="title" value="<?php echo $bibliography[0]['title'];?>"/> </td></tr>
                                <tr><td>Category</td><td> : 
                                        <select name="category">
                                            <option value="1" <?php if($bibliography[0]['category']==1)echo 'selected' ?>>Text</option>
                                            <option value="2" <?php if($bibliography[0]['category']==2)echo 'selected' ?>>Video</option>
                                            <option value="3" <?php if($bibliography[0]['category']==3)echo 'selected' ?>>Presentasi</option>
                                            <option value="4" <?php if($bibliography[0]['category']==4)echo 'selected' ?>>Lain-lain</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr><td>Keterangan</td><td> : <textarea name="keterangan" cols="40" rows="6"/><?php echo $bibliography[0]['keterangan'];?></textarea> </td></tr>
				<input name="id" type="hidden" value="<?php echo $bibliography[0]['id'];?>">
				
			</table>

			<br /><br />

			<input type="submit" value="Kirim"  class="btn btn-primary"/>

			</form>
        
     
   