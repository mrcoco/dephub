<div class="row">
    <div class="span12">
	<h4>Check List Prasarana Kamar Asrama</h4>
	<?php echo form_open('sarpras/asrama/filter');?>
	<div class="span2">
	    <label>Asrama </label>
	    <select name="asrama" class="input-small">
		<option value="A" <?php echo $this->editor->a_selected('A');?> >A</option>
		<option value="B" <?php echo $this->editor->a_selected('B');?> >B</option>
	    </select>
	</div>
	<div class="span2">
	    <label>Tahun </label>
	    <select name="tahun" class="input-small">
		<?php echo $option_tahun;?>
	    </select>
	</div>
	<div class="span2">
	    <label>Bulan </label>
	    <select name="bulan" class="input-small"">
		<option value="1" <?php echo $this->editor->m_selected(1)?>>Januari</option>
		<option value="2" <?php echo $this->editor->m_selected(2)?>>Februari</option>
		<option value="3" <?php echo $this->editor->m_selected(3)?>>Maret</option>
		<option value="4" <?php echo $this->editor->m_selected(4)?>>April</option>
		<option value="5" <?php echo $this->editor->m_selected(5)?>>Mei</option>
		<option value="6" <?php echo $this->editor->m_selected(6)?>>Juni</option>
		<option value="7" <?php echo $this->editor->m_selected(7)?>>Juli</option>
		<option value="8" <?php echo $this->editor->m_selected(8)?>>Agustus</option>
		<option value="9" <?php echo $this->editor->m_selected(9)?>>September</option>
		<option value="10" <?php echo $this->editor->m_selected(10)?>>Oktober</option>
		<option value="11" <?php echo $this->editor->m_selected(11)?>>November</option>
		<option value="12" <?php echo $this->editor->m_selected(12)?>>Desember</option>
	    </select>
	</div>
	<div class="span2">
	    <label>Minggu </label>
	    <select name="minggu" class="input-small">
		<option value="1" <?php echo $this->editor->w_selected(1)?>>1</option>
		<option value="2" <?php echo $this->editor->w_selected(2)?>>2</option>
		<option value="3" <?php echo $this->editor->w_selected(3)?>>3</option>
		<option value="4" <?php echo $this->editor->w_selected(4)?>>4</option>
	    </select>
	</div>
	<div class="span2">
	    <label>&nbsp;</label>
	    <input type="submit" value="Filter" name="submit" class="btn btn-primary" />
	</div>
	<?php echo form_close();?>
	<?php echo $table_asrama;?>
	<div align="center"><?php echo $pagination;?></div>
    </div>
</div>