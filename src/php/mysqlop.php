<?php
function authimei($imei)
{
    #echo "enter"."\n";
    $con = mysql_connect("localhost","root","myruijie");
    if (!$con)
    {
        die('Could not connect: ' . mysql_error());
    }
    mysql_select_db("customerdb", $con);
    $result = mysql_query("SELECT * FROM authimei where imei='$imei'");
    #echo "result is: " . $result . "\n";
    if ($result) {
        #echo "true";
        return true;
    }
    return false;

}
function getinfo($imei, $pn, $nickname)
{
    if (authimei($imei)) {
        $con = mysql_connect("localhost","root","myruijie");
        if (!$con)
        {
            die('Could not connect: ' . mysql_error());
        }

        mysql_select_db("customerdb", $con);

        #$query="SELECT * FROM infoimei WHERE imei=$imei AND pn=$pn AND nickname=$nickname";
        $query="SELECT * FROM infoimei WHERE imei='$imei'";
        #
        #$query="SELECT * FROM infoimei WHERE nickname = '$nickname'"; #it success, why?
        #$query="SELECT * FROM infoimei WHERE nickname = $nickname"; #it fails, why?
        #echo $query . "\n";
        try {
            $result = mysql_query($query);
            if ($result) {
                return mysql_fetch_array($result);
        }
        } catch (Exception $e) {
            echo $e;
        }
    }

}

function update($imei, $pn, $nickname, $password)
{
    if (authimei($imei)) {
        $con = mysql_connect("localhost","root","myruijie");
        if (!$con)
        {
            die('Could not connect: ' . mysql_error());
        }

        mysql_select_db("customerdb", $con);

        #$query="SELECT * FROM infoimei WHERE imei=$imei AND pn=$pn AND nickname=$nickname";
        $insert="insert into infoimei (imei,pn,password,nickname) value ('$imei','$pn','$password','$nickname')";
        try {
            $result = mysql_query($insert);
        }
        catch (Exception $e) {
            echo $e;
        }
        mysql_close($con);
    }
}

//$authimei="864863017422771";
//$pn="15705912296";
//$nickname="zhangqiqiang";
//echo getinfo($authimei, $pn, $nickname);
$authimei="123";
$pn="123";
$nickname="zqq";
$password="pass";
update($authimei, $pn, $nickname, $password);
