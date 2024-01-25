<?php

//Arquivo de configuração do sistema
//define o fuso horario
date_default_timezone_set('America/Sao_Paulo');

//dados de acesso ao banco de dados
define('DB_HOST', 'localhost');
define('DB_PORTA', '3306');
define('DB_NOME', 'posts');
define('DB_USUARIO', 'root');
define('DB_SENHA', '');

//informações do sistema
define('SITE_NOME', 'ATHORIUS');
define('SITE_DESCRICAO', 'ARTHORIUS - Tecnologias');

//urls do sistema
define('URL_PRODUCAO', 'https://unset.com.br');
define('URL_DESENVOLVIMENTO', 'http://localhost/posts');

define('URL_SITE', 'posts/');
define('URL_ADMIN', 'posts/admin/');

