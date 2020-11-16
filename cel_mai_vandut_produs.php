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
$q = "SELECT IdProdus,Produs FROM Produse";
$max=0;
 if($query=mysql_query($q)) {
    while($row=mysql_fetch_assoc($query)){
        $query2 = "SELECT * FROM comenzi WHERE IdProdus='".$row['IdProdus']."'";
        $cnt=0;
        if($query3=mysql_query($query2)){
            while($row2=mysql_fetch_assoc($query3)){
                $cnt += $row2['Cantitate'];
            }
        }
        if($cnt > $max) {
            $max=$cnt;
            $tmp = $row['Produs'];
        }
    }
} else  echo mysql_error($conn)."<br>"; 
if($max > 0 )
    echo'<div class="container-produs">Cel mai vandut produs din baza de date este: <b>'.$tmp.'</b></div>';
else echo '<div class="container-produs"> Nu exista vanzari </div>';
mysql_close();
?>