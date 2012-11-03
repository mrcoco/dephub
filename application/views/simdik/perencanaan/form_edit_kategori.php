<form action="<?php echo base_url()?>perencanaan/diklat/insert_kategori" method="post">
    <table>
        <tr>
            <td>Parent</td>
            <td><?php echo form_dropdown('parent', $pil_kategori,$edit_kategori['parent'])?></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama" value="<?php echo $edit_kategori['name']?>"/></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Simpan kategori"/></td>
        </tr>
    </table>
</form>