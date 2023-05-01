<?php


// načtení Model.php do controlleru

include '../Model/Model.php';
include '../Controller/VypisTabulky.php';

class Controller
{

// první funkce bude vypisovat tabulku pojištěnců

    public function nactiPojistence(): void
    {
        $model = new Model();
        $tabulka = new Tabulka();

        // získání seznamu pojištěnců z Modelu 

        $pojistenci = $model->navratSeznam();

        $tabulka->show($pojistenci);
    }

}