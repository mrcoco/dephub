
                        <div class="row-fluid">
                            <?php echo $this->session->flashdata('msg'); ?>
                        </div>        			
			<h3>Daftar Buku</h3>
			<?php if(count($data)<1){?>
			Data kosong
			<?php }
			else{?>
                        <table class="table table-condensed table-striped">
                            <thead>
                                <tr>
                                    <th width="40%">Nama file</th>
                                    <th>Pengarang</th>
                                    <th width="25%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($data as $number => $n):?>
                                <tr>
                                    <td><?php echo $data[$number]['title'];?></td>
                                    <td>
					<?php echo $data[$number]['authorname'];?>
                                    </td>
                                    <td>
                                        <a href="<?php echo site_url("elibrary/perpustakaan/view")."/".$data[$number]['id']?>" class="btn btn-mini"><i class="icon-edit"></i> Lihat</a>
                                        
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                         <p><?php echo $links;?></p>
			<?php }?>				



