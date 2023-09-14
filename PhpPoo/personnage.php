<?php

class Personnage{

    public $vie=50;
    public $nom;

    public function __construct($nom) {
        $this->nom = $nom;
    }

    public function mort(){
        echo 'mort ou vivant?';
        return $this->vie == 0;
    }
}