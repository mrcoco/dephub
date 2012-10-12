<div class="row">
    <div class="span12"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
<div class="row">
    <div class="span12">
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
                        <td><a href="perencanaan/diklat/detail_diklat/<?php echo $data['id'] ?>"><?php echo $data['name'] ?></a></td>
                        <td>
                            <div class="btn-toolbar" style="margin:0;">
                                <div class="btn-group">
                                    <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Jadwal <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="penyelenggaraan/schedule/<?php echo $data['id'] ?>">Lihat Jadwal</a></li>
                                        <li><a href="penyelenggaraan/schedule/buat_schedule/<?php echo $data['id'] ?>">Edit Jadwal</a></li>
                                    </ul>
                                </div>
                                <div class="btn-group">
                                    <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Peserta <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="penyelenggaraan/peserta/list_peserta/<?php echo $data['id'] ?>">Daftar Hadir Peserta</a></li>
                                        <li><a href="penyelenggaraan/peserta/list_peserta/<?php echo $data['id'] ?>">Rekap Peserta</a></li>
                                        <li><a href="penyelenggaraan/peserta/list_peserta/<?php echo $data['id'] ?>">Terima Peserta</a></li>
                                    </ul>
                                </div>
                                <div class="btn-group">
                                    <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Pembicara <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="penyelenggaraan/pembicara/<?php echo $data['id'] ?>">Daftar Hadir Pembicara</a></li>
                                        <li><a href="penyelenggaraan/pembicara/<?php echo $data['id'] ?>">Rekap Pembicara</a></li>
                                        <li><a href="penyelenggaraan/pembicara//<?php echo $data['id'] ?>">Honor Pembicara</a></li>
                                    </ul>
                                </div>
                                <div class="btn-group">
                                    <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Evaluasi <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="perencanaan/feedback/form_feedback_sarpras/<?php echo $data['id'] ?>">Feedback</a></li>
                                        <li><a href="perencanaan/evaluasi/<?php echo $data['id'] ?>">Evaluasi</a></li>
                                    </ul>
                                </div>
                            </div>
                        </td>
                    <?php } ?>
            </tbody>
        </table>
    </div>
</div>