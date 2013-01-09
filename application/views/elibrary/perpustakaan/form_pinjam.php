<?php switch ($data[0]['frequency']=0) {
    case 0: $frequency="terbit sekali"; break;
    case 1: $frequency="Harian"; break;
    case 2: $frequency="Mingguan"; break;
    case 3: $frequency="Bulanan";  break;
    case 4: $frequency="Per dua bulan"; break;
    case 5: $frequency="Per Tiga bulan"; break;
    case 6: $frequency="Per Empat bulan"; break;
    case 7: $frequency="Per enam bulan"; break;
    case 8: $frequency="Per tahun";
        break;
}


?>

                        <div class="row-fluid">
                            <?php echo $this->session->flashdata('msg'); ?>
                        </div>   
                        <h3>Form Peminjaman</h3>
                        <?php echo form_open_multipart('elibrary/admin/do_pinjam');?>
			<table class="table table-hover">
                            <tr><td>Tanggal Pinjam</td><td> : <input required="required" type="date" name="loandate"  value="<?php echo date('Y-m-d');?>"/> </td></tr>
                            <tr><td>Sampai</td><td> : <input required="required" type="date" name="duedate"  value="<?php echo date('Y-m-d', strtotime('+1 week'));?>"/> </td></tr>
                            <tr><td>Banyaknya</td><td> : <input required="required" type="number" name="amount"  min="0" max="<?php echo ($data[0]['stock']-$loaned);?>"/> </td></tr>
                            <tr><td>NIP Peminjam<td>: <input required="required" type="text" name="idpegawai" /></td></tr>
                            <input type="hidden" name="booksid" value="<?php echo $data[0]['id'];?>" />
                            
                        </table>
                        <input type="submit" value="Kirim"><input type="button" class="btn" value="Cancel" onclick="history.go(-1)"/>
                     </form>
			
                     <h4>Buku yang Dipinjam</h4>
			<table class="table table-condensed table-striped">

				<tr><td>Judul</td><td> : <?php echo $data[0]['title'];?> </td></tr>
				<tr><td>Pengarang</td><td> : <?php echo $data[0]['authorname']; ?>          </td></tr>
                                <tr><td>Kategori</td><td> : <?php echo $data[0]['categoryname'];?></td></tr>
                                <tr><td>Edisi</td><td> : <?php echo $data[0]['edition'];?></td></tr>
                                <tr><td>Frekuensi</td><td> : <?php echo $frequency;?></td></tr>
                                <tr><td>ISSN/ISBN</td><td> : <?php echo $data[0]['issnisbn'];?></td></tr>
                                <tr><td>Kota penerbit</td><td> : <?php echo $data[0]['publisherplace'];?></td></tr>
                                <tr><td>Publisher</td><td> : <?php echo $data[0]['publisher'];?></td></tr>
                                <tr><td>Tahun Terbit</td><td> : <?php echo $data[0]['publisheryear'];?></td></tr>
                                <tr><td>Stock</td><td> : <?php echo $data[0]['stock'];?></td></tr>
                                <tr><td>   &emsp;Sisa</td><td> : <?php echo ($data[0]['stock']-$loaned);?></td></tr>
                                <tr><td>Keterangan</td><td> : <?php echo $data[0]['keterangan'];?> </td></tr>
                                <tr><td>Tags</td><td> : <?php echo $data[0]['tags'];?>  </td></tr>

                                
                                
                     
                                
			</table>
                        

			

			
        
     
   