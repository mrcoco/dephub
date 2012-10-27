

        			

                        <h3>File</h3>

			

			<table class="table table-condensed table-striped">

				<tr><td>Judul</td><td> : <?php echo $books[0]['title'];?> </td></tr>
				<tr><td>Pengarang</td><td> : <?php echo $books[0]['authorname']; ?>          </td></tr>
                                <tr><td>Kategori</td><td> : <?php echo $books[0]['categoryname'];?></td></tr>
                                <tr><td>Keterangan</td><td> : <?php echo $books[0]['keterangan'];?> </td></tr>
                                <tr><td>Tags</td><td> : <?php echo $books[0]['tags'];?>  </td></tr>

                                <tr><td>Tags adalah keyword dari file tersebut</td></tr>
                                
			</table>
                         <a class="btn" href="<?php echo $books[0]['location'];?>">Buka File</a>
			

			

			
        
     
   