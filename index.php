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
        <form action="home.php" method="POST">
            <button id="button1" type="submit">Plaseaza comanda</button>
        </form>
        <form action="script2.php" method="POST">
            <button id="button2" type="submit">Sterge Tabele</button>
        </form>
        <form action="index2.php" method="POST">
            <button id="button2" type="submit">Plaseaza comanda SQL</button>
        </form>
        <form action="script4.php" method="POST">
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
       
    </div>
</body>

</html>