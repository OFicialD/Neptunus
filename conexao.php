<?php

//dados do banco de dados
$host = "kashin.db.elephantsql.com";
$user = "udelhnwy";
$pass = "XD1Cbv1phrgq9OmqtFNs_nRGYiIUfWSn";
$db = "udelhnwy";

// conexão ao banco de dados em PostgreSQL 
$con = pg_connect("host=$host dbname=$db user=$user password=$pass")
  or die ("Could not connect to server\n");
  
?>
