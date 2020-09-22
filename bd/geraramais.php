<?php

$host = '10.255.4.12';
$username = 'asterisk';
$password = 'asterisk';
$database = 'asterisk';
$contexto = 'interno';

mysql_connect($host, $username, $password, true);
mysql_select_db($database);
mysql_set_charset('utf8');

$ramal=200;
while($ramal<=299){
    
        $senha_normal = substr(md5(mt_rand()), -10);

        $sql = "INSERT INTO ramais_sip SET "
                . "name='" . $ramal . "',"
                . "username='" . $ramal . "',"
                . "secret='" . $senha_normal . "',"
                . "context='" . $contexto . "',"
                . "id_grupo=15";

        mysql_query($sql);

        $ramal++;
}
