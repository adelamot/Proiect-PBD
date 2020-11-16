<?php
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
    echo'<p>Cel mai vandut produs din baza de date este:'.$tmp.'</p>';
else echo 'Nu exista vanzari';
mysql_close();
?>