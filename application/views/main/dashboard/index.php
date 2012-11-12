<div class="row">
    <div class="span12"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
<div class="row-fluid">
    <div class="span12">
        <div id="listContainer">
            <div class="listControl">
                <p class="lead">Kategori Diklat
                    <small>
                        <a id="expandList" class="klik"><i class="icon-plus"></i> Lihat semua</a>
                        <a id="collapseList" class="klik"><i class="icon-minus"></i> Sembunyi semua</a>                        
                    </small>
                </p>
            </div>
                <?php $this->lib_perencanaan->print_tree_pub($program)?>
        </div>
        <script type="text/javascript" src="assets/js/expandlist.js"></script>
    </div>
</div>