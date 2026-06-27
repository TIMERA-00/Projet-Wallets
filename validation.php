<?php
require_once "repository.php";

function validerMontant($montant){
    if($montant <= 0){
        return "Montant invalide";
    }
    return "ok";
}

function validerWalletExiste($telephone){
    $index = trouverWalletRepo($telephone);
    if($index == -1){
        return "Wallet introuvable";
    }
    return "ok";
}

function validerTelephone($telephone){
    $prefix = substr($telephone, 0, 2);
    $valides = ["77", "78", "76", "70", "75"];
    for($i = 0; $i < count($valides); $i++){
        if($prefix == $valides[$i]){
            return "ok";
        }
    }
    return "Téléphone invalide";
}

function validerCode($code){
    if(strlen($code) != 4){
        return "Code invalide (4 chiffres requis)";
    }
    return "ok";
}

function validerCreationWallet($nom, $telephone, $code, $solde){

    if(empty($nom)){
        return "Nom obligatoire";
    }
    $t1 = validerTelephone($telephone);
    if($t1 != "ok") return $t1;
    $t2 = validerCode($code);
    if($t2 != "ok") return $t2;
    if($solde < 0){
        return "Solde invalide";
    }
    return "ok";
}

function validerSolde($telephone, $montantTotal){
    $index = trouverWalletRepo($telephone);
    if($index == -1){
        return "Wallet introuvable";
    }
    $wallets = getWalletsRepo();
    if($wallets[$index]['solde'] < $montantTotal){
        return "Solde insuffisant";
    }
    return "ok";
}

function validerRetrait($telephone, $montant){
    $v1 = validerWalletExiste($telephone);
    if($v1 != "ok") return $v1;
    $v2 = validerMontant($montant);
    if($v2 != "ok") return $v2;
    $v3 = validerSolde($telephone, $montant);
    if($v3 != "ok") return $v3;
    return "ok";
}