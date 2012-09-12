<?php
class Date{
    function konversi1($in){
        //merubah format tanggal yy-mm-dd jadi dd-mm-yy
        $obj_date=  date_create_from_format('Y-m-d', $in);
        echo date_format($obj_date, 'd-m-Y');
    }
}
