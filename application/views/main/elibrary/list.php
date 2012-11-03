<?php if ($this->uri->segment(3)=='list_category') {
    $item='categoryname';
}
else if ($this->uri->segment(3)=='list_author') {
    $item='authorname';
}
else if ($this->uri->segment(3)=='list_user') {
    $item='nama';
}
?>
                        <div class="row-fluid">
                            <?php echo $this->session->flashdata('msg'); ?>
                        </div>  
<?php foreach ($list as $number => $n):?>
<?php echo $list[$number][$item];?> <br />
<?php endforeach; ?>
<p><?php echo $links; ?></p>


