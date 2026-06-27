<?php

$wallets = [];
$transactions = [];

function ajouterWalletRepo($wallet){
    global $wallets;
    $wallets[] = $wallet;
}

function getWalletsRepo(){
    global $wallets;
    return $wallets;
}

function ajouterTransactionRepo($transaction){
    global $transactions;
    $transactions[] = $transaction;
}

function getTransactionsRepo(){
    global $transactions;
    return $transactions;
}

function trouverWalletRepo($telephone){
    global $wallets;
    for($i = 0; $i < count($wallets); $i++){
        if($wallets[$i]['telephone'] == $telephone){
            return $i;
        }
    }
    return -1;
}

function deposerRepo($index, $montant){
    global $wallets;
    $wallets[$index]['solde'] += $montant;
}

function retirerRepo($index, $montantTotal){
    global $wallets;
    if($wallets[$index]['solde'] < $montantTotal){
        return false;
    }
    $wallets[$index]['solde'] -= $montantTotal;
    return true;
}