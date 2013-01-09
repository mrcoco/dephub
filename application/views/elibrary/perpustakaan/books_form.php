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
        		
			<?php echo form_open_multipart('elibrary/admin/do_input_books');?>
			<table class="table table-hover">
				<tr><td>Judul Buku</td><td> : <input type="text" name="title" size="20" required="required"/> </td></tr>

				<tr><td>Pengarang</td><td> : <input type="text" name="authorname" id="autocomplete" required="required"/></td></tr>
                                <tr><td>Kategori</td><td> : <select name="categoryname" required="required"> 
                                            
                                                <?php foreach ($category as $number =>$n):?>
                                                <option value="<?php echo $category[$number]['categoryname'];?>"><?php echo $category[$number]['categoryname'];?></option>
                                                <?php endforeach; ?>
                                             </select></td></tr>
                                <tr><td>Edisi</td><td> : <input type="text" required="required" name="edition" /> </td></tr>
                                <tr><td>Frekuensi terbit</td><td> : <select name="frequency">
                                                                        <option value="0">Terbit sekali</option>
                                                                        <option value="1">Harian</option>
                                                                        <option value="2">Mingguan</option>
                                                                        <option value="3">Bulanan</option>
                                                                        <option value="4">Per 2 bulan</option>
                                                                        <option value="5">per 3 bulan</option>
                                                                        <option value="6">per 4 bulan</option>
                                                                        <option value="7">per 6 bulan</option>
                                                                        <option value="8">per tahun</option>
                                                                      </select>
                                    </td></tr>
                                <tr><td>ISSN/ISBN</td><td> : <input type="text" required="required" name="issnisbn" /> </td></tr>
                                <tr><td>Penerbit</td><td> : <input type="text" name="publisher" required="required"> </td></tr>
                                <tr><td>Tempat Terbit</td><td> : <input type="text" name="publisherplace" required="required"/> </td></tr>
                                <tr><td>Persediaan buku</td><td> : <input type="text" name="stock" required="required"/> </td></tr>
                                <input type="hidden" name="digital"/>
                                <tr><td>Keterangan</td><td> : <textarea name="keterangan" cols="40" rows="3"/></textarea> </td></tr>
                                <tr><td>Tags</td><td> : <textarea name="tags" cols="40" rows="3"/> </textarea> </td></tr>
				
                                <tr><td>Tags adalah keyword dari buku tersebut</td></tr>
				
				

			</table>

			<br /><br />

			<input type="submit" value="Tambahkan" class="btn btn-primary" />
                        <input type="button" class="btn" value="Cancel" onclick="history.go(-1)"/>
			</form>
        
     
   