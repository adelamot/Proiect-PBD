<?php 
   header("Location: ../index.php");
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
   else {echo mysql_error($conn)."<br>"; die(); }
   

   mysql_close(); 
?>