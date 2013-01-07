<div class="row">
    <div class="span12"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
<table id="list" width="100%" class="table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <td>No</td>
            <td>Nama</td>
            <td>NIP</td>
            <td>Role</td>
            <td>Aksi</td>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1 ?>
        <?php foreach($list as $l){ ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $l['nama'] ?></td>
            <td><?php echo $l['nip'] ?></td>
            <td><?php echo ucfirst($role[$l['id_role']]) ?></td>
            <td><a href="user/delete_user/<?php echo $l['id']?>"  class="btn btn-danger btn-mini"
                onclick="return confirm('Apakah Anda yakin ingin menghapus role <?php echo $l['nama'] ?> sebagai <?php echo $role[$l['id_role']] ?>?')">
                        <i class="icon-trash"></i> Hapus Role</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<div class="form-actions">
    <a href="<?php echo base_url() ?>user/manage_user" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Kelola User</a>
</div>
