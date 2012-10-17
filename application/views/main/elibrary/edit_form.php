
        			<h2><?php echo $status ?></h2>
			<?php echo form_open_multipart('elibrary/edit/edit_bibliography');?>

			<table>
				<tr><td>Judul</td><td> : <input type="text" name="title" size="20" value="<?php echo $bibliography[0]['title'];?>"/> </td></tr>
				<tr><td>Pengarang</td><td> : <select name="authorname" > 
                                            <option value="<?php echo $bibliography[0]['authorname'];?>"> <?php echo $bibliography[0]['authorname'];?></option>
                                                <?php foreach ($author as $number =>$n):?>
                                                <option value="<?php echo $author[$number]['authorname'];?>"><?php echo $author[$number]['authorname'];?></option>
                                                <?php endforeach; ?>
                                                </select>
                                        </td></tr>
                                <tr><td>Kategori</td><td> : <select name="categoryname" > 
                                            <option value="<?php echo $bibliography[0]['categoryname'];?>"><?php echo $bibliography[0]['categoryname'];?> </option>
                                                <?php foreach ($category as $number =>$n):?>
                                                <option value="<?php echo $category[$number]['categoryname'];?>"><?php echo $category[$number]['categoryname'];?></option>
                                                <?php endforeach; ?>
                                             </select></td></tr>
                                <tr><td>Keterangan</td><td> : <textarea name="keterangan" cols="40" rows="6"/><?php echo $bibliography[0]['keterangan'];?> </textarea> </td></tr>
                                <tr><td>Tags</td><td> : <textarea name="tags" cols="40" rows="6"/><?php echo $bibliography[0]['tags'];?> </textarea> </td></tr>
				<input name="id" type="hidden" value="<?php echo $bibliography[0]['id'];?>">
                                <tr><td>Tags adalah keyword dari file tersebut</td></tr>
			</table>
                         
			<br /><br />

			<input type="submit" value="Kirim" />

			</form>
        
     
   