<?php switch ($data[0]['frequency']) {
    case 0:$frequency="terbit sekali";break;
    case 1:$frequency="Harian";break;
    case 2:$frequency="Mingguan";break;
    case 3:$frequency="Bulanan";break;
    case 4:$frequency="Per dua bulan";break;
    case 5:$frequency="Per Tiga bulan";break;
    case 6:$frequency="Per Empat bulan";break;
    case 7:$frequency="Per enam bulan";        break;
    case 8:$frequency="Per tahun";        break;
}
$data[0]['pinjam']=1;
?>

        			

                        <div class="row-fluid">
                            <?php echo $this->session->flashdata('msg'); ?>
                        </div>   
                        <h3>Buku</h3>

			

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
                                <tr><td>   &emsp;Sisa</td><td> : <?php echo $sisa=($data[0]['stock']-$loaned);?></td></tr>
                                <tr><td>Keterangan</td><td> : <?php echo $data[0]['keterangan'];?> </td></tr>
                                <tr><td>Tags</td><td> : <?php echo $data[0]['tags'];?>  </td></tr>
                                
                                
                                
			</table>
<?php if ($this->session->userdata('is_login')) { $role=$this->session->userdata('elib_userrole');//ket 1?>
           <?php if ($sisa<=0){//ket2?>    <a class="btn" href="<?php echo site_url("elibrary/perpustakaan/pesan")."/".$data[0]['id']?>">Pesan</a>
           <?php }?>
     <?php if($role==1){//ket3?>          
           <?php if ($sisa>0){//ket4?> <a href="<?php echo site_url("elibrary/admin/pinjam")."/".$data[0]['id']?>" class="btn"><i class="icon-edit"></i> Pinjamkan</a> 
           <?php }?>
                                       <a href="<?php echo site_url("elibrary/admin/edit_books")."/".$data[0]['id']?>" class="btn"><i class="icon-edit"></i> Ubah</a>
                                       <a href="<?php echo site_url("elibrary/admin/delete_books")."/".$data[0]['id']?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')"> <i class="icon-trash"></i> Hapus
                                       </a>
     <?php }?>
<?php } else echo 'Pemesanan dilakukan jika Anda login.';?>
                                       
   <?php //ket1=memeriksa apakah login ket2=memeriksa ketersediaan buku ket3=memeriksa admin, ket4=Kalau ada bukunya bisa dipinjamkan
   ?>