<?php
require_once 'mycrypto.php';
require_once 'myutils.php';
require_once 'mysqlop.php';

$clientInfo=$_POST;
if ($clientInfo['Action'] == 'authenticate') {
    #handle authentication
}

if ($clientInfo['Action'] == 'register') {
    if (isset($clientInfo['Content'])) {

    }
}

if ($clientInfo['Action'] == 'exit') {
    #handle client exit
}

if ($clientInfo['Action'] == 'send') {
    $pn = $clientInfo['Head'];
    $token = ;
    $imei = decode($token);
    $ppn =;

}


?>

