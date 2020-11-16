<?php
header("Location: ../index.php");
mysql_connect('localhost', 'user', 'parola') or die (mysql_error());
mysql_select_db('proiect1') or die (mysql_error());
$conn =mysql_connect('localhost', 'user', 'parola');
$nr_cont=$_POST["nr_cont"];
$nume = $_POST["nume"];
$prenume = $_POST["prenume"];
$data_nasterii = strtotime($_POST["data_nasterii"]);
$data_nasterii_formatata = date('Y-m-d', $data_nasterii);


    $query2 =mysql_query("INSERT INTO `proiect1`.`clienti`(`NumarCont`, `Nume`, `Prenume`, `DataNasterii`) VALUES ('$nr_cont','$nume','$prenume','$data_nasterii_formatata')");
    

$array = array();
$array2 = array();
$array3 = array();

$query_produse =mysql_query("SELECT * FROM `proiect1`.`produse`");

while($row=mysql_fetch_row($query_produse)){
    if(isset($_POST[$row[0]])) {
        array_push ($array, $row[0]);
        $ro =$row[0].'q';
        array_push ($array2, $_POST[$ro]);
        $stoc = $row[3] - $_POST[$ro];
        array_push ($array3, $stoc);

    }
}

$current_date = date("Y-m-d");
for($i=0; $i<count($array2); $i++) {
  
    if($query3 =mysql_query("INSERT INTO `proiect1`.`comenzi`(`NumarCont`, `IdProdus`, `Cantitate`, `DataVanzarii`) VALUES ($nr_cont,$array[$i], $array2[$i], '$current_date') "))
    {
        
    }
    else echo mysql_error($conn)."<br>"; 

}
    if($query_drop = mysql_query("DROP TRIGGER decrementareStoc")){

    }
    else echo mysql_error($conn)."<br>";
    if($query_trigger=mysql_query("CREATE TRIGGER decrementareStoc AFTER INSERT ON comenzi FOR EACH ROW 
    Update `proiect1`.`produse` set produse.Stoc=produse.Stoc - NEW.Cantitate where produse.IdProdus=NEW.IdProdus")){

    }
    else echo mysql_error($conn)."<br>";

mysql_close(); 
?>
