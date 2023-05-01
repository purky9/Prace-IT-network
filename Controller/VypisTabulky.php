<?php

class Tabulka
{
    public function show($results)
    {


        echo "<table>";
        echo "<tr><th>ID</th><th>Jméno</th><th>Příjmení</th><th>Věk</th><th>Telefon</th></tr>";

        foreach ($results as $result) {

            echo "<tr>";
            echo "<td>" . $result['ID'] . "</td>";
            echo "<td>" . $result['Jméno'] . "</td>";
            echo "<td>" . $result['Příjmení'] . "</td>";
            echo "<td>" . $result['Věk'] . "</td>";
            echo "<td>" . $result['Telefon'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}