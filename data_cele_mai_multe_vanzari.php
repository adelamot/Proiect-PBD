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
//luam data vanzarii de la fiecare comanda si numara de cate ori se gaseste data vanzarii si afiseaza descrescator
//il luam doar pe primul si e cel mai mare
$q = "SELECT DataVanzarii, Count(DataVanzarii) AS numar FROM comenzi ORDER BY numar DESC";
$query=mysql_query($q);
$row=mysql_fetch_assoc($query);
echo '<div class="container control-panel" style="padding: 5%; font-size: 30px; display: block; color: wheat;">Data la care s-au vandut cele mai multe produse: <b>'.date_format(date_create($row['DataVanzarii']), 'd-M-Y').'</b></div>';
mysql_close();
echo '</body>';
?>