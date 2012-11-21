    
<div id="display_dialog" class="modal hide modal-wide"></div>

<table width="100%" class="table table-striped table-bordered table-condensed">
    <thead>
        <tr>
                                    <th >No Peminjaman</th>
                                    <th >Peminjam</th>
                                    <th>NIP</th>
                                    <th>Buku</th>
                                    <th>Tanggal</th>
                                    <th>Sampai</th>
                                    <th>Status</th>

                                    <th>aksi</th>

        </tr>
    </thead>
    <tbody id="body_table">
<?php $no=$offset+1; ?>
<?php foreach($data as $a){?>
<tr>
                                    
                                    <td><?php echo $a['id'];?></td>
                                    <td><?php echo $a['nama'];?></td>
                                    <td><?php echo $a['nip'];?></td>
                                    <td><?php echo $a['title'];?></td>
                                    <td><?php echo $a['loandate'];?></td>
                                    <td><?php echo $a['duedate'];?></td>
                                    <td><?php if($a['returndate']!='0000-00-00') echo $a['returndate']."<td></td>";else {echo 'belum'?></td>
                                    <td><a href='<?php echo site_url()."elibrary/admin/kembali/".$a['id'];?>' class='btn'>Buku kembali</a></td>
                                    <?php }?>
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