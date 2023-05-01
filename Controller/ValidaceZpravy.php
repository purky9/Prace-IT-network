<?php
include '../Model/Model.php';

$Jmeno = (isset($_POST['Jmeno'])) ? $_POST['Jmeno'] : '';
$Prijmeni = (isset($_POST['Prijmeni'])) ? $_POST['Prijmeni'] : '';
$Vek = (isset($_POST['Vek'])) ? $_POST['Vek'] : '';
$Telefon = (isset($_POST['Telefon'])) ? $_POST['Telefon'] : '';

//tohle nahradí + znak u předvolby prázdným znakem
$Telefon = str_replace("+", "", $Telefon);
//tohle nahradí prázdný znaky "ničím", takže když mi někdo zadá tel. číslo s mezerama, tak se to uloží správně
$Telefon = preg_replace('/[\s]+/', '', $Telefon);

$OK = true;
$Chybovahlaska = 'Pojištěnec úspěšně přidán.';
$Chybovahlaska2 = '';

// kontroly jednotlivých zadaných informací
if(empty ($Jmeno ))
{
    $OK = false;
    $Chybovahlaska = 'Pojištěnec NEBYL úspěšně přidán!';
    $Chybovahlaska2 .= "<br> Vyplňte prosím kolonku Jméno.";
}
if(empty ($Prijmeni ))
{
    $OK = false;
    $Chybovahlaska = 'Pojištěnec NEBYL úspěšně přidán!';
    $Chybovahlaska2 .= "<br> Vyplňte prosím kolonku Příjmení.";
}

if(empty ($Vek ))
{
    $OK = false;
    $Chybovahlaska = 'Pojištěnec NEBYL úspěšně přidán!';
    $Chybovahlaska2 .= "<br> Vyplňte prosím kolonku Věk.";
}

else if(!is_numeric ($Vek ))
{
    $OK = false;
    $Chybovahlaska = 'Pojištěnec NEBYL úspěšně přidán!';
    $Chybovahlaska2 .= "<br> Vyplňte prosím kolonku Věk číslicemi.";
}

if(empty ($Telefon ))
{
    $OK = false;
    $Chybovahlaska = 'Pojištěnec NEBYL úspěšně přidán!';
    $Chybovahlaska2 .=  " <br> Vyplňte prosím kolonku Telefon.";
}

else if(!is_numeric ($Telefon ))
{
    $OK = false;
    $Chybovahlaska = 'Pojištěnec NEBYL úspěšně přidán!';
    $Chybovahlaska2 .= " <br> Vyplňte prosím kolonku Telefon číslicemi.";
}

$Model = new Model();

if($OK)
{
    $Telefon = preg_replace('/\D/', '', $Telefon);
    $chybazapsani = $Model->vytvorPojistence($Jmeno, $Prijmeni, $Vek, $Telefon);

    if ($chybazapsani != "") {
        $Chybovahlaska2 .= "<br> Chyba při zápisu do databáze.";
    }
}
echo "<h1>";
echo $Chybovahlaska;
echo "</h1>";

echo "<h3>";
echo $Chybovahlaska2;
echo "</h3>";
echo('            
            <form method="post" action="../View/View.php">
                
                <input type="submit" value="Zpět na stránku" />
            </form>
        ');