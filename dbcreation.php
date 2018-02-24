<?php
$con=mysql_connect("localhost","root","");
$dbname="mobilestore";

if (mysql_num_rows(mysql_query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '". $dbname ."'"))) {
        echo "Database $dbname already exists.";
    }

?>