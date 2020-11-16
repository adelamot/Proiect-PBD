<?php
mysql_connect('localhost', 'user', 'parola') or die (mysql_error());
mysql_select_db('proiect1') or die (mysql_error());
$conn =mysql_connect('localhost', 'user', 'parola');
$q = "SELECT DataVanzarii, Count(DataVanzarii) AS numar FROM comenzi ORDER BY numar DESC";
$query=mysql_query($q);
$row=mysql_fetch_assoc($query);
echo '<p>Data cu cele mai multe vanzari este:'.date_format(date_create($row['DataVanzarii']), 'd-M-Y').'</p>';
mysql_close();
?>