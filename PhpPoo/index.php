<?php
require("personnage.php");

$moussa = new Personnage("Moussa");
$moussa->vie=10;
var_dump($moussa->mort());