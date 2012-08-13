<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of perencanaan
 *
 * @author bharata
 */
class Lib_perencanaan {
    function print_child($array,$parent,$kiri,$kanan,$kelas){
        if($array){
            foreach($array as $data){
                if($data['parent']==$parent){
                    echo $kiri.'<a href="perencanaan/dashboard/detail_diklat/'.$data['id'].'" class="'.$kelas.'">
                            '.$data['name'].'
                        </a>'.$kanan.'
                        ';
                }
            }
        }
    }
    function overview($array,$id,$field){
        if($array){
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
                    echo $kiri.'<a href="perencanaan/dashboard/display_feedback_sarpras/'.$data['id'].'"><i class="icon-list-alt"></i> 
                            Feedback '.$no.'
                        </a>'.$kanan.'
                        ';
                    $no++;
                }
            }
        }
    }
}

