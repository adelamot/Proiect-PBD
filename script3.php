<?php
mysql_connect('localhost', 'user', 'parola') or die (mysql_error());
mysql_select_db('proiect1') or die (mysql_error());
$conn =mysql_connect('localhost', 'user', 'parola');
$nr_cont=$_POST["nr_cont"];
$nume = $_POST["nume"];
$prenume = $_POST["prenume"];
$data_nasterii = strtotime($_POST["data_nasterii"]);
$data_nasterii_formatata = date('Y-m-d', $data_nasterii);


$query1 =mysql_query("SELECT * FROM `proiect1`.`clienti` WHERE NumarCont='$nr_cont'");

if(!$query1){
    $query2 =mysql_query("INSERT INTO `proiect1`.`clienti`(`NumarCont`, `Nume`, `Prenume`, `DataNasterii`) VALUES ('$nr_cont','$nume','$prenume','$data_nasterii_formatata')");
} 
$array = array();
$array2 = array();

$query_produse =mysql_query("SELECT * FROM `proiect1`.`produse`");

while($row=mysql_fetch_row($query_produse)){
    if(isset($_POST[$row[0]])) {
        array_push ($array, $row[0]);
        $ro =$row[0].'q';
        array_push ($array2, $_POST[$ro]);
    }
}
// var_dump($array);
// var_dump($array2);
$current_date = date("Y-m-d");
for($i=0; $i<count($array2); $i++) {
    // var_dump($nr_cont);
    // var_dump((int)$array[$i]);
    $caca1 = (int)$array[$i]."<br>";
    $caca2 = (int)$array2[$i]."<br>";
    // var_dump($current_date);
    if($query3 =mysql_query("INSERT INTO `proiect1`.`comenzi`(`NumarCont`, `IdProdus`, `Cantitate`, `DataVanzarii`) VALUES ($nr_cont,$array[$i], $array2[$i],$current_date) "))
    {}
    else echo mysql_error($conn)."<br>";
}
//  SELECT proiect1.clienti.NumarCont
// FROM proiect1.clienti
// WHERE proiect1.clienti.NumarCont = '$nr_cont'
// LIMIT 1"))
mysql_close(); 
?>
