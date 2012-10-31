
    <?php echo form_open_multipart('elibrary/digital/search/');?>
    <div class="input-append">
        <input type="text" name="search" placeholder="Cari file..." style="width: 60%;height: 30px;font-size: 1.4em;"/><button class="btn btn-primary btn-large" type="button">Search</button>
    </div>
    </form>
        			
			<h3>Hasil Pencarian</h3>
			<?php if(count($bibliography)<1){?>
			Tidak ada file yang sesuai.
			<?php }
			else{?>
                        <table class="table table-condensed table-striped">
                            <thead>
                                <tr>
                                    <th width="65%">Nama file</th>
                                    <th width="35%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($bibliography as $number => $n):?>
                                <tr>
                                    <td>
										<a href="<?php echo site_url("elibrary/digital/view")."/".$bibliography[$number]['id']?>">
											<?php echo $bibliography[$number]['title'];?>
										</a>
									</td>
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
				



