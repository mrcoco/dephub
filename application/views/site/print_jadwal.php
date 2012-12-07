<style>
    table{
        border: 1px #000 solid;
        border-left: 0;
    }
    a{
        color:#000 !important;
        text-decoration: none !important;
    }
    td, th{
        border-left: 1px #000 solid;
        border-top: 1px #000 solid;
    }
</style>
<h2 align="center">
    <?php echo $judul ?>
</h2>
        <?php if($program){ ?>
                <table width="100%" align="center" cellspacing="0" cellpadding="3">
                    <?php $this->lib_perencanaan->print_tree_table_pub($program)?>
                </table>
        <?php }else{?>
        Tidak ada data
        <?php } ?>