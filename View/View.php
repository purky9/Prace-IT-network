<?php
include '../Controller/Controller.php';
include '../Controller/Formular.php';
$formular = new Formular();
$controller = new Controller();
?>

<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/html.html to edit this template
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
       
        <div>TODO write content</div>
    </body>
    
    <?php
    
    $controller->nactiPojistence();
    $formular->show();
    
    ?>


</html>
