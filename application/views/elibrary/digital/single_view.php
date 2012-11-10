    <?php echo form_open_multipart('elibrary/digital/search/');?>
    <div class="input-append">
        <input type="text" name="search" placeholder="Cari file..." style="width: 60%;height: 30px;font-size: 1.4em;"/><button class="btn btn-primary btn-large" type="button">Search</button>
    </div>
    </form>


        			

                        <h3>File</h3>

			

			<table class="table table-condensed table-striped">

				<tr><td width="20%">Judul</td><td> : <?php echo $bibliography[0]['title'];?> </td></tr>
				<tr><td>Pengarang</td><td> : <?php echo $bibliography[0]['authorname']; ?>          </td></tr>
                                <tr><td>Kategori</td><td> : <?php echo $bibliography[0]['categoryname'];?></td></tr>
                                <tr><td>Keterangan</td><td> : <?php echo $bibliography[0]['keterangan'];?> </td></tr>
                                <tr><td>Tags/keywords</td><td> : <?php echo $bibliography[0]['tags'];?>  </td></tr>
                                
			</table>
                         <a class="btn" href="<?php echo $bibliography[0]['location'];?>"><i class="icon-download-alt"></i> Buka File</a>
			

			

			
        
     
   