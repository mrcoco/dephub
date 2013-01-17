
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

	<form name="form_reg" id="form_reg" action="kelas/edit_checklist_process/" method="POST">
	<input class="id" type="hidden" name="id" value="<?php echo $kelas['id'];?>"/>
<table width="100%" id="list" class="table table-striped table-condensed">
    <tbody>
        <tr>
            <td>Nama Kelas</td>
            <td><input class="nama" type="text" name="nama" placeholder="Nama" value="<?php echo $kelas['nama'];?>" readonly/></td>
		</tr>
		
        <tr>
            <td colspan="2"><div><strong>LCD Proyektor</strong></div></td>
		</tr>
        <tr>
            <td>Type</td>
            <td><input class="l1" type="text" name="l1" placeholder="Type" value="<?php echo $kelas['l1'];?>"/></td>
		</tr>
        <tr>
            <td>Kondisi</td>
            <td><input class="l2" type="text" name="l2" placeholder="Kondisi" value="<?php echo $kelas['l2'];?>"/></td>
		</tr>
        <tr>
            <td>Jumlah</td>
            <td><input class="l3" type="text" name="l3" placeholder="Jumlah" value="<?php echo $kelas['l3'];?>"/></td>
		</tr>
        <tr>
            <td>Lap Time</td>
            <td><input class="l4" type="text" name="l4" placeholder="Lap Time" value="<?php echo $kelas['l4'];?>"/></td>
		</tr>
		
        <tr>
            <td colspan="2"><div><strong>Sound System</strong></div></td>
		</tr>
        <tr>
            <td>Type</td>
            <td><input class="s1" type="text" name="s1" placeholder="Type" value="<?php echo $kelas['s1'];?>"/></td>
		</tr>
        <tr>
            <td>Kondisi</td>
            <td><input class="s2" type="text" name="s2" placeholder="Kondisi" value="<?php echo $kelas['s2'];?>"/></td>
		</tr>
		
        <tr>
            <td colspan="2"><div><strong>Meja</strong></div></td>
		</tr>
        <tr>
            <td>Type</td>
            <td><input class="m1" type="text" name="m1" placeholder="Type" value="<?php echo $kelas['m1'];?>"/></td>
		</tr>
        <tr>
            <td>Kondisi</td>
            <td><input class="m2" type="text" name="m2" placeholder="Kondisi" value="<?php echo $kelas['m2'];?>"/></td>
		</tr>
        <tr>
            <td>Jumlah</td>
            <td><input class="m3" type="text" name="m3" placeholder="Jumlah" value="<?php echo $kelas['m3'];?>"/></td>
		</tr>
		
        <tr>
            <td colspan="2"><div><strong>Kursi</strong></div></td>
		</tr>
        <tr>
            <td>Type</td>
            <td><input class="k1" type="text" name="k1" placeholder="Type" value="<?php echo $kelas['k1'];?>"/></td>
		</tr>
        <tr>
            <td>Kondisi</td>
            <td><input class="k2" type="text" name="k2" placeholder="Kondisi" value="<?php echo $kelas['k2'];?>"/></td>
		</tr>
        <tr>
            <td>Jumlah</td>
            <td><input class="k3" type="text" name="k3" placeholder="Jumlah" value="<?php echo $kelas['k3'];?>"/></td>
		</tr>
		
        <tr>
            <td colspan="2"><div><strong>Whiteboard</strong></div></td>
		</tr>
        <tr>
            <td>Kondisi</td>
            <td><input class="wb" type="text" name="wb" placeholder="Type" value="<?php echo $kelas['wb'];?>"/></td>
		</tr>
		
        <tr>
            <td colspan="2"><div><strong>Panaboard</strong></div></td>
		</tr>
        <tr>
            <td>Kondisi</td>
            <td><input class="pb" type="text" name="pb" placeholder="Type" value="<?php echo $kelas['pb'];?>"/></td>
		</tr>
		
        <tr>
            <td colspan="2"><div><strong>Flipchart</strong> </div></td>
		</tr>
        <tr>
            <td>Kondisi</td>
            <td><input class="fc" type="text" name="fc" placeholder="Type" value="<?php echo $kelas['fc'];?>"/></td>
		</tr>
        <tr>
            <td colspan="2"><div><strong>PC</strong> </div></td>
		</tr>
        <tr>
            <td>CPU</td>
            <td><input class="pc1" type="text" name="fc" placeholder="CPU" value="<?php echo $kelas['pc1'];?>"/></td>
		</tr>
        <tr>
            <td>Keyboard</td>
            <td><input class="pc2" type="text" name="fc" placeholder="Keyboard" value="<?php echo $kelas['pc2'];?>"/></td>
		</tr>
        <tr>
            <td>Mouse</td>
            <td><input class="pc3" type="text" name="fc" placeholder="Mouse" value="<?php echo $kelas['pc3'];?>"/></td>
		</tr>
        <tr>
            <td>Monitor</td>
            <td><input class="pc4" type="text" name="fc" placeholder="Monitor" value="<?php echo $kelas['pc4'];?>"/></td>
		</tr>
        <tr>
            <td>Jaringan</td>
            <td><input class="jar" type="text" name="fc" placeholder="Jaringan" value="<?php echo $kelas['jar'];?>"/></td>
		</tr>
        <tr>
            <td>AC</td>
            <td><input class="ac" type="text" name="fc" placeholder="AC" value="<?php echo $kelas['ac'];?>"/></td>
		</tr>
        <tr>
            <td colspan="2"><div><strong>Remote</strong> </div></td>
		</tr>
        <tr>
            <td>AC</td>
            <td><input class="remac" type="text" name="fc" placeholder="AC" value="<?php echo $kelas['remac'];?>"/></td>
		</tr>
        <tr>
            <td>LCD Proyektor</td>
            <td><input class="remlcd" type="text" name="fc" placeholder="LCD Proyektor" value="<?php echo $kelas['remlcd'];?>"/></td>
		</tr>
    </tbody>
</table>
    <div class="form-actions">
        <input type="button" class="btn btn-primary" value="Simpan" onclick="validate_form()"/>
        <input type="button" class="btn" value="Cancel" onclick="history.go(-1)">
    </div>
</form>
	