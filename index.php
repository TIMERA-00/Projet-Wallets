<?php
require "controller.php";
require "repository.php";
require "validation.php";
require "services.php";


function afficherMenu(){
    echo "\n**** MENU WALLET ****\n";
    echo "1 - Créer Wallet\n";
    echo "2 - Dépôt\n";
    echo "3 - Retrait\n";
    echo "4 - Transactions\n";
    echo "0 - Quitter\n";
}

function lireChoix(){
    return (int) readline("ton hoix : ");
}
do {
    afficherMenu();
    $choix = lireChoix();
    traiterChoix($choix);

} while($choix != 0);

?>