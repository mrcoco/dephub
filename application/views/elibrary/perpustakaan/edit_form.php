
<script type="text/javascript">
$(document).ready(function() {
	$(function() {
		$( "#autocomplete" ).autocomplete({
			source: function(request, response) {
				$.ajax({ url: "<?php echo site_url('elibrary/digital/autocomplete'); ?>",
				data: { term: $("#autocomplete").val()},
				dataType: "json",
				type: "POST",
				success: function(data){
					response(data);
				}
			});
		},
		minLength: 3
		});
	});
});
</script>
                        <div class="row-fluid">
                            <?php echo $this->session->flashdata('msg'); ?>
                        </div>   
        		<h3>Edit Buku</h3>	
			<?php echo form_open_multipart('elibrary/admin/do_edit_books');?>
			<table class="table table-hover">
				<tr><td>Judul Buku</td><td> : <input type="text" name="title" size="20" value="<?php echo $data[0]['title'];?>"/> </td></tr>

				<tr><td>Pengarang</td><td> : <input type="text" name="authorname" id="autocomplete" value="<?php echo $data[0]['authorname'];?>"></td></tr>
                                <tr><td>Kategori</td><td> : <select name="categoryname" > 
                                                <option value="<?php echo $data[0]['categoryname'];?>"><?php echo $data[0]['categoryname'];?> </option>
                                                <?php foreach ($category as $number =>$n):?>
                                                <option value="<?php echo $category[$number]['categoryname'];?>"><?php echo $category[$number]['categoryname'];?></option>
                                                <?php endforeach; ?>
                                             </select></td></tr>
                                <tr><td>Edisi</td><td> : <input name="edition" value="<?php echo $data[0]['edition'];?>"/> </td></tr>
                                <tr><td>Frekuensi terbit</td><td> : <select name="frequency" >
                                                                        <option selected="<?php if($data[0]['frequency']==0) echo 'selected'?>" value="0">Terbit sekali</option>
                                                                        <option selected="<?php if($data[0]['frequency']==1) echo 'selected'?>" value="1">Harian</option>
                                                                        <option selected="<?php if($data[0]['frequency']==2) echo 'selected'?>" value="2">Mingguan</option>
                                                                        <option selected="<?php if($data[0]['frequency']==3) echo 'selected'?>" value="3">Bulanan</option>
                                                                        <option selected="<?php if($data[0]['frequency']==4) echo 'selected'?>" value="4">Per 2 bulan</option>
                                                                        <option selected="<?php if($data[0]['frequency']==5) echo 'selected'?>" value="5">per 3 bulan</option>
                                                                        <option selected="<?php if($data[0]['frequency']==6) echo 'selected'?>" value="6">per 4 bulan</option>
                                                                        <option selected="<?php if($data[0]['frequency']==7) echo 'selected'?>" value="7">per 6 bulan</option>
                                                                        <option selected="<?php if($data[0]['frequency']==8) echo 'selected'?>" value="8">per tahun</option>
                                                                      </select> </td></tr>
                                <tr><td>ISSN/ISBN</td><td> : <input name="issnisbn" value="<?php echo $data[0]['issnisbn'];?>"/> </td></tr>
                                <tr><td>Penerbit</td><td> : <input name="publisher" value="<?php echo $data[0]['publisher'];?>"/> </td></tr>
                                <tr><td>Tempat Terbit</td><td> : <input name="publisherplace" value="<?php echo $data[0]['publisherplace'];?>"/> </td></tr>
                                <tr><td>Persediaan buku</td><td> : <input name="stock" value="<?php echo $data[0]['stock'];?>"/></td></tr>
                                <tr><td>Ada digital</td><td> : <input name="digital" value="<?php echo $data[0]['digital'];?>"/></textarea> </td></tr>
                                <tr><td>Keterangan</td><td> : <textarea name="keterangan" value="<?php echo $data[0]['keterangan'];?>" /> </td></tr>
                                <tr><td>Tags</td><td> : <textarea name="tags" value="<?php echo $data[0]['tags'];?>"/> </td></tr>
				<input name="id" type="hidden" value="<?php echo $data[0]['id'];?>">
                                <tr><td>Tags adalah keyword dari buku tersebut</td></tr>
				
				

			</table>

			<br /><br />

			<input type="submit" value="Tambahkan" class="btn btn-primary" />
                        <input type="button" class="btn" value="Cancel" onclick="history.go(-1)"/>
			</form>
        
     
   