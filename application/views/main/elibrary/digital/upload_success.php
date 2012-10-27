
    
     
    
        			
                        <div class="row-fluid">
                            <h3><?php echo $this->session->flashdata('msg'); ?></h3>
                        </div>        			
                        
				<a href="<?php echo './assets/elibrary/uploads/'.$item['orig_name']; ?>"><?php echo $item['raw_name'];?></a>
				<br /><br />
				<?php echo form_open_multipart('elibrary/digital/upload/');?>
				<input type="submit" value="Upload lagi" class="btn btn-primary"/>
				</form>
				

        
        
    



