
                        <div class="row-fluid">
                            <?php echo $this->session->flashdata('msg'); ?>
                        </div>        			
			<h3>Daftar Antrian</h3>
			<?php if(count($queue)<1){?>
			Data kosong
			<?php }
			else{?>
                        <table class="table table-condensed table-striped">
                            <thead>
                                <tr>
                                    <th >No antrian</th>
                                    <th >Peminjam</th>
                                    <th>NIP</th>
                                    <th>Buku</th>
                                    <th>Tanggal Antri</th>
                                    <th>Status</th>
                                    <th>aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($queue as $number => $n):?>
                                <tr>
                                    <td><?php echo $queue[$number]['id'];?></td>
                                    <td><?php echo $queue[$number]['idpegawai'];?></td>
                                    <td>NIP <?php echo $queue[$number]['idpegawai'];?></td>
                                    <td><?php echo $queue[$number]['booksid'];?></td>
                                    <td><?php echo $queue[$number]['queuedate'];?></td>
                                    <td>Belum</td>
                                    <td>
                                        <a href='<?php echo site_url()."elibrary/admin/kembali/".$queue[$number]['id'];?>' class='btn'>Pinjamkan</a>
                                        <a href='<?php echo site_url()."elibrary/admin/kembali/".$queue[$number]['id'];?>' class='btn'>Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                         <p><?php echo $links;?></p>
			<?php }?>				



