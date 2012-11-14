<script>
    function validate_form(){
        var container=$('.alert');
        container.html('');
        
        if(document.form_reg.elements["id"].value=="")
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
    if($sub_title=='Tambah Kamar')
        echo "sarpras/kamar/add_kamar_process"; 
    else
        echo "sarpras/kamar/edit_kamar_process/".$kamar['id']; 
    ?>
      " method="POST">
    <div id="wrap_form">
    </div>
    <table class="table table-condensed">
        <thead>
            <tr>
                <th colspan="2">Penambahan kamar</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <!--
			<tr>
            <td>ID</td>
            <td><input class="id" type="text" name="id" placeholder="ID" value="<?php echo $kamar['id'];?>" 
			<?php 
				//if($kamar['id']!="")
					//echo "readonly";
			?>
			/></td>
            </tr>
			-->
            <tr>
            <td>Nomor Kamar</td>
            <td><input class="nama" type="text" name="nama" placeholder="Nomor Kamar" value="<?php echo $kamar['nama_kamar'];?>"/></td>
            </tr>
            <tr>
            <td>Asrama</td>
            <td>
                <?php
                $var = $this->mdl_sarpras->get_gedung()->result_array();
                //var_dump($kamar);
                echo "<select name=\"asrama\">";
                foreach ($var as $row)
                {
                    echo "<option value=".$row['id']." ";
                    if($row['nama']==$kamar['gedung'])
                        echo " selected";
                    echo " >".$row['nama']."</option>";
                }
                echo "</select>";
                ?>
            </td>
            </tr>
            <tr>
            <td>Lantai</td>
            <td><input class="lantai" type="text" name="lantai" placeholder="Lantai" value="<?php echo $kamar['lantai'];?>"/></td>
            </tr>
            <tr>
            <td>Sayap</td>
            <td>
                <select name="sayap">
                    <option value="Kanan"
                            <?php
                                if($kamar['sayap']=="Kanan")
                                    echo " selected";
                            ?>
                    >kanan</option>
                    <option value="Kiri"
                            <?php
                                if($kamar['sayap']=="Kiri")
                                    echo " selected";
                            ?>
                    >kiri</option>
                </select>
            </td>
            </tr>
            <tr>
            <td>Nomor</td>
            <td><input class="nomor" type="text" name="nomor" placeholder="Nomor" value="<?php echo $kamar['nomor'];?>"/></td>
            </tr>
            <tr>
            <td>Bed</td>
            <td><input class="bed" type="text" name="bed" placeholder="Bed" value="<?php echo $kamar['bed'];?>"/></td>
            </tr>
            <tr>
            <td>Status</td>
            <td>
			<?php
                $var = $this->mdl_sarpras->get_kamar_status()->result_array();
                //var_dump($kamar);
                echo "<select name=\"status\">";
                foreach ($var as $row)
                {
                    echo "<option value=".$row['id']." ";
                    if($row['status']==$kamar['status'])
                        echo " selected";
                    echo " >".$row['status']."</option>";
                }
                echo "</select>";
            ?>
            </td>
			</tr>
            
            
        </tr>
        </tbody>
    </table>
    <div class="form-actions">
        <input type="button" class="btn btn-large btn-primary pull-right"      
    <?php 
    if($sub_title=='Tambah Kamar')
        echo "value=\"Daftar\" onclick=\"validate_form()\""; 
    else
        echo "value=\"Edit\" onclick=\"validate_form()\"";
            //onclick=\"validate_form()"; 
    ?>  
      />
    </div>
</form>