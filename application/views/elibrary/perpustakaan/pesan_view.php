
                        <div class="row-fluid">
                            <?php echo $this->session->flashdata('msg'); ?>
                        </div>   
<h3>Form Pemesanan peminjaman </h3>
<form>
    <table class="table table-condensed table-striped">

				<tr><td width="20%">Judul Buku</td><td> : <?php echo "buku A";?> </td></tr>
				<tr><td width="20%">Persediaan</td><td> : <?php echo "2";?> </td></tr>
                                <tr><td width="20%">Tersedia tanggal</td><td> : <?php echo "tanggal";?> </td></tr>
                                <tr><td width="20%">Pesan tanggal</td><td> : <input type="date" name="queuedate"></td></tr>
                                <tr><td width="20%">Pesan sebanyak</td><td> : <input type="number" name="amount"></td></tr>
                                <tr><td width=""><input type="submit" name="submit" value="Pesan"></td><td></td></tr>
                                
                                
                                
			</table>
    
</form>