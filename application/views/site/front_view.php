<script type='text/javascript' src='assets/js/fullcalendar/fullcalendar.min.js'></script>
<script type="text/javascript" language="javascript" src="assets/js/swfobject.js"></script>
<script>
    function read(id){
        $('#post'+id).slideDown('300');
        $('#btn'+id).text('Tutup').attr('href','javascript:close('+id+')');
    }
    function close(id){
        $('#post'+id).slideUp('300');
        $('#btn'+id).text('Selengkapnya').attr('href','javascript:read('+id+')');
    }

    $(document).ready(function() {
           saring(1);
        $('#cari').keyup(function(){
           saring(1);
        });
        $('#filter_btn').click(function(){
           saring(1);
        });
    });
    function saring(page){
        $('#body_table').empty();
        $('#body_table').append('<center>Loading... <img src="<?php echo base_url()?>assets/img/spinner.gif"/></center>');
        var cari=$('#cari').val(); 
        var diklat=$('#filter_diklat').val(); 
        var ang=$('#filter_ang').val(); 
        var thn=$('#filter_thn').val();
        if(cari!=''){
            $.get('<?php echo base_url()?>site/ajax_filter_alumni/'+page+'?cari='+cari+'&diklat='+diklat+'&ang='+ang+'&thn='+thn, function(result){
                $('#body_table').html(result);
            });
        }else{
            $.get('<?php echo base_url()?>site/ajax_filter_alumni/'+page+'?diklat='+diklat+'&ang='+ang+'&thn='+thn, function(result){
                $('#body_table').empty();
                $('#body_table').html(result);
            });
        }
    }
    
    
</script>

<div class="row"><div class="span9"><?php echo $this->session->flashdata('msg'); ?></div></div>
<ul class="nav nav-tabs">
    <li class="<?php if(!$active)echo 'active';?>"><a href="#pengumuman" data-toggle="tab">Pengumuman</a></li>
    <li class="<?php if($active)echo 'active';?>"><a href="#diklat" data-toggle="tab">Daftar Diklat</a></li>
    <li><a href="#alumni" data-toggle="tab">Daftar Alumni</a></li>
</ul>

<div class="tab-content">
    <div class="tab-pane <?php if(!$active)echo 'active';?>" id="pengumuman">
        <p class="lead">
            Berita dan Pengumuman
        </p>
        <?php foreach($data_post as $dp){?>
        <h4><?php echo $dp['judul'] ?></h4>
        <h5><small><?php echo $this->date->konversi5($dp['tanggal']).', '.$dp['waktu'] ?></small></h5>
        <div id="post<?php echo $dp['id'] ?>" class="hide"><?php echo $dp['isi']?></div>
        <a id="btn<?php echo $dp['id'] ?>" href="javascript:read('<?php echo $dp['id'] ?>')" class="btn btn-mini">Selengkapnya</a>
        <hr />
        <?php } ?>
        <div>
            <ul class="pager">
                <li class="previous <?php if($num_post<$lim)echo 'disabled'; ?>">
                    <a <?php if($num_post>$lim)echo 'href="'.base_url().'site/news/'.$lim.'"'; ?>>&larr; Lebih lama</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="tab-pane <?php if($active)echo 'active';?>" id="diklat">
        <div class="lead">
            Daftar Diklat dan Program Tahun <?php echo $thn ?>
            <div class="pull-right">
                <a class="btn btn-primary" href="<?php echo base_url()?>site/kal_diklat">Lihat Kalender</a>
                <a class="btn btn-success" href="<?php echo base_url()?>site/print_jadwal/<?php echo $thn ?>">Cetak Jadwal</a>
            </div>
        </div>
        <p>Pilih tahun: 
        <?php foreach($thn_program as $th){ ?>
            <a href="<?php echo base_url()?>site/front/<?php echo $th['tahun_program'] ?>"><?php echo $th['tahun_program'] ?></a> | 
        <?php } ?>
        </p>
        <?php $this->date->legend_status(); ?>
        <?php if($program){ ?>
                <table width="100%" class="table-striped table-condensed table">
                    <?php $this->lib_perencanaan->print_tree_table_pub($program)?>
                </table>
        <?php }else{?>
        Tidak ada data
        <?php } ?>
    </div>
    <div class="tab-pane" id="alumni">
        <div>
            
            <span class="input-prepend input-append">
            <input type="text" id="filter_diklat" placeholder="Masukkan Nama Diklat"/>
            <span class="add-on">Angkatan</span><input type="text" class="input-small" id="filter_ang" placeholder="Nomor"/>
            <input type="text" class="input-small" id="filter_thn" placeholder="Tahun"/>
            <button type="button" class="btn btn-primary" id="filter_btn"><i class="icon-filter icon-white"></i> Saring</button>
            </span>
        </div>
        <br />
        Cari: <input type="text" id="cari" placeholder="Masukkan nama/NIP"/>
        <div id="body_table"></div>
    </div>
</div>