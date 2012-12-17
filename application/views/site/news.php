<script>
    function read(id){
        $('#post'+id).slideDown('300');
        $('#btn'+id).text('Tutup').attr('href','javascript:close('+id+')');
    }
    function close(id){
        $('#post'+id).slideUp('300');
        $('#btn'+id).text('Selengkapnya').attr('href','javascript:read('+id+')');
    }
</script>
<div class="row"><div class="span9"><?php echo $this->session->flashdata('msg'); ?></div></div>
    <div>
        <?php foreach($data_post as $dp){?>
        <h4><?php echo $dp['judul'] ?></h4>
        <h5><small><?php echo $this->date->konversi5($dp['tanggal']).', '.$dp['waktu'] ?></small></h5>
        <div id="post<?php echo $dp['id'] ?>" class="hide"><?php echo $dp['isi']?></div>
        <a id="btn<?php echo $dp['id'] ?>" href="javascript:read('<?php echo $dp['id'] ?>')" class="btn btn-mini">Selengkapnya</a>
        <hr />
        <?php } ?>
    </div>
<div>
    <ul class="pager">
        <li class="previous <?php if(($offset+$lim)>=$num_post)echo 'disabled'; ?>">
            <a <?php if(($offset+$lim)<$num_post)echo 'href="'.base_url().'site/news/'.($offset+$lim).'"'; ?>>&larr; Lebih lama</a>
        </li>
        <li class="next <?php if(($offset-$lim)<0)echo 'disabled'; ?>">
            <a <?php if(($offset-$lim)>=0)echo 'href="'.base_url().'site/news/'.($offset-$lim).'"'; ?>">Lebih baru &rarr;</a>
        </li>
    </ul>
</div>