<div id="display_dialog" class="modal hide modal-wide"></div>
<div class="row">
    <div class="span12"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
<form class="form-inline" action="unit/front/list_pendaftar" method="GET">
    Tahun Daftar : <?php echo form_dropdown('thn',$tahun, $thn) ?>
    Diklat : <?php echo form_dropdown('id_diklat',$diklat, $id_diklat) ?>
    <input type="submit" class="btn" value="Filter" >
</form>
<?php if($pendaftar){ ?>
<table width="100%" class="table table-bordered table-condensed">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIP</th>
            <th>Nama Diklat</th>
            <th>Tahun Daftar</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php for($i=0;$i<count($pendaftar);$i++){?>
        <tr>
            <td><?php echo $i+1?></td>
            <td>
                <!--<a href="javascript:view_detail(<?php echo $pendaftar[$i]['id'] ?>)" class="tip-right" title="Klik untuk detail">-->
                    <?php echo $pendaftar[$i]['nama']?>
                <!--</a>-->
            </td>
            <td><?php echo $pendaftar[$i]['nip']?></td>
            <td><?php echo $diklat[$pendaftar[$i]['id_diklat']]?></td>
            <td><?php echo $pendaftar[$i]['tahun_daftar']?></td>
            <td><?php echo $this->editor->status($pendaftar[$i]['status'])?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<?php }else{ ?>
Tidak ada pendaftar
<?php } ?>

