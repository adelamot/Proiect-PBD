<?php
echo '<head>';
echo '<link rel="stylesheet" type="text/css" href="index.css">';
echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">';
echo '<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>';
echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>';
echo '<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>';
echo '</head>';
mysql_connect('localhost', 'user', 'parola') or die (mysql_error());
mysql_select_db('proiect1') or die (mysql_error());
$conn =mysql_connect('localhost', 'user', 'parola');
$selection = $_POST['client'];
$query =mysql_query("SELECT * FROM `proiect1`.`clienti` WHERE NumarCont=$selection");
while($row=mysql_fetch_row($query)){
  echo '<div class="container-produs" style="text-align: left;">';
  echo "<br><b>nume:</b>".$row[1];
  echo "<br><b>prenume:</b>".$row[2];
}
$query2 =mysql_query("SELECT * FROM `proiect1`.`comenzi` WHERE NumarCont=$selection");
$array = array();
$suma_produse=0;
while($row=mysql_fetch_row($query2)){
  echo "<br><br><b>cantitate:</b>".$row[2];
  $query3 =mysql_query("SELECT * FROM `proiect1`.`produse` WHERE IdProdus=$row[1]");
  while($r=mysql_fetch_row($query3)){
    echo "<br><b>produs:</b>".$r[1];
    echo "<br><b>cat a cheltuit pe acest produs:</b>".$row[2]*$r[4];
    $suma_produse = $suma_produse + $row[2]*$r[4];
  }
}
echo "<br><br><b> Suma totala cheltuita de acest client:</b>".$suma_produse;
echo "</div>";
mysql_close();
?>


