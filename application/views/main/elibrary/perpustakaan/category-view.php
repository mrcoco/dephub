
                        <div class="row-fluid">
                            <?php echo $this->session->flashdata('msg'); ?>
                        </div>        			
			<h3>Daftar Buku <?php echo $category;?></h3>
			<?php if(count($books)<1){?>
			Data kosong
			<?php }
			else{?>
                        <table class="table table-condensed table-striped">
                            <thead>
                                <tr>
                                    <th width="65%">Nama Buku</th>
                                    <th width="35%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($books as $number => $n):?>
                                <tr>
                                    <td><?php echo $books[$number]['title'];?></td>
                                    <td>
                                        <a href="<?php echo site_url("elibrary/perpustakaan/view")."/".$books[$number]['id']?>" class="btn btn-mini"><i class="icon-edit"></i> Lihat</a>
                                        <a href="<?php echo site_url("elibrary/perpustakaan/edit_books")."/".$books[$number]['id']?>" class="btn btn-mini"><i class="icon-edit"></i> Ubah</a>
                                        <a href="<?php echo site_url("elibrary/perpustakaan/delete_books")."/".$books[$number]['id']?>" class="btn btn-danger btn-mini" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">
                                                <i class="icon-trash"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                         <p><?php echo $links;?></p>
			<?php }?>				



