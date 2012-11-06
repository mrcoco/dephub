<div class="row">
    <div class="span12"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
<div class="row-fluid">
    <div class="span12">
        <?php $this->lib_perencanaan->print_tree_all($program)?>
    </div>
</div>