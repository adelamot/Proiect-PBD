<?php
mysql_connect('localhost', 'user', 'parola') or die (mysql_error());
mysql_select_db('proiect1') or die (mysql_error());
$conn =mysql_connect('localhost', 'user', 'parola');
$produs=$_POST['produs'];
$client=$_POST['client'];
$cantitate=$_POST['cantitate'];
if($query=mysql_query("call vinde_produs($produs, $cantitate, $client)")) {} else  echo mysql_error($conn)."<br>"; 
mysql_close();
?>