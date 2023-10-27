<?php
class Conexion{
	static public function conectar(){
		$link = new PDO("mysql:host=localhost;dbname=u895534236_inscripciones", 
	                  "u895534236_ocontreras", 
	                  "fjz6GG5l7ly{");

	    $link->exec("set names utf8");

	    return $link;
	}
}
