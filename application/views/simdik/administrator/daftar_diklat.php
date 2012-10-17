<div class="row">
    <div class="span12">
	    <!-- Program -->
	    <div class="well span1" align="center">
		<a href="perencanaan/diklat/buat_diklat" rel="tooltip" title="Klik untuk tambah diklat" class="tip">
		    <img src="assets/img/menu-icons/diklat.png" />
		</a>
		<strong>Tambah Diklat</strong>
	    </div>
	    <div class="well span1" align="center">
		<a href="penyelenggaraan/dosen_tamu/add_dosen" rel="tooltip" title="Klik untuk tambah dosen tamu" class="tip">
		    <img src="assets/img/menu-icons/widyaiswara.png" />
		</a>
		<strong>Tambah Dosen</strong>
	    </div>
	    <div class="well span1" align="center">
		<a href="penyelenggaraan/pembicara_int/add_pembicara" rel="tooltip" title="Klik untuk tambah pembicara internal" class="tip">
		    <img src="assets/img/menu-icons/widyaiswara.png" />
		</a>
		<strong>Tambah Pembicara</strong>
	    </div>
	    <div class="well span1" align="center">
		<a href="penyelenggaraan/peserta/registrasi" rel="tooltip" title="Klik untuk registrasi peserta" class="tip">
		    <img src="assets/img/menu-icons/peserta.png" />
		</a>
		<strong>Registrasi Peserta</strong>
	    </div>
	    <div class="well span1" align="center">
		<a href="penyelenggaraan/pegawai/tambah_pegawai" rel="tooltip" title="Klik untuk tambah pegawai" class="tip">
		    <img src="assets/img/menu-icons/users.png" />
		</a>
		<strong>Tambah Pegawai</strong>
	    </div>
	    <!-- Profile -->
    </div>
</div>
<div class="row">
    <div class="span12"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
<div class="row">
    <div class="span12">
        <h3>Daftar Diklat</h3>
        <?php if($program){?>
        <table width="100%" class="table table-striped table-condensed">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th width="30%">Nama Diklat</th>
                    <th width="70%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; foreach ($program as $data) { ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><a class="tip" rel="tooltip" title="Klik untuk melihat detail diklat" href="perencanaan/diklat/detail_diklat/<?php echo $data['id'] ?>"><?php echo $data['name'] ?></a></td>
                        <td>
                                <a class="btn btn-mini" href="perencanaan/diklat/edit_diklat/<?php echo $data['id'] ?>">Ubah diklat</a>
                                <a class="btn btn-mini" href="penyelenggaraan/schedule/buat_schedule/<?php echo $data['id'] ?>">Edit Jadwal</a>
                                <a class="btn btn-mini" href="penyelenggaraan/peserta/list_peserta/<?php echo $data['id'] ?>">Terima Peserta</a>
                                <a class="btn btn-mini" href="perencanaan/feedback/form_feedback_sarpras/<?php echo $data['id'] ?>">Feedback</a>
                        </td>
                    <?php } ?>

            </tbody>
        </table>
        <?php } else {?>
        Belum ada program yang dibuat
        <?php } ?>
    </div>
</div>