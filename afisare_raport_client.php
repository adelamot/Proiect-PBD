<?php
echo '<head>';
echo '<link rel="stylesheet" type="text/css" href="index.css">';
echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">';
echo '<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>';
echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>';
echo '<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>';
echo '</head>';
echo '<body id="body-index">
<video class="bg-video" autoplay muted loop>
            <source src="video.mp4" type="video/mp4">
            Video
        </video> ';
mysql_connect('localhost', 'user', 'parola') or die (mysql_error());
mysql_select_db('proiect1') or die (mysql_error());
$conn =mysql_connect('localhost', 'user', 'parola');
$selection = $_POST['client'];

//Luam clientul cu nr de cont dat, atat din clienti cat si din comenzi
$query =mysql_query("SELECT * FROM `proiect1`.`clienti` WHERE NumarCont=$selection");
while($row=mysql_fetch_row($query)){
  echo '<div class="container control-panel" style=" padding: 5%; display: block;text-align: left; color: wheat; width: 30%;">';
  echo "<br><b>Nume client: </b>".$row[1];
  echo "<br><b>Prenume client: </b>".$row[2];
}
$query2 =mysql_query("SELECT * FROM `proiect1`.`comenzi` WHERE NumarCont=$selection");
$array = array();
$suma_produse=0;

while($row=mysql_fetch_row($query2)){
  echo "<br><br><b>Cantitatea produselor: </b>".$row[2];
  $query3 =mysql_query("SELECT * FROM `proiect1`.`produse` WHERE IdProdus=$row[1]");
  while($r=mysql_fetch_row($query3)){
    echo "<br><b>Produs: </b>".$r[1];
    echo "<br><b>Pret: </b>".$row[2]*$r[4];
    $suma_produse = $suma_produse + $row[2]*$r[4];
  }
}

echo "<br><br><b>Cheltuieli totale: </b>".$suma_produse;
echo "</div></body>";
mysql_close();
?>


