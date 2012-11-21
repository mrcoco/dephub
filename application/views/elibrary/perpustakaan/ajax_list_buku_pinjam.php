    
<div id="display_dialog" class="modal hide modal-wide"></div>

<table width="100%" class="table table-striped table-bordered table-condensed">
    <thead>
        <tr>
                                    
                                    <th >Judul</th>
                                    <th>ISSN/ISBN</th>
                                    <th>Kategori</th>
                                    <th>Pengarang</th>
                                    <th>Stok</th>
                                    <th>aksi</th>

        </tr>
    </thead>
    <tbody id="body_table">
<?php $no=$offset+1; ?>
<?php foreach($data as $a){?>
<tr>
                                    
                                    
                                    <td><?php echo $a['title'];?></td>
                                    <td><?php echo $a['issnisbn'];?></td>
                                    <td><?php echo $a['categoryname'];?></td>
                                    <td><?php echo $a['authorname'];?></td>
                                    <td><?php echo $a['stock'];?></td>
                                    <td><a href="<?php echo site_url("elibrary/perpustakaan/view")."/".$a['id']?>" class="btn btn-mini"><i class="icon-edit"></i> Lihat</a></td>
                                    
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