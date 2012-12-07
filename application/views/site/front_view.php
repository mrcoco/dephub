<script type='text/javascript' src='assets/js/fullcalendar/fullcalendar.min.js'></script>
<script type="text/javascript" language="javascript" src="assets/js/swfobject.js"></script>
<div class="row"><div class="span9"><?php echo $this->session->flashdata('msg'); ?></div></div>
<ul class="nav nav-tabs">
    <li class="<?php if(!$active)echo 'active';?>"><a href="#pengumuman" data-toggle="tab">Pengumuman</a></li>
    <li class="<?php if($active)echo 'active';?>"><a href="#diklat" data-toggle="tab">Daftar Diklat</a></li>
</ul>

<div class="tab-content">
    <div class="tab-pane <?php if(!$active)echo 'active';?>" id="pengumuman">
        <?php foreach($data_post as $dp){?>
        <h4><?php echo $dp['judul'] ?></h4>
        <h5><small><?php echo $this->date->konversi5($dp['tanggal']).', '.$dp['waktu'] ?></small></h5>
        <?php echo $dp['isi']?>
        <hr />
        <?php } ?>
    </div>
    <div class="tab-pane <?php if($active)echo 'active';?>" id="diklat">
        <h4>Pilih tahun:</h4>
        <p>
        <?php foreach($thn_program as $th){ ?>
            <a href="<?php echo base_url()?>site/front/<?php echo $th['tahun_program'] ?>"><?php echo $th['tahun_program'] ?></a> | 
        <?php } ?>
        </p>
        <?php if($program){ ?>
                <table width="100%" class="table-striped table-condensed table">
                    <?php $this->lib_perencanaan->print_tree_table_pub($program)?>
                </table>
        <?php }else{?>
        Tidak ada data
        <?php } ?>
        <div class="form-actions">
            <a class="btn btn-primary" href="<?php echo base_url()?>site/kal_diklat">Lihat Kalender</a>
            <a class="btn btn-success" href="<?php echo base_url()?>site/print_jadwal/<?php echo $thn ?>">Cetak Jadwal</a>
        </div>
    </div>
</div>