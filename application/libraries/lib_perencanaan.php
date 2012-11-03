<?php
/**
 * Description of perencanaan
 *
 * @author bharata
 */
class Lib_perencanaan {
    
    function print_tree_kategori($array_kat,$parent=0){
        echo '<ul>';
        for($i=0;$i<count($array_kat);$i++){
            if($array_kat[$i]['parent']==$parent){
                echo '<li>'.$array_kat[$i]['name'].' [<a href="'.base_url().'perencanaan/diklat/edit_kategori/'.$array_kat[$i]['id'].'">Edit</a> | <a href="'.base_url().'perencanaan/diklat/buat_diklat/'.$array_kat[$i]['id'].'">Buat program</a>]</li>';
                $this->print_tree_kategori($array_kat,$array_kat[$i]['id']);
            }
        }
        echo '</ul>';
    }
    
    function print_tree_all($array_kat,$parent=0){
        echo '<ul>';
        for($i=0;$i<count($array_kat);$i++){
            if($array_kat[$i]['parent']==$parent){
                if($array_kat[$i]['tahun_program']!='0000'){
                    echo '<li><a href="'.base_url().'perencanaan/diklat/detail_diklat/'.$array_kat[$i]['id'].'">'.$array_kat[$i]['name'].'</a></li>';
                }else{
                    echo '<li>'.$array_kat[$i]['name'].'</li>';
                }
                $this->print_tree_all($array_kat,$array_kat[$i]['id']);
            }
        }
        echo '</ul>';
    }
    
    function overview($array,$id,$field){
        if(count($array)>0){
            foreach($array as $data){
                if($data['id']==$id){
                    return $data[$field];
                }
            }
        }
    }
    function print_child_feedback($array,$id_program,$kiri,$kanan,$kelas){
        if($array){
            $no=1;
            foreach($array as $data){
                if($data['id_program']==$id_program){
                    echo $kiri.'<a href="perencanaan/feedback/display_feedback_sarpras/'.$data['id'].'"><i class="icon-list-alt"></i> 
                            Feedback '.$no.'
                        </a>'.$kanan.'
                        ';
                    $no++;
                }
            }
        }
    }
    function print_child_schedule($array,$parent,$kiri,$kanan,$kelas){
        if($array){
            foreach($array as $data){
                if($data['parent']==$parent){
                    echo $kiri.'<a href="penyelenggaraan/schedule/buat_schedule/'.$data['id'].'" class="'.$kelas.'">
                            '.$data['name'].'
                        </a>'.$kanan.'
                        ';
                }
            }
        }
    }
    function print_child_pub($array,$parent,$kiri,$kanan,$kelas){
        if($array){
            foreach($array as $data){
                if($data['parent']==$parent){
                    echo $kiri.'
                            '.$data['name'].'
                        '.$kanan.'
                        ';
                }
            }
        }
    }
}

