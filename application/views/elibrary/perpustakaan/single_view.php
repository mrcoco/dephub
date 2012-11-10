<?php switch ($books[0]['frequency']) {
    case 0:
        $frequency="terbit sekali";
        break;
    case 1:
        $frequency="Harian";
        break;
    case 2:
        $frequency="Mingguan";
        break;
    case 3:
        $frequency="Bulanan";
        break;
    case 4:
        $frequency="Per dua bulan";
        break;
    case 5:
        $frequency="Per Tiga bulan";
        break;
    case 6:
        $frequency="Per Empat bulan";
        break;
    case 7:
        $frequency="Per enam bulan";
        break;
    case 8:
        $frequency="Per tahun";
        break;
}
$books[0]['pinjam']=1;
?>

        			

                        <h3>File</h3>

			

			<table class="table table-condensed table-striped">

				<tr><td>Judul</td><td> : <?php echo $books[0]['title'];?> </td></tr>
				<tr><td>Pengarang</td><td> : <?php echo $books[0]['authorname']; ?>          </td></tr>
                                <tr><td>Kategori</td><td> : <?php echo $books[0]['categoryname'];?></td></tr>
                                <tr><td>Edisi</td><td> : <?php echo $books[0]['edition'];?></td></tr>
                                <tr><td>Frekuensi</td><td> : <?php echo $frequency;?></td></tr>
                                <tr><td>ISSN/ISBN</td><td> : <?php echo $books[0]['issnisbn'];?></td></tr>
                                <tr><td>Kota penerbit</td><td> : <?php echo $books[0]['publisherplace'];?></td></tr>
                                <tr><td>Publisher</td><td> : <?php echo $books[0]['publisher'];?></td></tr>
                                <tr><td>Tahun Terbit</td><td> : <?php echo $books[0]['publisheryear'];?></td></tr>
                                <tr><td>Stock</td><td> : <?php echo $books[0]['stock'];?></td></tr>
                                <tr><td>   &emsp;Sisa</td><td> : <?php echo ($books[0]['stock']-$books[0]['pinjam']);?></td></tr>
                                <tr><td>Keterangan</td><td> : <?php echo $books[0]['keterangan'];?> </td></tr>
                                <tr><td>Tags</td><td> : <?php echo $books[0]['tags'];?>  </td></tr>

                                <tr><td>Tags adalah keyword dari file tersebut</td><td></td></tr>
                                
			</table>
                         <a class="btn" href="#">Pesan</a>
			

			

			
        
     
   