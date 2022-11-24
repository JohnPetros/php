<?php

/**
 * Caminhos de diretórios
 */
define('BASEDIR', DIRNAME(__FILE__) . '/../');

define('VIEWS', DIRNAME(__FILE__) . '/View/modules/');

// echo BASEDIR;
// echo "<hr>";
// echo DIRNAME(__FILE__) . '/View/modules';
// echo "<hr>";

/**
 * Dados de conexão ao Banco de Dados
 */
 $_ENV['db']['host'] = 'localhost:3306';
 $_ENV['db']['user'] = 'root';
 $_ENV['db']['password'] = '';
 $_ENV['db']['database'] = 'db_mvc';