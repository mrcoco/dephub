<p class="lead">Daftar diklat yang diikuti</p>
<?php if($diklat){ ?>
    <ul>
    <?php foreach($diklat as $p){ ?>
        <li>
            <a href="pes/front/detail_diklat/<?php echo $p['id'] ?>"><?php echo $p['name'] ?>
                tahun <?php echo $p['tahun_daftar'] ?> Angkatan <?php echo $p['angkatan']  ?>
            </a>
        </li>
    <?php } ?>
    </ul>
<?php }else{ ?>
    Tidak ada diklat yang diikuti
<?php } ?>
<p class="lead">History Diklat</p>
<ul>
<?php
if(count($history)==0){
    $text='Tidak ada data history pelatihan';
}else{
    foreach($history as $h){
        echo '<li>'.$h['tahun'].' : '.$h['nama_pelatihan'].'</li>';
    }
}
?>                    
</ul>
