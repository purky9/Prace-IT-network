<?php

class Model {
    


// soubor Model slouží k připojení databáze a zisku dat o pojištěncích

// připojení k databázi, kde mám vypsané informace: ID, Jméno, Příjmení, Věk a Telefon

/* mysqli_connect fuknce se připojuje přes: 
 * hostname ('localhost' ,protože je to u mě na počítači), 
 * root ('root' = defaultní hodnota pro připojení k localhostu), 
 * password (nepotřebuju - zůstane prázdné), 
 * database (jméno databáze)
*/

//          $pripojeni = mysqli_connect('localhost', 'root','', 'projekt'); 



// tahle funkce mi zkontroluje, zda se to vůbec připojilo k databázi
// když ne, vypíše mi to Nepřipojeno plus se mi za to napíše proč
// mysqli_connect_error je funkce, která vrací error při připojení

//      if (!$pripojeni) {
 //         echo ('Nepřipojeno!' . mysqli_connect_error());
//          }



// podle klíče poslaného z kontroleru se mi spustí buď fuknce na Vypsání informace nebo na Vytvoření pojištěnce



public function navratSeznam () {
    
   $pripojeni = mysqli_connect('localhost', 'root','', 'projekt');   
   if (!$pripojeni) {
          echo ('Nepřipojeno!' . mysqli_connect_error());
    }
          
// definuju string, který obsahuje SQL příkaz (existuje SQL jazyk), který když si databáze přečte, tak mi vrátí nějakou inforamci
// všechny databáze umí SQL jazyk
// znak "*" znamená "všechny" v SQL
// $sqlPrikaz je proměnná, která vybere všechny data z tabulky pojištenci
// $vysledek je proměnná, která mi pomocí funkce mysqli_query vrátí výsledek volání
    // potřebuje nejdřív parametr pro připojení ($pripojeni), a pak parametr, který určí, co má dělat ($sqlPrikaz)

    
     $sqlPrikaz = "SELECT * FROM pojištěnci";
 $vysledek = mysqli_query($pripojeni, $sqlPrikaz);
 echo var_dump ($vysledek); 
 
 
 
 
     // vytvořím si řadu polePojistencu
 // while dělá, že php bude načítat řádky do pole z výsledku volání do databáze, dokud tam nějaké řádky budou
 // mysqli_fetch_assoc dělá, že vždycky vezme další řádku z výsledku
 
 
$polePojistencu = array ();
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

public function vytvorPojistence ($Jmeno, $Prijmeni, $Vek, $Telefon) { 
    
     $pripojeni = mysqli_connect('localhost', 'root','', 'projekt');   
   if (!$pripojeni) {
          echo ('Nepřipojeno!' . mysqli_connect_error());
    }
    
    $sqlPrikaz = "INSERT INTO pojištěnci (ID, Jméno, Příjmení, Věk, Telefon) VALUES ('','$Jmeno', '$Prijmeni', '$Vek', '$Telefon')";
    
    mysqli_query ($pripojeni, $sqlPrikaz); 

    $chybovazprava = mysqli_error($pripojeni);

    mysqli_close($pripojeni);
    

        // pokud tam bude error, tak to vrátí string error (pokud tam nic není, tak to vrátí prázdný řetězec, tím pádem to ani nepoznam)

    return $chybovazprava;
    
}



// nutné zavření přípojení databáze!!!!!

//mysqli_close($pripojeni);

}