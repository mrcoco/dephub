<div class="row">
    <div class="span12"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
<div id="listContainer">
    <div class="listControl">
        <a id="expandList" class="klik"><i class="icon-plus"></i> Lihat semua</a>
        <a id="collapseList" class="klik"><i class="icon-minus"></i> Sembunyikan semua</a>
    </div>
        <?php $this->lib_perencanaan->print_tree_pub($program)?>
</div>
<script type="text/javascript" src="assets/js/expandlist.js"></script>