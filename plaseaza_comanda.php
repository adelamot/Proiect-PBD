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
<form action="inserare_comanda.php" method="POST">
    <div class="container-produs">
    <input type="text" name="nr_cont" required placeholder="Numar cont">
    <input type="text" name="nume" required placeholder="Nume">
    <input type="text" name="prenume" required placeholder="Prenume">
    
    <label for="data_nasterii">Data nasterii:</label><input type="date" required name="data_nasterii">
    </div>
    <?php    
        mysql_connect('localhost', 'user', 'parola') or die (mysql_error());
        mysql_select_db('proiect1') or die (mysql_error()); 
        $query=mysql_query("SELECT * from produse");
        $nr_inreg=@mysql_num_rows($query);        
            while($row=mysql_fetch_row($query)){
               echo '<div class="container-produs">';
               echo '<h3>'.$row[1].'</h3>';
               echo '<p>Garantie:'.$row[2].'</p>';
               echo '<p>Pret:'.$row[4].'</p>';
               echo '<input type="checkbox" class="product" name="'.$row[0].'">';
               echo'<input type="number" class="quantity" name="'.$row[0].'q" min="1" max="'.$row[3].'">';
               echo '</div>';
            }
        mysql_close(); 
        ?>
       <button class="submit" type="submit">GO</button>
</form>

</body>
</html>