<?php if ($this->uri->segment(3)=='info') {
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
            
    
            <?php foreach ($data as $number => $n):?>
                
            <tr> <td><?php if($n['status']==2)echo "<b>"?><a href="<?php echo base_url()."elibrary/digital/info_view/".$n['id']?>"><?php echo $n[$item];?> </a><?php if($n['status']==2)echo "</b>"?></td>
                    
            </tr>
            <?php endforeach; ?>

        </table>
        <hr />
        
<p><?php echo $links; ?></p>


