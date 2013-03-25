<div id="display_dialog" class="modal hide modal-wide"></div>
<table width="100%" class="table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th width="5%" id="no">No</th>
            <th width="30%" id="nama">Nama</th>
            <th width="15%" id="nip">NIP</th>
            <th width="20%">Nomor SK</th>
            <th width="25%">Program</th>
            <th width="5%">Tahun</th>
        </tr>
    </thead>
    <tbody id="body_table">
<?php $no=$offset+1?>
<?php foreach($array as $a){?>
<tr>
    <td><?php echo $no?></td>
    <td><a class="tip-right" title="Klik untuk detail" href="javascript:view_detail_pub(<?php echo $a['id_pegawai']; ?>)"><?php echo $a['nama']?></a></td>
    <td><?php echo $a['nip']?></td>
    <td>
        <?php if($a['file_sk']){ ?>
        <a class="tip-right" title="Klik untuk download SK" download="<?php echo $a['file_sk'] ?>" href="assets/public/file/<?php echo $a['file_sk'] ?>">
            <?php echo $a['no_sk'] ?>
        </a>
        <?php }else{ echo $a['no_sk']; } ?>
    </td>
    <td><?php echo $a['diklat'].' Angkatan '.$a['angkatan']?></td>
    <td><?php echo $a['tahun_program']?></td>
</tr>
<?php $no++ ?>
<?php }?>
</tbody>
</table>
<div id="footer">
<div id="info" class="pull-right">Total : <?=$num_res?> org | Hal <?php echo $cur_page?> dari <?php echo $num_page?></div>
    <div id="paging" class="pagination">
        <ul>
            <li><a href="javascript:saring(1)">Awal</a></li>
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
                    echo '<li class="'.$ac.'"><a href="javascript:saring('.$i.')">'.$i.'</a></li>';
                }
            }else if($cur_page>=3&&$cur_page<=($num_page-3)){
                for($i=$cur_page-2;$i<=$cur_page+2;$i++){
                    if($i==$cur_page){$ac='active';}else{$ac='';}
                    echo '<li class="'.$ac.'"><a href="javascript:saring('.$i.')">'.$i.'</a></li>';
                }
            }else if($cur_page>($num_page-3)){
                for($i=$num_page-4;$i<=$num_page;$i++){
                    if($i==$cur_page){$ac='active';}else{$ac='';}
                    echo '<li class="'.$ac.'"><a href="javascript:saring('.$i.')">'.$i.'</a></li>';
                }
            }
        ?>
            <li><a href="javascript:saring(<?php echo $num_page ?>)">Akhir</a></li>
        </ul>
    </div>
</div>
<script>
    $(function(){
        $('.tip-right').tooltip({placement:'right'});
    });
</script>