<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<link rel="stylesheet" href="index.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body id="body-index">
<video class="bg-video" autoplay muted loop>
            <source src="video.mp4" type="video/mp4">
            Video
        </video> 
<div style="position: absolute; top: 160px; left: 567px; z-index:100;">
            <h1 style="display:inline-block; color: wheat; margin-top: 20px;">Plaseaza comanda</h1>
            <img src="shopping-bag.png" style="margin-top:-39px; margin-left: 20px;"/>
        </div>  
<div class="container control-panel">

    <form action="script5.php" method="POST">
    <!-- <select class="dropdown btn btn-secondary dropdown-toggle" style="display: block; width:500px; margin: 10px auto; background-color: whitesmoke; color: black;" name="client" id="client"> -->
    <select class="btnn btnn-5"  style='width:100%; padding: 9.5px;' name="client" id="client">
                <?php    
            mysql_connect('localhost', 'user', 'parola') or die (mysql_error());
            mysql_select_db('proiect1') or die (mysql_error()); 
            $query=mysql_query("SELECT * from clienti");
            $nr_inreg=@mysql_num_rows($query); 
                while($row=mysql_fetch_row($query)){
                    echo '<option value="'.$row[0].'">'.$row[1].' '.$row[2].' '.'</option>';
                    }?>
    </select> <?php 
    // echo "<select class='dropdown btn btn-secondary dropdown-toggle' style='display: block; width:500px; margin: 10px auto; background-color: whitesmoke; color: black;'' name='produs' id='produs'>";
    echo "<select class='btnn btnn-5' style='width:100%; padding: 9.5px;' name='produs' id='produs'>";
                
            mysql_connect('localhost', 'user', 'parola') or die (mysql_error());
            mysql_select_db('proiect1') or die (mysql_error()); 
            $query=mysql_query("SELECT * from produse");
            $nr_inreg=@mysql_num_rows($query);        
                while($row=mysql_fetch_row($query)){
                    echo '<option value="'.$row[0].'">'.$row[1].' '.$row[2].' '.'</option>';
                } 
    echo "</select>";
    echo '<input type="number" style="width:100%; padding: 9.5px; margin: 0 1em 2em; border-radius: 3px;" class="btnn btnn-5" name="cantitate" min="1" max="10"/>';
    ?>
    <button class="btnn btnn-5" type="submit">Cumpara!</button>
    </form>
        </div>
</body>
</html> 