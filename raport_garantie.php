<?php
mysql_connect('localhost', 'user', 'parola') or die (mysql_error());
mysql_select_db('proiect1') or die (mysql_error());
$conn =mysql_connect('localhost', 'user', 'parola');
$q = "SELECT (SELECT Produs FROM Produse WHERE IdProdus = V.IdProdus)
 AS NProdus, DATE_ADD(V.DataVanzarii, INTERVAL ( SELECT Garantie FROM 
 Produse WHERE IdProdus=V.IdProdus) YEAR) AS DataExpirarii FROM comenzi V";
 echo '<table><tr><th>Produs</th><th>Data Expirarii</th></tr>';
 if($query=mysql_query($q)) {
    while($row=mysql_fetch_assoc($query)){
        if(date_create($row['DataExpirarii']>date("d-m-Y"))) break;
        echo '<tr>
        <td>'.$row['NProdus'].'</td>
        <td>'.date_format(date_create($row['DataExpirarii']), "d-M-Y").'</td></tr>';
    }
    echo '</td></tr></table>';
} else  echo mysql_error($conn)."<br>"; 
mysql_close();
?>