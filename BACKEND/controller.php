<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

	function optionsCatalogue (Request $request, Response $response, $args) {
	    
	    // Evite que le front demande une confirmation à chaque modification
	    $response = $response->withHeader("Access-Control-Max-Age", 600);
	    
	    return addHeaders ($response);
	}

	function hello(Request $request, Response $response, $args) {
	    $array = [];
	    $array ["nom"] = $args ['name'];
	    $response->getBody()->write(json_encode ($array));
	    return $response;
	}
	
	function  getSearchCalatogue (Request $request, Response $response, $args) {
	    $flux = '[{"titre":"linux","ref":"001","prix":"20"},{"titre":"java","ref":"002","prix":"21"},{"titre":"windows","ref":"003","prix":"22"},{"titre":"angular","ref":"004","prix":"23"},{"titre":"unix","ref":"005","prix":"25"},{"titre":"javascript","ref":"006","prix":"19"},{"titre":"html","ref":"007","prix":"15"},{"titre":"css","ref":"008","prix":"10"}]';
		
	   $response->getBody()->write($flux);
	   
	    return addHeaders ($response);
	}

	// API Nécessitant un Jwt valide
	function getCatalogue (Request $request, Response $response, $args) {
	    $flux = '[
			{
			  "id": 1,
			  "nom": "iPhone 13 Pro",
			  "description": "Le dernier smartphone d\'Apple avec une superbe caméra et un écran OLED.",
			  "prix": 999.99,
			  "categorie": "Téléphones"
			},
			{
			  "id": 2,
			  "nom": "Samsung Galaxy S21",
			  "description": "Un smartphone Android puissant avec un écran dynamique et une caméra avancée.",
			  "prix": 799.99,
			  "categorie": "Téléphones"
			},
			{
			  "id": 3,
			  "nom": "MacBook Air",
			  "description": "L\'ordinateur portable ultraléger d\'Apple avec une puce M1 et une autonomie exceptionnelle.",
			  "prix": 1199.99,
			  "categorie": "Ordinateurs portables"
			},
			{
			  "id": 4,
			  "nom": "Sony PlayStation 5",
			  "description": "La console de jeu de nouvelle génération avec des graphismes époustouflants et une grande bibliothèque de jeux.",
			  "prix": 499.99,
			  "categorie": "Jeux vidéo"
			},
			{
			  "id": 5,
			  "nom": "Apple Watch Series 7",
			  "description": "Une montre intelligente élégante avec un grand écran et des fonctionnalités de santé avancées.",
			  "prix": 349.99,
			  "categorie": "Montres connectées"
			},
			{
			  "id": 6,
			  "nom": "Sony 4K Ultra HD Smart TV",
			  "description": "Une télévision 4K de qualité avec un écran dynamique et des applications intégrées.",
			  "prix": 799.99,
			  "categorie": "Télévisions"
			},
			{
			  "id": 7,
			  "nom": "Canon EOS 5D Mark IV",
			  "description": "Un appareil photo DSLR professionnel avec une qualité d\'image exceptionnelle.",
			  "prix": 2499.99,
			  "categorie": "Appareils photo"
			},
			{
			  "id": 8,
			  "nom": "Dyson V11 Absolute",
			  "description": "Un aspirateur sans fil puissant avec une filtration avancée.",
			  "prix": 599.99,
			  "categorie": "Électroménager"
			},
			{
			  "id": 9,
			  "nom": "Bose QuietComfort 35 II",
			  "description": "Des écouteurs à réduction de bruit de première qualité pour une expérience sonore exceptionnelle.",
			  "prix": 299.99,
			  "categorie": "Écouteurs"
			},
			{
			  "id": 10,
			  "nom": "Samsung 49-Inch Odyssey G9",
			  "description": "Un écran de jeu incurvé ultralarge pour une expérience de jeu immersive.",
			  "prix": 1499.99,
			  "categorie": "Moniteurs"
			},
			{
			  "id": 11,
			  "nom": "Google Pixel 6",
			  "description": "Un smartphone Android haut de gamme avec une caméra avancée et une interface fluide.",
			  "prix": 899.99,
			  "categorie": "Téléphones"
			},
			{
			  "id": 12,
			  "nom": "HP Spectre x360",
			  "description": "Un ordinateur portable convertible élégant avec un écran tactile et de bonnes performances.",
			  "prix": 1299.99,
			  "categorie": "Ordinateurs portables"
			},
			{
			  "id": 13,
			  "nom": "Xbox Series X",
			  "description": "La console de jeu de nouvelle génération de Microsoft avec une puissance de traitement incroyable.",
			  "prix": 599.99,
			  "categorie": "Jeux vidéo"
			},
			{
			  "id": 14,
			  "nom": "Fitbit Versa 3",
			  "description": "Une montre de fitness intelligente avec suivi avancé de la santé et de la condition physique.",
			  "prix": 199.99,
			  "categorie": "Montres connectées"
			},
			{
			  "id": 15,
			  "nom": "LG OLED 4K Smart TV",
			  "description": "Une télévision OLED 4K avec des noirs parfaits et une excellente qualité d\'image.",
			  "prix": 1499.99,
			  "categorie": "Télévisions"
			}
		]';
	    
	    $response->getBody()->write($flux);
	    
	    return addHeaders ($response);
	}

	function optionsUtilisateur (Request $request, Response $response, $args) {
	    
	    // Evite que le front demande une confirmation à chaque modification
	    $response = $response->withHeader("Access-Control-Max-Age", 600);
	    
	    return addHeaders ($response);
	}

	// API Nécessitant un Jwt valide
	function getUtilisateur (Request $request, Response $response, $args) {
	    
	    $payload = getJWTToken($request);
	    $login  = $payload->userid;
	    
		$flux = '{"nom":"SKYWALKER","prenom":"Anakin"}';
	    
	    $response->getBody()->write($flux);
	    
	    return addHeaders ($response);
	}

	// APi d'authentification générant un JWT
	function postLogin (Request $request, Response $response, $args) {   
	    
		$flux = '{"nom":"SKYWALKER","prenom":"Anakin"}';
		$body = $request->getParsedBody();
		
	    $login = $body['login'];
	    $password = $body['password'];
	    
	    if ($login == "emma" && $password == "toto") 
		{ 
			$response = createJwT($response);
			$response->getBody()->write($flux);
	    }
	    else 
		{
	        $response = $response->withStatus(401);
	    }
	    
	    return addHeaders ($response);
	}

