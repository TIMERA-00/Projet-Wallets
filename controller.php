<?php
require_once "services.php";

function traiterChoix($choix){
    if($choix == 1){
        creerWalletController();
    }
    else if($choix == 2){
        depotController();
    }
    else if($choix == 3){
        retraitController();
    }
    else if($choix == 4){
        afficherTransactionsController();
    }
    else if($choix == 0){
        echo "Quitter\n";
    }
    else{
        echo "Choix invalide\n";
    }
}