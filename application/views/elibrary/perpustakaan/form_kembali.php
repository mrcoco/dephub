<?php

?>
<h3>Form Pengembalian </h3>
<form>
    <table class="table table-condensed table-striped">
                                <?php echo form_open_multipart('elibrary/admin/do_kembali');?>
				<tr><td >Judul Buku</td><td> : <?php echo "buku A";?> </td></tr>
				<tr><td >Peminjam</td><td> : <?php echo "Peminjam";?> </td></tr>
                                <tr><td >NIP Peminjam</td><td> : <?php echo "NIP Peminjam";?> </td></tr>
                                <tr><td >Tanggal Pinjam</td><td> : <?php echo "Tanggal";?> </td></tr>
                                <tr><td >Tanggal seharusnya</td><td> : <?php echo "Tanggal";?> </td></tr>
                                <tr><td >Tanggal Kembali</td><td> : <?php echo "Tanggal ketika di klik";?> </td></tr>
                                <tr><td >Denda </td><td> : <?php echo "Rp 1000";?> </td></tr>
                                <tr><td ><input type="submit" name="submit" value="Kembali"></td><td></td></tr>
                                <input type="hidden" name="id" value="" />
                                <input type="hidden" name="returndate" value="" />
                                
                                </form>
			</table>
    
</form>