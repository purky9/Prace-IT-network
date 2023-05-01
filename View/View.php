<?php
include '../Controller/Controller.php';
include '../Controller/Formular.php';

$formular = new Formular();
$controller = new Controller();

include '../View/Header.html';
?>

<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/html.html to edit this template
-->
<html>
<head>
    <title>PojištěnciApp</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Stranka.css">
</head>


<body>

<h1>
    Pojištěnci
</h1>


<?php
$controller->nactiPojistence();
?>
<h1>
    Nový pojištěnec
</h1>
<?php
$formular->show();
?>

</body>


</html>
