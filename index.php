<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <form action="script.php" method="POST">
            <button id="button1" type="submit">Populeaza baza de date</button>
        </form>
        <form action="plaseaza_comanda.php" method="POST">
            <button class="mybutton" type="submit">Plaseaza comanda</button>
        </form>
        <form action="sterge_tabel.php" method="POST">
            <button class="mybutton" type="submit">Sterge Tabele</button>
        </form>
        <form action="plaseaza_comanda_sql.php" method="POST">
            <button class="mybutton" type="submit">Plaseaza comanda SQL</button>
        </form>
        <form action="afisare_raport_client.php" method="POST">
            <select class="dropdown btn btn-secondary dropdown-toggle" style="display: block; width:500px; margin: auto; background-color: whitesmoke; color: black;" name="client" id="client">
            <?php    
        mysql_connect('localhost', 'user', 'parola') or die (mysql_error());
        mysql_select_db('proiect1') or die (mysql_error()); 
        $query=mysql_query("SELECT * from clienti");
        $nr_inreg=@mysql_num_rows($query);        
            while($row=mysql_fetch_row($query)){
                echo '<option class="dropdown-item" value="'.$row[0].'">'.$row[1].' '.$row[2].' '.'</option>';
                }?>
            </select>
            <button class="mybutton" type="submit">Afisare raport client</button>
        </form>
        <form action="raport_garantie.php" method="POST">
        <button class="mybutton" type="submit">Raport garantie produse</button>
        </form>
        <form action="cel_mai_vandut_produs.php" method="POST">
            <button class="mybutton" type="submit">Cel mai vandut produs</button>
        </form>
        <form action="data_cele_mai_multe_vanzari.php" method="POST">
            <button  class="mybutton" type="submit">Data cu cele mai multe vanzari</button>
        </form>
        <form action="client_multe_produse.php" method="POST">
            <button class="mybutton" type="submit">Clientul care a cumparat cele mai multe produse</button>
        </form>
    </div>
</body>

</html>