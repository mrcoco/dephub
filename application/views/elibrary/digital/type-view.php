
                        <div class="row-fluid">
                            <?php echo $this->session->flashdata('msg'); ?>
                        </div>        			
    <?php echo form_open_multipart('elibrary/digital/search/');?>
    <div class="input-append">
        <input type="text" name="search" placeholder="Cari file..." style="width: 60%;height: 30px;font-size: 1.4em;"/><button class="btn btn-primary btn-large" type="submit">Search</button>
    </div>
    </form>
			
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
                                        <a class="btn btn-mini" href="<?php echo site_url("elibrary/digital/view")."/".$data[$number]['id']?>">Buka</a>
                                        
                                            
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                         <p><?php echo $links; ?></p>
			<?php }?>				



