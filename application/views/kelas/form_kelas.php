
<script>
    function validate_form(){
        var container=$('.alert');
        container.html('');
        
        if(document.form_reg.elements["nama"].value=="")
        {
            container.show('blind');
            container.append('Isikan kolom nama secara lengkap<br />');
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

	<form name="form_reg" id="form_reg" action="<?php
	if($sub_title=="Tambah Kelas")
		echo "kelas/add_kelas_process/";
	else
		echo "kelas/edit_kelas_process/";
	?>" method="POST">
	
<table width="100%" class="table table-striped table-bordered table-condensed">
	<thead>
		<tr>
		<input class="id" type="hidden" name="id" value="<?php echo $kelas['id'];?>"/>
			<th>Edit Kelas</th>
		</tr>
	</thead>
    
    <tbody>
		
        <tr>
            <td>Nama Kelas</td>
            <td><input class="nama" type="text" name="nama" placeholder="Nama" value="<?php echo $kelas['nama'];?>"/></td>
		</tr>
		
        <tr>
            <td>Kapasitas</td>
            <td><input class="kapasitas" type="text" name="kapasitas" placeholder="Kapasitas" value="<?php echo $kelas['kapasitas'];?>"/></td>
		</tr>
        <tr>
            <td>Meja Kursi</td>
            <td><input class="mejakursi" type="text" name="mejakursi" placeholder="Meja Kursi" value="<?php echo $kelas['mejakursi'];?>"/></td>
		</tr>
        <tr>
            <td>Kondisi</td>
            <td><input class="kondisi" type="text" name="kondisi" placeholder="Kondisi" value="<?php echo $kelas['kondisi'];?>"/></td>
		</tr>
        <tr>
            <td>Keterangan</td>
            <td><input class="keterangan" type="text" name="keterangan" placeholder="Keterangan" value="<?php echo $kelas['keterangan'];?>"/></td>
		</tr>
		
    </tbody>
</table>
    <div class="form-actions">
        <input type="button" class="btn btn-large btn-primary pull-right" value="<?php
	if($sub_title=="Tambah Kelas")
		echo "Tambah";
	else
		echo "Edit";
	?>" onclick="validate_form()"/>
    </div>
</form>
	