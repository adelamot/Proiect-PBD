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
//Luam nr cont nume prenume din clienti
$query="SELECT NumarCont, Nume, Prenume FROM Clienti";
$max=0;
if($result = mysql_query($query)){
    while($row=mysql_fetch_assoc($result)){
        // Pt fiecare client luam comenzile lui din tabelul de comenzi si le numaram in cnt cantitatea vanduta
        //in iful cu maxim comparam si vedem care client are cele mai multe produse cumparate
        //cel care are e salvat in tmp
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
    //Selectam toate comenzile si facem pretul total
    $query="SELECT * FROM comenzi WHERE NumarCont='".$tmp['NumarCont']."'";
    if($roww=mysql_query($query)){
        while($r=mysql_fetch_assoc($roww)){
            $query2="SELECT ValoareUnitara FROM Produse WHERE IdProdus=".$r['IdProdus'];
            $row2=mysql_query($query2);
            $row3=mysql_fetch_assoc($row2);
            $val += (int)$row3['ValoareUnitara'] * $r['Cantitate'];
        }
    }
    //Afisam
    echo '<div class="container control-panel" style=" width: 35%; padding: 5%; font-size: 30px; display: block; color: wheat;">Client: '.$tmp['Nume']." ".$tmp['Prenume']."<br>Numarul de produse: ".strval($max)." <br> Valoare totala: ".strval($val)." RON"."</div>";
}   
else echo 'Nu exista comenzi';
mysql_close();
?>