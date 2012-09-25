<?php
class Date{
    function konversi1($in){
        //merubah format tanggal yy-mm-dd jadi dd-mm-yy
        $obj_date=  date_create_from_format('Y-m-d', $in);
        echo date_format($obj_date, 'd-m-Y');
    }
    function konversi2($in){
        //merubah format tanggal yy-mm-dd jadi dd-mm-yy
        $obj_date=  date_create_from_format('Y-m-d', $in);
        echo date_format($obj_date, 'd-m-y');
    }
    function konversi3($in){
        //merubah format dari model 09 Jan 2012 ke 2012-01-09
        $part = explode(' ',$in);
        return $part[2].'-'.$this->index_bulan_ina($part[1]).'-'.$part[0];
    }
    
    function index_bulan_ina($bulan){
        if(strcasecmp($bulan,'jan')==0||strcasecmp($bulan,'januari')==0){
            return '01';
        }else if(strcasecmp($bulan,'feb')==0||strcasecmp($bulan,'februari')==0){
            return '02';
        }else if(strcasecmp($bulan,'mar')==0||strcasecmp($bulan,'maret')==0){
            return '03';
        }else if(strcasecmp($bulan,'apr')==0||strcasecmp($bulan,'april')==0){
            return '04';
        }else if(strcasecmp($bulan,'mei')==0||strcasecmp($bulan,'mei')==0){
            return '05';
        }else if(strcasecmp($bulan,'jun')==0||strcasecmp($bulan,'juni')==0){
            return '06';
        }else if(strcasecmp($bulan,'jul')==0||strcasecmp($bulan,'juli')==0){
            return '07';
        }else if(strcasecmp($bulan,'agu')==0||strcasecmp($bulan,'agustus')==0){
            return '08';
        }else if(strcasecmp($bulan,'sep')==0||strcasecmp($bulan,'september')==0){
            return '09';
        }else if(strcasecmp($bulan,'okt')==0||strcasecmp($bulan,'oktober')==0){
            return '10';
        }else if(strcasecmp($bulan,'nov')==0||strcasecmp($bulan,'noember')==0){
            return '11';
        }else if(strcasecmp($bulan,'des')==0||strcasecmp($bulan,'desember')==0){
            return '12';
        }
    }
    
    function extract_date($in){
        //merubah format tanggal yy-mm-dd jadi dd-mm-yy
        $obj_date=  date_create_from_format('Y-m-d H:i:s', $in);
        
        $a[] = date_format($obj_date, 'Y');
        $a[] = date_format($obj_date, 'n')-1;
        $a[] = date_format($obj_date, 'j');
        $a[] = date_format($obj_date, 'G');
        $a[] = date_format($obj_date, 'i');
        $a[] = date_format($obj_date, 's');
        return implode(', ', $a);
    }
    
}
