
                        <div class="row-fluid">
                            <?php echo $this->session->flashdata('msg'); ?>
                        </div>        			
			<h3>Daftar Pinjaman </h3>
			<?php if(count($loan)<1){?>
			Data kosong
			<?php }
			else{?>
                        <table class="table table-condensed table-striped">
                            <thead>
                                <tr>
                                    <th >No Peminjaman</th>
                                    <th >Peminjam</th>
                                    <th>NIP</th>
                                    <th>Buku</th>
                                    <th>Tanggal</th>
                                    <th>Sampai</th>
                                    <th>Kembali</th>
                                    <th>aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($loan as $number => $n):?>
                                <tr>
                                    <td><?php echo $loan[$number]['id'];?></td>
                                    <td><?php echo $loan[$number]['idpegawai'];?></td>
                                    <td>NIP <?php echo $loan[$number]['idpegawai'];?></td>
                                    <td><?php echo $loan[$number]['booksid'];?></td>
                                    <td><?php echo $loan[$number]['loandate'];?></td>
                                    <td><?php echo $loan[$number]['duedate'];?></td>
                                    <td><?php if($loan[$number]['returndate']!='0000-00-00') echo $loan[$number]['returndate']; else echo 'Belum'?></td>
                                    <td><a href='<?php echo site_url()."elibrary/admin/kembali/".$loan[$number]['id'];?>' class='btn'>Buku kembali</a></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                         <p><?php echo $links;?></p>
			<?php }?>				
