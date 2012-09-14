<table width="100%" class="table">
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
    <td><span id="jenis<?php echo $a['id']?>"><?php echo $a['jenis']?></span></td>
    <td>
        <span onclick="status(1,<?php echo $a['id']?>)">Non-widya</span> | 
        <span onclick="status(2,<?php echo $a['id']?>)">Widya</span> | 
        <span onclick="status(0,<?php echo $a['id']?>)">Tidak ada</span>
        </td>
</tr>
<?php $no++ ?>
<?php } ?>
</tbody>
</table>
<div id="footer">
<div id="info">Hal <?php echo $cur_page?> dari <?php echo $num_page?></div>
    <div id="paging">
        <span onclick="load(1,'<?php echo $filter ?>')">Awal</span>
        <?php 
            if($cur_page<3){
                if($num_page>5){
                    $max=5;
                }else{
                    $max=$num_page;
                }
                for($i=1;$i<=$max;$i++){
                    echo '<span onclick="load('.$i.',\''.$filter.'\')">'.$i.'</span> ';
                }
            }else if($cur_page>=3&&$cur_page<=($num_page-3)){
                for($i=$cur_page-2;$i<=$cur_page+2;$i++){
                    echo '<span onclick="load('.$i.',\''.$filter.'\')">'.$i.'</span> ';
                }
            }else if($cur_page>($num_page-3)){
                for($i=$num_page-4;$i<=$num_page;$i++){
                    echo '<span onclick="load('.$i.',\''.$filter.'\')">'.$i.'</span> ';
                }
            }
        ?>
        <span onclick="load(<?php echo $num_page.',\''.$filter.'\''?>)">Akhir</span>
    </div>
</div>