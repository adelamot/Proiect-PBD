<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<form action="script5.php" method="POST">
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
</select> <?php 
echo "<select name='produs' id='produs'>";
              
        mysql_connect('localhost', 'user', 'parola') or die (mysql_error());
        mysql_select_db('proiect1') or die (mysql_error()); 
        $query=mysql_query("SELECT * from produse");
        $nr_inreg=@mysql_num_rows($query);        
        // echo '<form action="" method="POST" >';
            while($row=mysql_fetch_row($query)){
                echo '<option value="'.$row[0].'">'.$row[1].' '.$row[2].' '.'</option>';
            } 
echo "</select>";
echo '<input type="number" class="quantity" name="cantitate" min="1" max="10"/>';
  ?>
  <button type="submit">Cumpara!</button>
</form>

</body>
</html> 