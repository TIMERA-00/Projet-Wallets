<?php
require_once "repository.php";

function ajouterWalletService($wallet){
    ajouterWalletRepo($wallet);
}

function depotService($telephone, $montant){
    if($montant <= 0){
        echo "Montant invalide\n";
        return;
    }
    $index = trouverWalletRepo($telephone);
    if($index == -1){
        echo "Wallet introuvable\n";
        return;
    }
    deposerRepo($index, $montant);
    ajouterTransactionRepo(["type" => "depot", "montant" => $montant, "index" => $index]);
}

function retraitService($telephone, $montant){

    if($montant <= 0){
        echo "Montant invalide\n";
        return;
    }

    $index = trouverWalletRepo($telephone);

    if($index == -1){
        echo "Wallet introuvable\n";
        return;
    }

    if($montant <= 10000){
        $frais = 200;
    }
    else if($montant <= 100000){
        $frais = 500;
    }
    else{
        $frais = $montant * 0.01;

        if($frais > 5000){
            $frais = 5000;
        }
    }

    $total = $montant + $frais;

    $ok = retirerRepo($index, $total);

    if(!$ok){
        echo "Solde insuffisant\n";
        return;
    }

    ajouterTransactionRepo([
        "type" => "retrait",
        "montant" => $montant,
        "frais" => $frais,
        "index" => $index
    ]);
}

function afficherTransactionsService(){

    $transactions = getTransactionsRepo();
    $wallets = getWalletsRepo();
    foreach($transactions as $t){
        $client = $wallets[$t["index"]]["client"];
        echo "\nClient : $client";
        echo "\nType : " . $t["type"];
        echo "\nMontant : " . $t["montant"];
        if(isset($t["frais"])){
            echo "\nFrais : " . $t["frais"];
        }
        echo "\n************\n";
    }
}