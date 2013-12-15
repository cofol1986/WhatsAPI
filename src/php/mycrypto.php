<?php
function decode($token) {
    #$crypted="081726314058667885930213293045";
    $numarray=str_split($token);
    $arraylenth=count($numarray);
    $imei='';
    for ($i = 0; $i < $arraylenth; $i++) {
        if($i%2==0)
            $imei.=strval(( $numarray[$i+1]+10 - $numarray[$i] )%10);
    }
    return $imei;
}
#echo decode("081726314058667885930213293045");
?>


