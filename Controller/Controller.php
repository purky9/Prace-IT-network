<?php


// načtení Model.php do controlleru

include '../Model/Model.php';

//Definice classy Controller

Class Controller {

// první funkce bude vypisovat tabulku pojištěnců

public function nactiPojistence () : void
{
        $model = new Model();
        
        
        
        // získání seznamu pojištěnců z Modelu 
        
        $pojistenci = $model->navratSeznam();
        
        //definice tabulky v html
   
        echo('<table border="1">');
   
        //foreach mi zajistí, že pro každého pojištěnce (tzn. pro každou řádku) něco udělá
        
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