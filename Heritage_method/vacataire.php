<?php

include 'personne.class.php'; // Inclure la classe Personne

// Définition de la classe Vacataire qui hérite de la classe Personne
class Vacataire extends Personne {

    // Propriété spécifique à la classe Vacataire
    private $diplome;

    // Constructeur de la classe Vacataire
    public function __construct($num, $nom, $pren, $hs, $sh, $dip){
        // Appel du constructeur de la classe parente (Personne)
        parent::__construct($num, $nom, $pren, $hs, $sh);

        // Initialisation de la propriété spécifique à Vacataire
        $this->diplome = $dip;
    }

    // La méthode magique __get pour accéder aux valeurs d'attributs
    public function __get($attr){
        if(property_exists($this, $attr)){
            return $this->$attr;
        }
        else{
            echo 'Attribut ' . $attr . ' n\'existe pas';
        }
    }

    // La méthode magique __set pour modifier les valeurs d'attributs
    public function __set($attr, $value){
        if ($attr !== 'numero'){
            if (property_exists($this, $attr)){
                $this->$attr = $value;
            }
            else{
                echo 'Attribut ' . $attr . ' n\'existe pas';
            }
        }
    }
}
