    <?php echo form_open_multipart('elibrary/digital/search/');?>
    <div class="input-append">
        <input type="text" name="search" placeholder="Cari file..." style="width: 60%;height: 30px;font-size: 1.4em;"/><button class="btn btn-primary btn-large" type="submit">Search</button>
    </div>
    </form>


        		
                        <div class="row-fluid">
                            <?php echo $this->session->flashdata('msg'); ?>
                        </div>   	

                        <h3>File</h3>

			

			<table class="table table-condensed table-striped">

				<tr><td width="20%">Judul</td><td> : <?php echo $data[0]['title'];?> </td></tr>
				<tr><td>Pengarang</td><td> : <?php echo $data[0]['authorname']; ?>          </td></tr>
                                <tr><td>Pengupload</td><td> : <?php echo $data[0]['nama']; ?>          </td></tr>
                                <tr><td>Di-upload tanggal</td><td> : <?php echo $data[0]['uploaddate'];?> </td></tr>
                                <tr><td>Kategori</td><td> : <?php echo $data[0]['categoryname'];?></td></tr>
                                <tr><td>Keterangan</td><td> : <?php echo $data[0]['keterangan'];?> </td></tr>
                                <tr><td>Tags/keywords</td><td> : <?php echo $data[0]['tags'];?>  </td></tr>
                                
			</table>
                         
                         <?php echo form_open_multipart('elibrary/digital/viewer');?>
                        
                         <button class="btn btn-info" type="submit" /> <i class="icon-zoom-in icon-white"> </i> Lihat</button>
                         
    <?php if ($this->session->userdata('is_login')) { $role=$this->session->userdata('elib_userrole');//ket 1?>
                         <a class="btn" href="<?php echo $data[0]['location'];?>"><i class="icon-download-alt"></i> Download File</a>
          <?php if($role==1){//ket3?>
                         <a href="<?php echo site_url("elibrary/admin/edit_bibliography")."/".$data[0]['id']?>" class="btn "><i class="icon-edit"></i> Ubah</a>
                                        <a href="<?php echo site_url("elibrary/admin/delete_bibliography")."/".$data[0]['id']?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">
                                            <i class="icon-trash"></i> Hapus
                                        </a>
          <?php }?>
                         <input name="id" type="hidden" value="<?php echo $data[0]['id'];?>" />
   <?php }?>
			</form>
