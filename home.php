<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="index.css">
</head>
<body> 
<form action="script3.php" method="POST">
    <div class="container-produs">
    <input type="text" name="nr_cont" required placeholder="Numar cont">
    <input type="text" name="nume" required placeholder="Nume">
    <input type="text" name="prenume" required placeholder="Prenume">
    <!-- de adaugat in tabel de client -->
    
    <label for="data_nasterii">Data nasterii:</label><input type="date" required name="data_nasterii">
    </div>
    <?php    
        mysql_connect('localhost', 'user', 'parola') or die (mysql_error());
        mysql_select_db('proiect1') or die (mysql_error()); 
        $query=mysql_query("SELECT * from produse");
        $nr_inreg=@mysql_num_rows($query);        
        // echo '<form action="" method="POST" >';
            while($row=mysql_fetch_row($query)){
               echo '<div class="container-produs">';
               echo '<h3>'.$row[1].'</h3>';
               echo '<p>Garantie:'.$row[2].'</p>';
               echo '<p>Pret:'.$row[4].'</p>';
               echo '<input type="checkbox" class="product" name="'.$row[0].'">';
               echo'<input type="number" class="quantity" name="'.$row[0].'q" min="1" max="'.$row[3].'">';
               echo '</div>';
            }
        // echo '</form>';
        mysql_close(); 
        ?>
       <button class="submit" type="submit">GO</button>
</form>
</body>
</html>