
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

        			<h2><?php echo $status; //edit bibliography digital ?></h2>

                        <h3>Edit File</h3>

			<?php echo form_open_multipart('elibrary/admin/do_edit_bibliography');?>

			<table>

				<tr><td>Judul</td><td> : <input type="text" name="title" size="20" value="<?php echo $data[0]['title'];?>"/> </td></tr>
				<tr><td>Pengarang</td><td> : <input type="text" name="authorname" id="autocomplete" value="<?php echo $data[0]['authorname'];?>"/>
                                        </td></tr>
                                <tr><td>Kategori</td><td> : <select name="categoryname" > 
                                            <option value="<?php echo $data[0]['categoryname'];?>"><?php echo $data[0]['categoryname'];?> </option>
                                                <?php foreach ($category as $number =>$n):?>
                                                <option value="<?php echo $category[$number]['categoryname'];?>"><?php echo $category[$number]['categoryname'];?></option>
                                                <?php endforeach; ?>
                                             </select></td></tr>
                                <tr><td>Keterangan</td><td> : <textarea name="keterangan" cols="40" rows="6"/><?php echo $data[0]['keterangan'];?> </textarea> </td></tr>
                                <tr><td>Tags/keywords</td><td> : <textarea name="tags" cols="40" rows="6"/><?php echo $data[0]['tags'];?> </textarea> </td></tr>

				<input name="id" type="hidden" value="<?php echo $data[0]['id'];?>">
			</table>
                         
			<br /><br />

			<input type="submit" value="Kirim"  class="btn btn-primary"/>
                        <input type="button" class="btn" value="Cancel" onclick="history.go(-1)"/>
			</form>
        
     
   