<?php date_default_timezone_set('Asia/Bangkok');
 
?>
                        <div class="row-fluid">
                            <?php echo $this->session->flashdata('msg'); ?>
                        </div>   
<h3>Form Pengembalian </h3>

    <table class="table table-condensed table-striped">
                                <?php echo form_open_multipart('elibrary/admin/do_kembali');?>
				<tr><td >Judul Buku</td><td> : <?php echo $data[0]['title'];?> </td></tr>
				<tr><td >Peminjam</td><td> : <?php echo $data[0]['nama'];?> </td></tr>
                                <tr><td >NIP Peminjam</td><td> : <?php echo $data[0]['nip'];?> </td></tr>
                                <tr><td >Tanggal Pinjam</td><td> : <?php echo $data[0]['loandate'];?> </td></tr>
                                <tr><td >Tanggal seharusnya</td><td> : <?php echo $data[0]['duedate'];?> </td></tr>
                                <tr><td >Tanggal Kembali</td><td> : <?php echo date('Y-m-d');?> </td></tr>
                                <tr><td >Denda </td><td> : <?php echo "Rp 1000";?> </td></tr>
                                <tr><td ><input type="submit" value="Kembali"></td><td></td></tr>
                                <input type="hidden" name="id" value="<?php echo $data[0]['id'];?>" />
                                <input type="hidden" name="booksid" value="<?php echo $data[0]['booksid'];?>" />
                                
                                <input type="hidden" name="returndate" value="<?php echo date('Y-m-d');?>" />
                                
                                </form>
			</table>
    
