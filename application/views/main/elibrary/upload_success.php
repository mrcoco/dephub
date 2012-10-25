
    
     
    
        			
                        <div class="row-fluid">
                            <?php echo $this->session->flashdata('msg'); ?>
                        </div>        			
                        <h3>File telah diupload</h3>
				<a href="<?php echo './assets/elibrary/uploads/'.$item['orig_name']; ?>"><?php echo $upload_data['raw_name'];?></a>
				<br /><br />
				<?php echo form_open_multipart('elibrary/upload/');?>
				<input type="submit" value="Upload lagi" class="btn btn-primary"/>
				</form>
				

        
        
    



