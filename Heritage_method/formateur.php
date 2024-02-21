<?php

include 'personne.class.php'; // Inclure la classe Personne

// Définition de la classe Formateur qui hérite de la classe Personne
class Formateur extends Personne {

    // Propriétés spécifiques à la classe Formateur
    private $SalaireFix;
    private $niveau;

    // Constructeur de la classe Formateur
    public function __construct($num, $no, $pre, $sh, $hs, $salF, $niv){
        // Appel du constructeur de la classe parente (Personne)
        parent::__construct($num, $no, $pre, $sh, $hs);

        // Initialisation des propriétés spécifiques à Formateur
        $this->SalaireFix = $salF;
        $this->niveau = $niv;
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

    // Méthode pour calculer le salaire en fonction du grade de diplôme
    public function CalculeSalaire(){

        switch ($this->diplome){
            case "1er grade":
                $this->salaireHoraire = 120;
                break;
            case "2eme grade":
                $this->salaireHoraire = 90;
                break;
            case "3eme grade":
                $this->salaireHoraire = 60;
                break;
            default:
                echo "Grade de diplôme non reconnu.";
            
        }
    }
}
