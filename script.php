<?php 
   header("Location: ../index.php");
   echo '<head>';
   echo '<link rel="stylesheet" type="text/css" href="index.css">';
   echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">';
   echo '<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>';
   echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>';
   echo '<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>';
   echo '</head>';
   mysql_connect('localhost', 'user', 'parola') or die (mysql_error());
   mysql_select_db('proiect1') or die (mysql_error()); 
   $query_create1=mysql_query("CREATE TABLE clienti (
    NumarCont varchar(8) PRIMARY KEY,
    Nume VARCHAR(30) NOT NULL,
    Prenume VARCHAR(30) NOT NULL,
    DataNasterii DATE
    )");
   $query_create2=mysql_query("CREATE TABLE produse (
    IdProdus int AUTO_INCREMENT PRIMARY KEY,
    Produs VARCHAR(80) NOT NULL,
    Garantie int NOT NULL,
    Stoc int NOT NULL,
    ValoareUnitara double NOT NULL,
    check (Garantie < 5),
    check (Stoc < 200)
    )");
   $query_create3=mysql_query("CREATE TABLE comenzi (
    NumarCont varchar(8),
    IdProdus int,
    Cantitate int NOT NULL,
    DataVanzarii DATE,
    CONSTRAINT FK_NrCont FOREIGN KEY (NumarCont) REFERENCES proiect1.clienti(NumarCont),
    CONSTRAINT FK_IdProd FOREIGN KEY (IdProdus) REFERENCES proiect1.produse(IdProdus)
    )");

   $query1=mysql_query("INSERT INTO `proiect1`.`clienti` (`NumarCont`, `Nume`, `Prenume`, `DataNasterii`) VALUES ('11111111', 'Popescu', 'Ion', '2020-10-09')");
   $query2=mysql_query("INSERT INTO `proiect1`.`clienti`(`NumarCont`, `Nume`, `Prenume`, `DataNasterii`) VALUES ('22222222','Georgescu','Andreea','1983-08-23')");
   $query3=mysql_query("INSERT INTO  `proiect1`.`clienti`(`NumarCont`, `Nume`, `Prenume`, `DataNasterii`) VALUES ('33333333','Ionescu','Robert','1982-03-08')");
   $query4=mysql_query("INSERT INTO  `proiect1`.`produse`(`IdProdus`, `Produs`, `Garantie`, `Stoc`, `ValoareUnitara`) VALUES (1,'Fujitsu Siemens Amilo Pro',1,10,2000)"); 
   $query5=mysql_query("INSERT INTO  `proiect1`.`produse`(`IdProdus`, `Produs`, `Garantie`, `Stoc`, `ValoareUnitara`) VALUES (2,'Indesit WLI1000',3,5,900)"); 
   $query6=mysql_query("INSERT INTO  `proiect1`.`produse`(`IdProdus`, `Produs`, `Garantie`, `Stoc`, `ValoareUnitara`) VALUES (3,'Gorenje RC400',3,4,1500)"); 
  
   //procedura stocata

   if($query7=mysql_query("CREATE PROCEDURE `vinde_produs`(IN `IdProdus` INT(11), IN `Cantitate` INT(11), IN `NumarCont` VARCHAR(8)) NOT DETERMINISTIC MODIFIES SQL DATA SQL SECURITY DEFINER insert into comenzi values(NumarCont,IdProdus,Cantitate,CURRENT_DATE)")) {}
   else {echo mysql_error($conn)."<br>"; }
   
   //trigger
   if($query_trigger=mysql_query("CREATE TRIGGER decrementareStoc AFTER INSERT ON comenzi FOR EACH ROW 
   Update `proiect1`.`produse` set produse.Stoc=produse.Stoc - NEW.Cantitate where produse.IdProdus=NEW.IdProdus")){

   }
   else echo mysql_error($conn)."<br>";
   mysql_close(); 
?>