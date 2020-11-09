<?php
mysql_connect('localhost', 'user', 'parola') or die (mysql_error());
mysql_select_db('proiect1') or die (mysql_error());
$conn =mysql_connect('localhost', 'user', 'parola');
$selection = $_POST['client'];
$query =mysql_query("SELECT * FROM `proiect1`.`clienti` WHERE NumarCont=$selection");
while($row=mysql_fetch_row($query)){
  echo "<br>nume:".$row[1];
  echo "<br>prenume:".$row[2];
}
$query2 =mysql_query("SELECT * FROM `proiect1`.`comenzi` WHERE NumarCont=$selection");
$array = array();
$suma_produse=0;
while($row=mysql_fetch_row($query2)){
  echo "<br><br>cantitate:".$row[2];
  $query3 =mysql_query("SELECT * FROM `proiect1`.`produse` WHERE IdProdus=$row[1]");
  while($r=mysql_fetch_row($query3)){
    echo "<br>produs:".$r[1];
    echo "<br>cat a cheltuit pe acest produs:".$row[2]*$r[4];
    $suma_produse = $suma_produse + $row[2]*$r[4];
  }
}
echo "<br> Suma totala cheltuita de acest client:".$suma_produse;

foreach($array as $v){
   
   
}
mysql_close();
?>


