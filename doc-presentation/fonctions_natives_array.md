
---

# 📄 b_fonctions_natives_array.md (TRÈS IMPORTANT pour TON code)

```md
# Fonctions natives de tableaux dans le projet E-Wallet

## 1. Utilisation actuelle dans le projet

Dans notre projet, nous manipulons les tableaux :

- $wallets
- $transactions

Actuellement, nous utilisons des boucles `for` et `foreach`.

---

## 2. Exemple actuel (Partie A)

<?php
for($i = 0; $i < count($wallets); $i++){
    if($wallets[$i]['telephone'] == $telephone){
        return $i;
    }
}