<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <div class="container">
        <form action="script.php" method="POST">
            <button id="button1" type="submit">Populeaza baza de date</button>
        </form>
        <form action="plaseaza_comanda.php" method="POST">
            <button id="button1" type="submit">Plaseaza comanda</button>
        </form>
        <form action="sterge_tabel.php" method="POST">
            <button id="button2" type="submit">Sterge Tabele</button>
        </form>
        <form action="plaseaza_comanda_sql.php" method="POST">
            <button id="button2" type="submit">Plaseaza comanda SQL</button>
        </form>
        <form action="afisare_raport_client.php" method="POST">
            <select name="client" id="client">
            <?php    
        mysql_connect('localhost', 'user', 'parola') or die (mysql_error());
        mysql_select_db('proiect1') or die (mysql_error()); 
        $query=mysql_query("SELECT * from clienti");
        $nr_inreg=@mysql_num_rows($query);        
        // echo '<form action="" method="POST" >';
            while($row=mysql_fetch_row($query)){
                echo '<option value="'.$row[0].'">'.$row[1].' '.$row[2].' '.'</option>';
                }?>
            </select>
            <button id="button3" type="submit">Afisare raport client</button>
        </form>
        <form action="raport_garantie.php" method="POST">
        <button type="submit">Raport garantie produse</button>
        </form>
        <form action="cel_mai_vandut_produs.php" method="POST">
            <button type="submit">Cel mai vandut produs</button>
        </form>
        <form action="data_cele_mai_multe_vanzari.php" method="POST">
            <button type="submit">Data cu cele mai multe vanzari</button>
        </form>
        <form action="client_multe_produse.php" method="POST">
            <button type="submit">Clientul care a cumparat cele mai multe produse</button>
        </form>
    </div>
</body>

</html>