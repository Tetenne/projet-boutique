<?php
// Projet : Gestion de stock d'une Boutique


// 1. Initialisation du stock
$articles = ["Chaussettes", "T-shirts", "Chaussures", "Pantalon", "Pull"];
$quantites = [10, 5, 8, 3, 12];
$ventes = [0, 0, 0, 0, 0];


// Affichage des articles disponibles avec une boucle for
echo "Liste des articles disponibles:\n";
for ($i = 0; $i < count($articles); $i++) {
    echo "$i: $articles[$i]\n";
}


// Affichage des articles disponibles avec une boucle foreach
echo "\n Liste des articles disponible :\n";
foreach ($articles as $index => $article) {
    echo "$index: $article\n";
}


// 2. Gestion des Stocks
echo "\nListe des articles avec leur quantité en stock :\n";
for ($i = 0; $i < count($articles); $i++) {
    echo "$articles[$i] - Stock: $quantites[$i]\n";
}


// 3. Réalisation d'une Vente
$index = intval(readline("Choisir un article par son index:"));
$qtevendue = intval(readline("Quantité vendue :"));




if ($index >= 0 and $index < count($articles)) {
    echo "Quantité à vendre : ";
    if ($quantites[$index] >= $qtevendue) {
        $quantites[$index] -= $qtevendue;
        echo "Vente confirmée : $qtevendue $articles[$index] vendus.\n";
    } else {
        echo "Stock insuffisant pour $articles[$index].\n";
    }
} else {
    echo "Index invalide.\n";
}


// 4. Réapprovisionnement du Stock
echo "Quel article voulez vous restocker ? : \n";
for ($i = 0; $i < count($articles); $i++) {
    echo "$i: $articles[$i] - Quantité : $quantites[$i]\n";
}
$index = intval(readline("Choisissez l'index de l'article que vous voulez restocker : "));
$quantiteReaprovisionne = intval(readline("Quantité à réapprovisionner : "));
$quantites[$index] += $quantiteReaprovisionne;
echo "Réapprovisionnement confirmé : $quantiteReaprovisionne $articles[$index]\n";


// 5. Synthèse et Affichage du Stock
echo "\n stock restant :\n";
for ($i = 0; $i < count($articles); $i++) {
    echo "$articles[$i] - Quantité restante : $quantites[$i] \n";
    if ($quantites[$i] == 0) {
        echo "$articles[$i] est en rupture de stock !\n";
        $stockvalide = false;
    }
}


// 6. Suivi des Ventes Totales par Article
echo "\n Suivi des ventes par article :\n";


for ($i = 0; $i < count($articles); $i++) {
    // Affichage de chaque article avec la quantité vendue
    echo "$articles[$i] - Quantité vendue : $ventes[$i] \n";
}


// Affichage des ventes totales par article
echo "\nVentes totales par article :\n";
foreach ($articles as $index => $article) {
    echo "$article - Ventes totales : $ventes[$index]\n";
}
// 7. Suppression d'un Article
$index = intval(readline("Choisir un article a supprimer:"));
if ($index >= 0 and $index < count($articles)) {
    unset($articles[$index]);
    unset($quantites[$index]);
    unset($vente[$index]);
    $articles = array_values($articles);
    $quantites = array_values($quantites);
    echo "Article supprimé avec succès.\n";
} else {
    echo "Index invalide.\n";
}




// Affichage des articles restants
echo "\nListe des articles restants :\n";
foreach ($articles as $index => $article) {
    echo "$index: $article - Stock: " . $quantites[$index] . "\n";
}
