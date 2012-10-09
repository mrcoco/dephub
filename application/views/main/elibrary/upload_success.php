
    
     
    
        			
			<h3>File telah berhasil di-upload</h3>
				<ul>
				<a href="<?php echo './assets/elibrary/uploads/'.$upload_data['orig_name']; ?>"><?php echo $upload_data['raw_name'];?></a>
				<br /><br />
				<ul>

				</ul>
				<?php echo form_open_multipart('elibrary/upload/upload_again');?>
				<input type="submit" value="Upload lagi" />
				</form>
				

        
        
    



