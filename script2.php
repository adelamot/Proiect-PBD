<?php
header("Location: ../index.php");
mysql_connect('localhost', 'user', 'parola') or die (mysql_error());
mysql_select_db('proiect1') or die (mysql_error()); 

$query3=mysql_query("Drop table comenzi");
$query2=mysql_query("Drop table clienti");
$query1=mysql_query("Drop table produse");
mysql_close(); 
?>