Daftar Diklat Tahun 
<div>
    DIKLAT PRAJABATAN
	<ol>
    <?php $this->lib_perencanaan->print_child($program,1) ?>
	</ol>
	</div>
<div>
    DIKLAT DALAM JABATAN
                            <div class="accordion" id="accordion1">
                                <div class="accordion-group">
                                    <div class="accordion-heading">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse1a">
                                            Diklat Kepemimpinan
                                        </a>
                                    </div>
                                    <div id="collapse1a" class="accordion-body collapse in">
                                        <div class="accordion-inner">
                                            <ol>
				<?php $this->lib_perencanaan->print_child($program,4) ?>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-group">
                                    <div class="accordion-heading">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse1b">
                                            Diklat Fungsional
                                        </a>
                                    </div>
                                    <div id="collapse1b" class="accordion-body collapse in">

                                        <div class="accordion-inner">
                                            <div class="accordion" id="accordion2b">
                                                <div class="accordion-group">
                                                    <div class="accordion-heading">
                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2b" href="#collapseOneb">
                                                            Diklat Fungsional Keahlian
                                                        </a>
                                                    </div>
                                                    <div id="collapseOneb" class="accordion-body collapse">
                                                        <div class="accordion-inner">
                                                            <ol>
				<?php $this->lib_perencanaan->print_child($program,8) ?>
                                                            </ol>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-group">
                                                    <div class="accordion-heading">
                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2b" href="#collapseTwob">
                                                            Diklat Tehnis Fungsional
                                                        </a>
                                                    </div>
                                                    <div id="collapseTwob" class="accordion-body collapse">
                                                        <div class="accordion-inner">
                                                            <ol>
				<?php $this->lib_perencanaan->print_child($program,9) ?>
                                                            </ol>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

<div>
    DIKLAT TEKNIS
                                            <div class="accordion" id="accordion3">
                                                <div class="accordion-group">
                                                    <div class="accordion-heading">
                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapse3a">
                                                            Diklat Teknis Umum
                                                        </a>
                                                    </div>
                                                    <div id="collapse3a" class="accordion-body collapse">
                                                        <div class="accordion-inner">
                                                            <ol>
				<?php $this->lib_perencanaan->print_child($program,6) ?>
                                                            </ol>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-group">
                                                    <div class="accordion-heading">
                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#collapse3b">
                                                            Diklat Teknis Manajemen
                                                        </a>
                                                    </div>
                                                    <div id="collapse3b" class="accordion-body collapse">
                                                        <div class="accordion-inner">
                                                            <ol>
				<?php $this->lib_perencanaan->print_child($program,7) ?>
                                                            </ol>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
</div>

<a href="perencanaan/dashboard/buat_diklat">Buat Diklat</a>
