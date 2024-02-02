<?php

interface GestionnairePanier
{
    public static function ajouterProduit($produit, $quantite);
    public static function calculerMontantTotal();
}

class Panier implements GestionnairePanier
{
    private $produits = array();

    
    public static function ajouterProduit($produit, $quantite)
    {
        if (isset(self::$produits[$produit])) {
            self::$produits[$produit] += $quantite;
        } else {
            self::$produits[$produit] = $quantite;
        }
        echo "{$quantite} {$produit}(s) ajouté(s) au panier.\n";
    }

    public static function calculerMontantTotal()
    {
        $montantTotal = 0;

        foreach (self::$produits as $produit => $quantite) {
            
            $prixProduit = 10;
            $montantTotal += $prixProduit * $quantite;
        }

        return $montantTotal;
    }
}

$panier = new Panier();
$panier->ajouterProduit("produit1", 2);
$panier->ajouterProduit("produit2", 3);

$total = $panier->calculerMontantTotal();
echo "Montant total du panier : {$total} ";


?>