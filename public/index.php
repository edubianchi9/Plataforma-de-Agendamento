<?php
require 'routes/router.php';

// Registrar rotas
route('/', function() {
    echo "Bem-vindo à página inicial!";
});

route('/sobre', function() {
    echo "Esta é a página sobre.";
});

route('/contato', function() {
    echo "Página de contato.";
});

// Obter o caminho solicitado (remover parâmetros de consulta se houver)
$requestedPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Disparar a rota correspondente
dispatch($requestedPath);