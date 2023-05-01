<?php

class Model
{

// podle klíče poslaného z kontroleru se mi spustí buď fuknce na Vypsání informace nebo na Vytvoření pojištěnce

    public function navratSeznam()
    {

        $pripojeni = mysqli_connect('localhost', 'root', '', 'projekt');
        if (!$pripojeni) {
            echo('Nepřipojeno!' . mysqli_connect_error());
        }


        $sqlPrikaz = "SELECT * FROM pojištěnci";
        $vysledek = mysqli_query($pripojeni, $sqlPrikaz);


        $polePojistencu = array();
        while ($radek = mysqli_fetch_assoc($vysledek)) {
            $polePojistencu[] = $radek;

        }

// odpojeni databaze
        mysqli_close($pripojeni);

// Tohle pošle seznam pojištěnců zpátky

        return $polePojistencu;
    }

// tenhle post přečte informace z kontroleru, poté pomocí SQL příkazu vytvoří pojištěnce v databázi
// je to vlatně jenom most mezi kontrolerem a databází

    public function vytvorPojistence($Jmeno, $Prijmeni, $Vek, $Telefon)
    {

        $pripojeni = mysqli_connect('localhost', 'root', '', 'projekt');
        if (!$pripojeni) {
            echo('Nepřipojeno!' . mysqli_connect_error());
        }



        $sqlPrikaz = "INSERT INTO pojištěnci (ID, Jméno, Příjmení, Věk, Telefon) VALUES ('','$Jmeno', '$Prijmeni', '$Vek', '$Telefon')";

        mysqli_query($pripojeni, $sqlPrikaz);

        $chybovazprava = mysqli_error($pripojeni);

        mysqli_close($pripojeni);

        // pokud tam bude error, tak to vrátí string error (pokud tam nic není, tak to vrátí prázdný řetězec, tím pádem to ani nepoznam)

        return $chybovazprava;

    }

// nutné zavření přípojení databáze!!!!!
//mysqli_close($pripojeni);

}