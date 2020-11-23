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
$q = "SELECT (SELECT Produs FROM Produse WHERE IdProdus = V.IdProdus)
 AS NProdus, DATE_ADD(V.DataVanzarii, INTERVAL ( SELECT Garantie FROM 
 Produse WHERE IdProdus=V.IdProdus) YEAR) AS DataExpirarii FROM comenzi V";
 echo '<table style="width: 50%; margin:auto;" class="table table-striped"><thead><tr><th scope="col">Produs</th><th scope="col">Data Expirarii</th></tr></thead><tbody>';
 if($query=mysql_query($q)) {
    while($row=mysql_fetch_assoc($query)){
       
        if(date_create($row['DataExpirarii']>date("Y-m-d"))) break;
        echo '<tr>
        <td>'.$row['NProdus'].'</td>
        <td>'.date_format(date_create($row['DataExpirarii']), "Y-m-d").'</td></tr>';
    }
    echo '</tbody></table>';
} else  echo mysql_error($conn)."<br>"; 
mysql_close();
?>