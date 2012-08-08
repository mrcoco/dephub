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
}

