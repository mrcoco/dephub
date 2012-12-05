<p class="lead">Daftar diklat</p>
<?php if($diklat){ ?>
    <ul>
    <?php foreach($diklat as $p){ ?>
        <li>
            <a class="tip-right" title="Klik untuk detail" href="pes/front/detail_diklat/<?php echo $p['id'] ?>"><?php echo $p['tahun_daftar'] ?> : <?php echo $p['name'] ?>
                Angkatan <?php echo $p['angkatan']  ?>
            </a>
        </li>
    <?php } ?>
<?php }else{ ?>
    Tidak ada diklat yang diikuti
<?php } ?>
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
