# Fonctions anonymes, Arrow functions et Closures dans le projet E-Wallet

## 1. Utilisation dans notre projet

Dans notre projet E-Wallet, nous utilisons les fonctions anonymes principalement dans la Partie B pour :

- filtrer des wallets
- rechercher des données
- transformer des listes

---

## 2. Exemple dans le projet

Dans la recherche ou le traitement des données, on peut remplacer des boucles par des fonctions anonymes :

<?php
$result = array_filter($wallets, function($wallet) use ($telephone) {
    return $wallet['telephone'] === $telephone;
});