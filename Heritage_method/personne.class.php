<?php

// Définition de classe Personne
abstract class Personne {

    // Propriétés spécifiques de la classe Personne
    protected $numero;
    protected $nom;
    protected $prenom;
    protected $heureSup;
    protected $salaireHoraire;

    // Constructeur de la classe Personne
    public function __construct($numero, $nom, $prenom, $heureSup, $salaireHoraire){
        $this->numero = $numero;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->heureSup = $heureSup;
        $this->salaireHoraire = $salaireHoraire;
    }

    // La fonction magique pour accéder aux valeurs d'attributs
    public function __get($attr){
        if(property_exists($this, $attr)){
            return $this->$attr;
        }
        else{
            echo 'Attribut ' . $attr . ' n\'existe pas';
        }
    }

    // La fonction magique pour modifier les valeurs d'attributs
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

    // Méthode abstraite pour calculer le salaire
    abstract public function CalculeSalaire();

    // Méthode magique pour convertir l'objet en chaîne de caractères
    public function __toString(){
        return $this->numero . ' ' . strtoupper($this->nom);
    }
}
