
                        <div class="row-fluid">
                            <?php echo $this->session->flashdata('msg'); ?>
                        </div>        			
    <?php echo form_open_multipart('elibrary/digital/search/');?>
    <div class="input-append">
        <input type="text" name="search" placeholder="Cari file..." style="width: 60%;height: 30px;font-size: 1.4em;"/><button class="btn btn-primary btn-large" type="submit">Search</button>
    </div>
    </form>
			<h3>Daftar File</h3>
			<?php if(count($bibliography)<1){?>
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
                            <?php foreach ($bibliography as $number => $n):?>
                                <tr>
                                    <td><?php echo $bibliography[$number]['title'];?></td>
                                    <td>
					<?php echo $bibliography[$number]['authorname'];?>
                                    </td>
                                    <td>
                                        <a class="btn btn-mini" href="<?php echo site_url("elibrary/digital/view")."/".$bibliography[$number]['id']?>">Buka</a>
                                        <a href="<?php echo site_url("elibrary/admin/edit_bibliography")."/".$bibliography[$number]['id']?>" class="btn btn-mini"><i class="icon-edit"></i> Ubah</a>
                                        <a href="<?php echo site_url("elibrary/admin/delete_bibliography")."/".$bibliography[$number]['id']?>" class="btn btn-danger btn-mini" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">
                                                <i class="icon-trash"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                         <p><?php echo $links; ?></p>
			<?php }?>				



