<?php $t=$this->uri->segment(3);?>
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
<?php if($t=='list_pesan'){?>                       <th>aksi</th> <?php }?>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($queue as $number => $n):?>
                                <tr>
                                    <td><?php echo $queue[$number]['id'];?></td>
                                    <td><?php echo $queue[$number]['nama'];?></td>
                                    <td><?php echo $queue[$number]['nip'];?></td>
                                    <td><?php echo $queue[$number]['title'];?></td>
                                    <td><?php echo $queue[$number]['queuedate'];?></td>
                                    <td><?php switch ($queue[$number]['status']) {
                                                case 0: echo 'belum'; break;
                                                case 1: echo 'sedang'; break;
                                                case 2: echo 'sudah'; break;
                                                case 3: echo 'terlambat'; break;
                                                case 4: echo 'Dihapus'; break;}?></td>
                                    <?php if($t=='list_pesan'){?>
                                    <td>
<?php if($queue[$number]['status']==1) {?>   <a href='<?php echo site_url()."elibrary/admin/pinjam_dari_pesan/".$queue[$number]['id'];?>' class='btn'>Pinjamkan</a> <?php }?>
                                        <a href='<?php echo site_url()."elibrary/admin/hapus_pesan/".$queue[$number]['id'];?>' class='btn'>Hapus</a>
                                    </td>
                                    <?php }?>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                         <p><?php echo $links;?></p>
			<?php }?>				



