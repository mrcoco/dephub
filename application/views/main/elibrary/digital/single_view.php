    <?php echo form_open_multipart('elibrary/digital/search/');?>
    <div class="input-append">
        <input type="text" name="search" placeholder="Cari file..." style="width: 60%;height: 30px;font-size: 1.4em;"/><button class="btn btn-primary btn-large" type="button">Search</button>
    </div>
    </form>


        		
                        <div class="row-fluid">
                            <?php echo $this->session->flashdata('msg'); ?>
                        </div>   	

                        <h3>File</h3>

			

			<table class="table table-condensed table-striped">

				<tr><td width="20%">Judul</td><td> : <?php echo $bibliography[0]['title'];?> </td></tr>
				<tr><td>Pengarang</td><td> : <?php echo $bibliography[0]['authorname']; ?>          </td></tr>
                                <tr><td>Pengupload</td><td> : <?php echo $bibliography[0]['nama']; ?>          </td></tr>
                                <tr><td>Di-upload tanggal</td><td> : <?php echo $bibliography[0]['uploaddate'];?> </td></tr>
                                <tr><td>Kategori</td><td> : <?php echo $bibliography[0]['categoryname'];?></td></tr>
                                <tr><td>Keterangan</td><td> : <?php echo $bibliography[0]['keterangan'];?> </td></tr>
                                <tr><td>Tags/keywords</td><td> : <?php echo $bibliography[0]['tags'];?>  </td></tr>
                                
			</table>
                         <a class="btn" href="<?php echo $bibliography[0]['location'];?>"><i class="icon-download-alt"></i> Download File</a>
                         <?php echo form_open_multipart('elibrary/perpustakaan/viewer');?>
                         <input type="submit" value="Lihat" />
                         <input type="hidden" value="<?php echo $bibliography[0]['id'];?>" />
                         </form>
			

			

			
        
     
   