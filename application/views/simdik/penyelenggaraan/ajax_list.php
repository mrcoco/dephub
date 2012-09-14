<table width="100%" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th width="5%" id="no">No</th>
            <th width="30%" id="nama">Nama</th>
            <th width="20%" id="nip">NIP</th>
            <th width="15%" id="jenis">Jenis</th>
            <th width="30%">Aksi</th>
        </tr>
    </thead>
    <tbody id="body_table">
<?php $no=$offset+1?>
<?php foreach($array as $a){?>
<?php
    if($a['jenis']==''){
        $a['jenis']='-';
    }else{
        if($a['jenis']=='1'){
            $a['jenis']='non widyaiswara';
        }else if($a['jenis']=='2'){
            $a['jenis']='widyaiswara';
        }
    }
?>
<tr>
    <td><?php echo $no?></td>
    <td><?php echo $a['nama']?></td>
    <td><?php echo $a['nip']?></td>
    <td><span id="jenis<?php echo $a['id']?>" class="label label-info"><?php echo $a['jenis']?></span></td>
    <td>
        <div class="btn-group" data-toggle="buttons-radio">
            <button type="button" class="btn <?php if($a['jenis']=='non widyaiswara')echo 'active'; ?>" onclick="status(1,<?php echo $a['id']?>)">Non-widya</button>
            <button type="button" class="btn <?php if($a['jenis']=='widyaiswara')echo 'active'; ?>" onclick="status(2,<?php echo $a['id']?>)">Widya</button>
            <button type="button" class="btn <?php if($a['jenis']=='-')echo 'active'; ?>" onclick="status(0,<?php echo $a['id']?>)">Tidak ada</button>
        </div>
    </td>
</tr>
<?php $no++ ?>
<?php } ?>
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