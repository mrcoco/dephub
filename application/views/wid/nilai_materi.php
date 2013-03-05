    <p>
    <?php if(isset($tahun)){ ?>
        Pilih tahun : 
        <?php foreach($tahun as $t){ ?>
        <a href="<?php echo base_url('wid/nilai/index/'.$t) ?>"><?php echo $t ?></a> |
        <?php } ?>
    <?php } ?>
    </p>
<ul class="nav nav-tabs">
  <li class="active"><a href="#diklat" data-toggle="tab">Berdasarkan Diklat</a></li>
  <li><a href="#materi" data-toggle="tab">Berdasarkan Materi</a></li>
</ul>
<div class="tab-content">
  <div class="tab-pane active" id="diklat">
    <?php if($all_diklat){ ?>
    <?php foreach($all_diklat as $a){ ?>
    <?php if($program[$a['id_diklat']]){ ?>
    <?php foreach($program[$a['id_diklat']] as $pro){ ?>
    <h3><?php echo $a['name'] ?> Angkatan <?php echo $pro['angkatan']; ?> <small>
        <?php echo $this->date->konversi5($pro['tanggal_mulai']).' - '.$this->date->konversi5($pro['tanggal_akhir']) ?>
        </small></h3>
        <table class="table-striped table-condensed table">
            <?php foreach($a_materi[$a['id_diklat']] as $ma){ ?>
                    <tr>
                        <td width="200px"><?php echo $ma['judul'] ?></td>
                        <td>
                            <a class="btn btn-mini" href="wid/nilai/item_nilai/<?php echo $ma['id'] ?>">Unsur Penilaian</a>
                            <a class="btn btn-mini" href="wid/nilai/input_nilai/<?php echo $ma['id'] ?>">
                                Pengumpulan Nilai
                            </a>
                            <a class="btn btn-mini" href="wid/nilai/view_nilai/<?php echo $ma['id'] ?>">
                                Lihat Nilai
                            </a>
                        </td>
                    </tr>
                <?php } ?>
        </table>
                <?php }?>
            <?php } ?>
    <?php } ?>
    <?php }else{ ?>
        Anda belum ditugasi mengajar
    <?php } ?>
  </div>
  <div class="tab-pane" id="materi">
    <?php if($materi){ ?>
    <?php foreach($materi as $m){ ?>
    <h3><?php echo $m['judul'] ?> <small>(Total <?php echo $total_jam[$m['id']] ?> jam)</small></h3>
        <table class="table-striped table-condensed table">
            <?php foreach($diklat[$m['id']] as $d){ ?>
                <?php if($program[$d['id']]){ ?>
                <?php foreach($program[$d['id']] as $p){ ?>
                    <tr>
                        <td width="200px"><?php echo $d['name'] ?> Angkatan <?php echo $p['angkatan']; ?></td>
                        <td width="250px">
                            <?php echo $this->date->konversi5($p['tanggal_mulai']).' - '.$this->date->konversi5($p['tanggal_akhir']) ?>
                        </td>
                        <td>
                            <a class="btn btn-mini" href="wid/nilai/item_nilai/<?php echo $m['id'] ?>">Unsur Penilaian</a>
                            <a class="btn btn-mini" href="wid/nilai/input_nilai/<?php echo $m['id'] ?>">
                                Pengumpulan Nilai
                            </a>
                            <a class="btn btn-mini" href="wid/nilai/view_nilai/<?php echo $m['id'] ?>">
                                Lihat Nilai
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                <?php }?>
            <?php } ?>
        </table>
    <?php } ?>
    <?php }else{ ?>
        Anda tidak ditugasi memberikan materi
    <?php } ?>
  </div>
</div>
