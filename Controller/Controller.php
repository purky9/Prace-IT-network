<?php


// načtení Model.php do controlleru

include '../Model/Model.php';

Class Controller {

// první funkce bude načítat pojištěnce

public function nactiPojistence () : void
{
        $model = new Model();
        $pojistenci = $model->navratSeznam();
   
        echo('<table border="1">');
   
        foreach ($pojistenci as $pojistenec)
        {
            echo('<tr><td>');

            echo var_dump($pojistenec);
            
            
            echo('</td></tr>');
        }
        echo('</table><br />');
   
    
    
}






//$Jmeno=$_POST ["Jmeno"];
   // $Prijmeni= $_POST ["Prijmeni"];
   // $Vek= $_POST ["Vek"];
  //  $Telefon = $_POST ["Telefon"];
    
    
}