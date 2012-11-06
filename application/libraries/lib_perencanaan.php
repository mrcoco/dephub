<?php
/**
 * Description of perencanaan
 *
 * @author bharata
 */
class Lib_perencanaan {
    
    function print_tree_kategori($array_kat,$parent=0){
        echo '<ul class="tree">'."\n";
        foreach($array_kat as $kat){
            if($kat['parent']==$parent){
                echo '<li>'.$kat['name'];
                echo ' <a class="tip" rel="tooltip" title="Edit" href="'.base_url().'perencanaan/diklat/edit_kategori/'.$kat['id'].'"><i class="icon-edit"></i></a>';
                echo ' <a class="tip" rel="tooltip" title="Buat program" href="'.base_url().'perencanaan/diklat/buat_diklat/'.$kat['id'].'"><i class="icon-plus"></i></a>';
                if($this->count_diklat($array_kat,$kat['id'])>0){
                  $this->print_tree_kategori($array_kat,$kat['id']);}
                echo '</li>';
            }
        }
        echo '</ul>';
    }
    function count_diklat($array,$parent){
        $count=0;
        foreach($array as $var){
            if($var['parent']==$parent){
                ++$count;
            }
        }
        return $count;
    }
    function print_tree_all($array_kat,$parent=0){
        echo '<ul class="tree">'."\n";
        foreach($array_kat as $diklat){
            if($diklat['parent']==$parent){
                if($diklat['tahun_program']!='0000'){
                    echo '<li><a href="'.base_url().'perencanaan/diklat/detail_diklat/'.$diklat['id'].'">'.$diklat['name'].'</a>';
                }else{
                    echo '<li><strong>'.$diklat['name'].'</strong> ('.$this->count_diklat($array_kat,$diklat['id']).')';
                }
                if($this->count_diklat($array_kat,$diklat['id'])>0){
                $this->print_tree_all($array_kat,$diklat['id']);}
                echo "</li>\n";
            }
        }
        echo "</ul>\n";
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

