    <?php echo form_open_multipart('elibrary/digital/search/');?>
    <div class="input-append">
        <input type="text" name="search" placeholder="Cari file..." style="width: 60%;height: 30px;font-size: 1.4em;"/><button class="btn btn-primary btn-large" type="button">Search</button>
    </div>
    </form>


        			

                        <h3>File</h3>

			

			<table class="table table-condensed table-striped">

				<tr><td width="20%">Judul</td><td> : <?php echo $insert['title'];?> </td><td><a class="btn" href="<?php echo $insert['location'];?>"><i class="icon-download-alt"></i> Buka File</a> </td></tr>
				
                                
			</table>
                         
			
				<?php echo form_open_multipart('elibrary/admin/upload/');?>
				<br /><input type="submit" value="Upload lagi" class="btn btn-primary"/>
				</form>
				

        
        
    



