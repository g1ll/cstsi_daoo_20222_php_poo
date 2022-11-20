<?php

use Daoo\Aula03\controller\Route;
use Daoo\Aula03\controller\api\Produto;
// use Daoo\Aula03\controller\api\Usuario;

Route::routes([
	'produto' => Produto::class,
	// 'usuario' => Usuaraio::class
]);

//api:
// composer run api
//http://localhost:8081/classe/metodo/parametro
//http://localhost:8081/produto/show/111

// composer run test
//http://localhost:8081/showProduto.php?id=111