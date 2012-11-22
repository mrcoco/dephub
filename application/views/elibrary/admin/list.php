<?php if ($this->uri->segment(3)=='list_post') {
    $item='title';
    $id='id';
    $edit='elibrary/admin/edit_post/';
    $delete='elibrary/admin/';
    $label="Judul";
}

?>
                        <div class="row-fluid">
                            <?php $this->session->flashdata('msg'); ?>
                        </div>  
        
        <table class="table table-condensed table-striped">
            <th width="50%"><?php echo $label;?></th>
            <th>Oleh</th>
            <th>Status</th>
            <th>Aksi</th>
    
            <?php foreach ($data as $number => $n):?>
                
                <tr> <td><?php echo $n[$item];?> </td>
                    <td><?php echo $n['nama'];?> </td>
                <td><?php switch($n['status']){ 
                    case 0:echo 'draft';break;
                    case 1:echo 'Terpublikasi';break;
                    case 2:echo 'Penting';break;
                    case 3:echo 'Dihapus';break;
                        }
            ?> </td>
                
                <td>                                        
                        <a href="<?php echo site_url().$edit.$n[$id];?>" class="btn btn-mini"><i class="icon-edit"></i> Ubah</a>
                </td>
            </tr>
            <?php endforeach; ?>

        </table>
        <hr />
        <p>Keterangan Status:</p> 
        <table>
        <tr><td>Draft</td> <td>: Belum dipublikasikan </td><tr/>
        <tr><td>Dipublikasi </td> <td>: Sudah Dipublikasikan dan akan tampil di halaman depan </td></tr>
        <tr><td>Penting </td> <td>: Info terakhir yang penting akan ditampilkan di halaman depan. </td></tr>
        <tr><td>Dihapus </td> <td>: Info menjadi arsip dan tidak bisa dilihat anggota biasa.</td></tr>
        </table>
<p><?php echo $links; ?></p>


