<?php
mysql_connect('localhost', 'user', 'parola') or die (mysql_error());
mysql_select_db('proiect1') or die (mysql_error());
$query="SELECT NumarCont, Nume, Prenume FROM Clienti";
$max=0;
if($result = mysql_query($query)){
    while($row=mysql_fetch_assoc($result)){
        $query2="SELECT * FROM comenzi WHERE NumarCont='".$row['NumarCont']."'";
        $cnt=0;
        if($row2=mysql_query($query2)){
            while($row3=mysql_fetch_assoc($row2)){
                $cnt += (int)$row3['Cantitate'];
            }
        }
        if($cnt > $max){
            $max = $cnt;
            $tmp = $row;
        }
    }
}
if($max > 0){
    $val=0;
    $query="SELECT * FROM comenzi WHERE NumarCont='".$tmp['NumarCont']."'";
    if($roww=mysql_query($query)){
        while($r=mysql_fetch_assoc($roww)){
            $query2="SELECT ValoareUnitara FROM Produse WHERE IdProdus=".$r['IdProdus'];
            $row2=mysql_query($query2);
            $row3=mysql_fetch_assoc($row2);
            $val += (int)$row3['ValoareUnitara'] * $r['Cantitate'];
        }
    }
    echo '<p>Rezultat:'.$tmp['Nume']." ".$tmp['Prenume']." Produse cumparate: ".strval($max)." | Valoare totala: ".strval($val)."</p>";
}   
else echo 'Nu exista comenzi';
mysql_close();
?>