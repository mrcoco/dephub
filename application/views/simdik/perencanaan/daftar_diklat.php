<div class="row">
    <div class="span12"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
<div class="row">
    <div class="span8">
        <div>
            <h3>DIKLAT PRAJABATAN</h3>
            <div class="accordion">
                <?php
                $kiri = '<div class="accordion-group"><div class="accordion-heading"><h4>';
                $kanan = '</h4></div></div>';
                $kelas = 'accordion-toggle';
                $this->lib_perencanaan->print_child($program, 1, $kiri, $kanan, $kelas)
                ?>
            </div>
            <h3>DIKLAT DALAM JABATAN</h3>
            <div class="accordion" id="accordion1">
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse1a">
                            <h4>Diklat Kepemimpinan</h4>
                        </a>
                    </div>
                    <div id="collapse1a" class="accordion-body">
                        <div class="accordion-inner">
                            <ul>
                                <?php $this->lib_perencanaan->print_child($program, 4, '<li>', '</li>', '') ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse1b">
                            <h4>Diklat Fungsional</h4>
                        </a>
                    </div>
                    <div id="collapse1b" class="accordion-body">

                        <div class="accordion-inner">
                            <div class="accordion" id="accordion2b">
                                <div class="">
                                    <div class="">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2b" href="#collapseOneb">
                                            Diklat Fungsional Keahlian
                                        </a>
                                    </div>
                                    <div id="collapseOneb" class="accordion-body">
                                        <div class="">
                                            <ul>
                                                <?php $this->lib_perencanaan->print_child($program, 8, '<li>', '</li>', '') ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2b" href="#collapseTwob">
                                            Diklat Tehnis Fungsional
                                        </a>
                                    </div>
                                    <div id="collapseTwob" class="accordion-body">
                                        <div class="">
                                            <ul>
                                                <?php $this->lib_perencanaan->print_child($program, 9, '<li>', '</li>', '') ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h3>DIKLAT TEKNIS</h3>
            <div class="accordion" id="accordion3">
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapse3a">
                            <h4>Diklat Teknis Umum</h4>
                        </a>
                    </div>
                    <div id="collapse3a" class="accordion-body">
                        <div class="accordion-inner">
                            <ul>
                                <?php $this->lib_perencanaan->print_child($program, 6, '<li>', '</li>', '') ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-group">
                    <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapse3b">
                            <h4>Diklat Teknis Manajemen</h4>
                        </a>
                    </div>
                    <div id="collapse3b" class="accordion-body">
                        <div class="accordion-inner">
                            <ul>
                                <?php $this->lib_perencanaan->print_child($program, 7, '<li>', '</li>', '') ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <a href="perencanaan/diklat/buat_diklat" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Tambah</a>
            <a href="perencanaan/diklat/cetak_jadwal/<?php echo $thn?>" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Cetak Jadwal</a>
        </div>
    </div>
    <div class="span4 hide">
        <div class="well" style="padding: 8px 0;">
            <ul class="nav-list nav">
                <li class="nav-header">Overview</li>
                <li><?php echo $program['0']['name'] ?></li>
                <li class="nav-header">Tahun</li>
                <li><?php echo $this->lib_perencanaan->overview($program,16,'tahun_program') ?></li>
                <li class="nav-header">Kategori</li>
                <li><?php echo $pil_kategori[$this->lib_perencanaan->overview($program,16,'parent')] ?></li>
                <li class="nav-header">Deskripsi</li>
                <li><?php echo $this->lib_perencanaan->overview($program,16,'deskripsi') ?></li>
            </ul>
        </div>
    </div>
</div>