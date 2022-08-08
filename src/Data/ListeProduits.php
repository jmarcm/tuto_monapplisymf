<?php

namespace App\Data;

class ListeProduits {

    static $mesProduits = [
        ['nom' => "Imprimantes", 'prix' => 700, 'quantite' => 10, 'rupture' => false],
        ['nom' => "Cartouches d'encre", 'prix' => 80, 'quantite' => 50, 'rupture' => false],
        ['nom' => "Ordinateurs", 'prix' => 1700, 'quantite' => 3, 'rupture' => false],
        ['nom' => "Ecrans", 'prix' => 500, 'quantite' => 100, 'rupture' => false],
        ['nom' => "Claviers", 'prix' => 100, 'quantite' => 10, 'rupture' => true],
        ['nom' => "Souris", 'prix' => 5, 'quantite' => 200, 'rupture' => false]
    ];
}
