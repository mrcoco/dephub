<?php if($diklat){ ?>
<table width="50%" class="table table-condensed table-striped">
    <tr>
        <th>Kategori</th>
        <th>Nama Diklat</th>
        <th>Kuota Peserta</th>
        <th>Aksi</th>
    </tr>
<?php foreach($diklat as $d){?>
<tr>
    <td><?php echo $kategori[$d['parent']] ?></td>
    <td>
        <a class="tip-right" title="Klik untuk registrasi" href="<?php echo base_url()?>unit/front/registrasi/<?php echo $d['id']?>">
            <?php echo $d['name']?>
        </a>
    </td>
    <td>
        <?php if($d['jumlah_peserta']){echo $d['jumlah_peserta'];?> orang
        <?php }else{ echo '-';} ?>
    </td>
    <td>
        <a class="btn btn-primary btn-mini" href="<?php echo base_url()?>unit/front/registrasi/<?php echo $d['id']?>">
            Registrasi
        </a>
        <a class="btn btn-mini" href="<?php echo base_url()?>site/view_diklat/<?php echo $d['id']?>">
            <i class="icon-zoom-in"></i> Detail
        </a>
    </td>
</tr>
<?php } ?>
</table>
<?php }else{ ?>
<p>Tidak ada diklat</p>
<?php } ?>