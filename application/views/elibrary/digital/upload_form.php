
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
		minLength: 2
		});
	});
});
</script>
                        <div class="row-fluid">
                            <?php echo $this->session->flashdata('msg'); ?>
                        </div>   
        		<h3>Upload File</h3>	
			<?php echo form_open_multipart('elibrary/digital/do_upload');?>
			<table class="table table-hover">
				<tr><td>File </td><td> : <input type="file" name="userfile" size="20" /> </td></tr>

				<tr><td>Pengarang</td><td>: <input type="text" name="authorname" id="autocomplete"/></td></tr>
                                <tr><td>Kategori</td><td> : <select name="categoryname" > 
                                            
                                                <?php foreach ($category as $number =>$n):?>
                                                <option value="<?php echo $category[$number]['categoryname'];?>"><?php echo $category[$number]['categoryname'];?></option>
                                                <?php endforeach; ?>
                                             </select></td></tr>
                                <tr><td>Keterangan</td><td> : <textarea name="keterangan" cols="40" rows="6"/></textarea> </td></tr>
                                <tr><td>Tags/keywords</td><td> : <textarea name="tags" cols="40" rows="6"/> </textarea> </td></tr>
				
				
				

			</table>

			<br /><br />

			<input type="submit" value="Upload" class="btn btn-primary" />

			</form>
        
     
   