<script>
    function validate_form(){
        var container=$('.alert');
        container.html('');
        
		
        if(document.form_reg.elements["item"].value=="")
        {
            container.show('blind');
            container.append('Isikan kolom nama item secara lengkap<br />');
        }
        else
        {
            document.form_reg.submit();
        }
    }
    
</script>
<div class="alert alert-error fade in none"></div>
<!-- Contoh buat di clone -->

<!-- Selesai Contoh-->
<div id="display_dialog" class="modal hide"></div>

<form name="form_reg" id="form_reg" action="
    <?php 
    if($type =='add')
        echo "kamar_item/add_kamar_item_process"; 
    else
        echo "kamar_item/edit_kamar_item_process/".$item['id']; 
    ?>
      " method="POST">
    <div id="wrap_form">
    </div>
    <table class="table table-condensed">
        <thead>
            <tr>
                <th colspan="2">
				<?php 
				if($type=='add')
					echo "Penambahan item kamar"; 
				else
					echo "Edit item kamar"; 
				?>
				</th>
				<input class="id" type="hidden" name="id" placeholder="ID" value="<?php echo $item['id'];?>"/>
            </tr>
        </thead>
        <tbody>
        <tr>
            <tr>
            <td>Item</td>
            <td><input class="item" type="text" name="item" placeholder="Nama item" value="<?php echo $item['item'];?>"/></td>
            </tr>
            <tr>
            <td>Kategori</td>
            <td>
				<select name="kategori">
					<option value="" <?php if($item['kategori']) echo "selected"?>>--pilih--</option>
					<option value="lampu" <?php if($item['kategori']) echo "selected"?>>Lampu</option>
					<option value="toilet" <?php if($item['kategori']) echo "selected"?>>Toilet</option>
					<option value="ac" <?php if($item['kategori']) echo "selected"?>>ac</option>
				</select>
			</td>
            </tr>
            <tr>
            <td>Bobot</td>
            <td><input class="bobot input-mini" type="text" name="bobot" placeholder="Bobot" value="<?php echo $item['bobot'];?>"/></td>
            </tr>
            <tr>
            <td>Status</td>
            <td><input class="status input-mini" type="text" name="status" placeholder="Status" value="<?php echo $item['status'];?>"/></td>
            </tr>
            
        </tr>
        </tbody>
    </table>
    <div class="form-actions">
        <input type="button" class="btn btn-primary" value="Simpan" onclick="validate_form()" />
        <input type="button" class="btn" value="Cancel" onclick="history.go(-1)">
    </div>
</form>