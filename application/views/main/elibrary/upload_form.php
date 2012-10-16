
        		<h3>Upload File</h3>	
			<?php echo form_open_multipart('elibrary/upload/do_upload');?>
			<table class="table table-hover">
				<tr><td>File </td><td> : <input type="file" name="userfile" size="20" /> </td></tr>
<!--				<tr><td>Kategori </td><td> :
                                        <select name="category">
                                            <option value="1" >Text</option>
                                            <option value="2" >Video</option>
                                            <option value="3" >Presentasi</option>
                                            <option value="4" >Lain-lain</option>
                                        </select>
                                    </td>
                                </tr>-->
				<!-- <tr><td>Tipe File </td><td> : <input type="text" name="type" size="20" /> </td></tr> -->
				<!-- <tr><td>Image</td> <td> : <input type="file" name="image" size="20" /> </td></tr> -->
                                <tr><td>Keterangan </td><td> : <textarea name="keterangan" cols="40" rows="6"></textarea> </td></tr>
			</table>

			<br /><br />

			<input type="submit" value="Upload" class="btn btn-primary" />

			</form>
        
     
   