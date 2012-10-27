
                        <div class="row-fluid">
                            <?php echo $this->session->flashdata('msg'); ?>
                        </div>        			
			<h3>Daftar File</h3>
			<?php if(count($bibliography)<1){?>
			Data kosong
			<?php }
			else{?>
                        <table class="table table-condensed table-striped">
                            <thead>
                                <tr>
                                    <th width="75%">Nama file</th>
                                    <th width="25%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($bibliography as $number => $n):?>
                                <tr>
                                    <td><a href="<?php echo $bibliography[$number]['location'];?>"><?php echo $bibliography[$number]['title'];?></a></td>
                                    <td>
                                        <a href="<?php echo site_url("elibrary/digital/edit_bibliography")."/".$bibliography[$number]['id']?>" class="btn btn-mini"><i class="icon-edit"></i> Ubah</a>
                                        <a href="<?php echo site_url("elibrary/digital/delete_bibliography")."/".$bibliography[$number]['id']?>" class="btn btn-danger btn-mini" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">
                                                <i class="icon-trash"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                         
			<?php }?>				



