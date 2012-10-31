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

<form name="form_reg" id="form_reg" action="
    <?php 
    if($sub_title=='Tambah Gedung')
        echo "sarpras/gedung/add_gedung_process"; 
    else
        echo "sarpras/gedung/edit_gedung_process/".$gedung['id']; 
    ?>
      " method="POST">
    <div id="wrap_form">
    </div>
    <table class="table table-condensed">
        <thead>
            <tr>
                <th colspan="2">Penambahan Gedung</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Gedung ID</td>
                <td><input class="id" type="text" name="id" placeholder="Nama" value="<?php echo $gedung['id'];?>" readonly/></td>
            </tr>
        <tr>
            <td>Nama Gedung</td>
            <td><input class="nama" type="text" name="nama" placeholder="Nama" value="<?php echo $gedung['nama'];?>"/></td>
        </tr>
        </tbody>
    </table>
    <div class="form-actions">
        <input type="button" class="btn btn-large btn-primary pull-right"      
    <?php 
    if($sub_title=='Tambah Gedung')
        echo "value=\"Daftar\" onclick=\"validate_form()\""; 
    else
        echo "value=\"Edit\" onclick=\"validate_form()\"";
            //onclick=\"validate_form()"; 
    ?>  
      />
    </div>
</form>