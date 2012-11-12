<?php switch ($books[0]['frequency']=0) {
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

                        <div class="row-fluid">
                            <?php echo $this->session->flashdata('msg'); ?>
                        </div>   
                        <h3>Form Peminjaman</h3>
                        <?php echo form_open_multipart('elibrary/admin/do_pinjam');?>
			<table class="table table-hover">
                            <tr><td>Tanggal pinjam</td><td> : <input type="date" name="loandate"  /> </td></tr>
                            <tr><td>Tanggal Pengembalian</td><td> : <input type="date" name="duedate"  /> </td></tr>
                            <tr><td>Banyaknya</td><td> : <input type="number" name="amount" value="1"/> </td></tr>
                            <input type="hidden" name="booksid" value="<?php echo "1"?>" />
                            <input type="hidden" name="idpegawai" value="<?php echo "1"?>" />
                        </table>
                        <input type="submit" value="Kirim">
                     </form>
			
                     <h4>Buku yang Dipinjam</h4>
			<table class="table table-condensed table-striped">

				<tr><td>Judul</td><td> : <?php echo 'Judul';?> </td></tr>
				<tr><td>Pengarang</td><td> : <?php echo 'Pengarang'; ?>          </td></tr>
                                <tr><td>Kategori</td><td> : <?php echo 'kategori';?></td></tr>
                                <tr><td>Edisi</td><td> : <?php echo 'edisi';?></td></tr>
                                <tr><td>Frekuensi</td><td> : <?php echo $frequency;?></td></tr>
                                <tr><td>ISSN/ISBN</td><td> : <?php echo "ISSN/ISBN";?></td></tr>
                                <tr><td>Kota penerbit</td><td> : <?php echo 'Tempat Terbit';?></td></tr>
                                <tr><td>Penerbit</td><td> : <?php echo "Penerbit";?></td></tr>
                                <tr><td>Tahun Terbit</td><td> : <?php echo "Tahun terbit";?></td></tr>
                                <tr><td>Stock</td><td> : <?php echo "4";?></td></tr>
                                <tr><td>   &emsp;Sisa</td><td> : <?php echo (3);?></td></tr>
                                <tr><td>Keterangan</td><td> : <?php echo 'keterangan';?> </td></tr>
                                <tr><td>Tags</td><td> : <?php echo 'tags';?>  </td></tr>

                                
                                
                     
                                
			</table>
                        

			

			
        
     
   