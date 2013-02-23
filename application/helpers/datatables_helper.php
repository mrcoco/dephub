<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function ubah_status($kode,$id){
    switch ($kode) {
        case 1:
            return '<span id="jenis'.$id.'">Non Widyaiswara</span>';
            break;
        case 2:
            return '<span id="jenis'.$id.'">Widyaiswara</span>';
            break;
        case 3:
            return '<span id="jenis'.$id.'">Dosen Tamu</span>';
            break;
        default:
            return '-';
            break;
    }
}

function aksi_ubah_status($id){
    $non_widya='<span onclick="non_widya('.$id.')">Non Widyaiswara</span>';
    $widya='<span onclick="widya('.$id.')">Non Widyaiswara</span>';
    $blank='<span onclick="hapus('.$id.')">Hapus</span>';
    return $non_widya.' | '.$widya.' | '.$blank;
}
