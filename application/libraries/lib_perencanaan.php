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
    function print_child($array,$parent){
        if($array){
            foreach($array as $data){
                if($data['parent']==$parent){
                    echo '<div>'.$data['name'].'</div>';
                }
            }
        }
    }
}

