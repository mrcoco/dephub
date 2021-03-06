<div id="display_dialog" class="modal hide modal-wide"></div>

<table width="100%" class="table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th width="5%" id="no">No</th>
            <th width="30%" id="nama">Nama</th>
            <th width="20%" id="nip">NIP</th>
            <th width="45%" id="nip">Role</th>
        </tr>
    </thead>
    <tbody id="body_table">
<?php $no=$offset+1?>
<?php foreach($array as $a){?>
<tr>
    <td><?php echo $no?></td>
    <td><a class="tip-right" title="Klik untuk detail" href="javascript:view_detail(<?php echo $a['id']; ?>)"><?php echo $a['nama']?></a></td>
    <td><?php echo $a['nip']?></td>
    <td>
        <?php if($a['id']!=$this->session->userdata('id')) {?>
        <div class="btn-group" data-toggle="buttons-radio">
        <?php foreach($role as $k=>$v){ ?>
        <?php    if($k==$a['id_role']){
                    $c='active';
                }else{
                    $c='';
                } ?>
        <button type="button" class="btn btn-small <?php echo $c ?>" onclick="status(<?php echo $k.','.$a['id']?>)">
            <?php echo ucfirst($v); ?>
        </button>
        <?php } ?>
        <button type="button" class="btn btn-small btn-danger del_role" onclick="status(0,<?php echo $a['id']?>)">
            x
        </button>
        </div>
        <?php }else{?>
        <div class="btn-group" data-toggle="buttons-radio">
        <?php foreach($role as $k=>$v){ ?>
            <?php    
                if($k==$a['id_role']){
                    $c='active';
                }else{
                    $c='';
                } 
            ?>
        <button type="button" class="btn btn-small <?php echo $c ?>" disabled><?php echo ucfirst($v); ?></button>
        <?php } ?>
        </div>
        <?php } ?>
    </td>
</tr>
<?php $no++ ?>
<?php }?>
</tbody>
</table>
<div id="footer">
<div id="info" class="pull-right">Hal <?php echo $cur_page?> dari <?php echo $num_page?></div>
    <div id="paging" class="pagination">
        <ul>
            <li><a href="javascript:void(0)" onclick="load(1,'<?php echo $filter ?>')">Awal</a></li>
        <?php 
            $ac='';
            if($cur_page<3){
                if($num_page>5){
                    $max=5;
                }else{
                    $max=$num_page;
                }
                for($i=1;$i<=$max;$i++){
                    if($i==$cur_page){$ac='active';}else{$ac='';}
                    echo '<li class="'.$ac.'"><a href="javascript:void(0)" onclick="load('.$i.',\''.$filter.'\')">'.$i.'</a></li>';
                }
            }else if($cur_page>=3&&$cur_page<=($num_page-3)){
                for($i=$cur_page-2;$i<=$cur_page+2;$i++){
                    if($i==$cur_page){$ac='active';}else{$ac='';}
                    echo '<li class="'.$ac.'"><a href="javascript:void(0)" onclick="load('.$i.',\''.$filter.'\')">'.$i.'</a></li>';
                }
            }else if($cur_page>($num_page-3)){
                for($i=$num_page-4;$i<=$num_page;$i++){
                    if($i==$cur_page){$ac='active';}else{$ac='';}
                    echo '<li class="'.$ac.'"><a href="javascript:void(0)" onclick="load('.$i.',\''.$filter.'\')">'.$i.'</a></li>';
                }
            }
        ?>
            <li><a href="javascript:void(0)" onclick="load(<?php echo $num_page.',\''.$filter.'\''?>)">Akhir</a></li>
        </ul>
    </div>
</div>
<script>
    $(function(){
        $('.tip-right').tooltip({placement:'right'});
    });
</script>