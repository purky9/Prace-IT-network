<?php
include '../Model/Model.php';

$Jmeno = (isset($_POST['Jmeno'])) ? $_POST['Jmeno'] : '';
$Prijmeni = (isset($_POST['Prijmeni'])) ? $_POST['Prijmeni'] : '';
$Vek = (isset($_POST['Vek'])) ? $_POST['Vek'] : '';
$Telefon = (isset($_POST['Telefon'])) ? $_POST['Telefon'] : '';

$Chybovahlaska = 'OK';



$Model = new Model();

$chybazapsani = $Model->vytvorPojistence($Jmeno, $Prijmeni, $Vek, $Telefon);

if ($chybazapsani != "")
{
    $Chybovahlaska .= "\n chyba pri zapsani do db";
}


echo $Chybovahlaska;

echo('            
            <form method="post" action="../View/View.php">
                
                <input type="submit" value="Zpět na stránku" />
            </form>
        ');