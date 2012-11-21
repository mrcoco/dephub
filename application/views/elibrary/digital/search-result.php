
    <?php echo form_open_multipart('elibrary/digital/search/');?>
    <div class="input-append">
        <input type="text" name="search" placeholder="Cari file..." style="width: 60%;height: 30px;font-size: 1.4em;"/><button class="btn btn-primary btn-large" type="submit">Search</button>
    </div>
    </form>
        		
                        <div class="row-fluid">
                            <?php echo $this->session->flashdata('msg'); ?>
                        </div>   	
			<h3>Hasil Pencarian File Digital</h3>
			<?php if(count($data)<1){?>
			Tidak ada file yang sesuai.
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
                                    <td>
					<?php echo $data[$number]['title'];?>
                                    </td>
                                    <td>
					<?php echo $data[$number]['authorname'];?>
                                    </td>
                                    <td>
                                        <a class="btn btn-mini" href="<?php echo site_url("elibrary/digital/view")."/".$data[$number]['id']?>">Buka</a>
                                        
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php echo $links?>
			<?php }?>
				<h3>Hasil Pencarian Buku Fisik</h3>
			<?php if(count($data2)<1){?>
			Tidak ada Buku yang sesuai.
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
                            <?php foreach ($data2 as $number => $n):?>
                                <tr>
                                    <td>
					<?php echo $n['title'];?>
                                    </td>
                                    <td>
					<?php echo $n['authorname'];?>
                                    </td>
                                    <td>
                                        <a class="btn btn-mini" href="<?php echo site_url("elibrary/perpustakaan/view")."/".$n['id']?>">Buka</a>
                                        
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php echo $links2?>
			<?php }?>



