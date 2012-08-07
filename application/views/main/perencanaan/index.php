<?php //var_dump($program) ?>
<div>
    DIKLAT PRAJABATAN
    <?php 
        foreach($program as $data){
            if($data['parent']==1){
                echo '<div>'.$data['name'].'</div>';
            }
        }
    ?>
</div>
<div>
    DIKLAT DALAM JABATAN
    <div>
        Diklat Kepemimpinan
        <?php 
            foreach($program as $data){
                if($data['parent']==4){
                    echo '<div>'.$data['name'].'</div>';
                }
            }
        ?>
    </div>
    <div>
        Diklat Fungsional
        <div>
            Diklat Fungsional Keahlian
            <?php 
                foreach($program as $data){
                    if($data['parent']==8){
                        echo '<div>'.$data['name'].'</div>';
                    }
                }
            ?>
        </div>
        <div>
            Diklat Teknis Fungsional
            <?php 
                foreach($program as $data){
                    if($data['parent']==9){
                        echo '<div>'.$data['name'].'</div>';
                    }
                }
            ?>
        </div>
    </div>    
</div>
<div>
    DIKLAT TEKNIS
    <div>
        Diklat Teknis Umum
        <?php 
            foreach($program as $data){
                if($data['parent']==6){
                    echo '<div>'.$data['name'].'</div>';
                }
            }
        ?>
    </div>
    <div>
        Diklat Teknis Manajemen
        <?php 
            foreach($program as $data){
                if($data['parent']==7){
                    echo '<div>'.$data['name'].'</div>';
                }
            }
        ?>
    </div>    
</div>
