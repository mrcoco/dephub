<div class="row">
    <div class="span12"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
<?php $this->lib_perencanaan->print_tree_all($program)?>
<br/>
<br/>
<br/>
<a href="<?php echo base_url()?>perencanaan/diklat/cetak_jadwal">Cetak Jadwal</a>