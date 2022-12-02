<?php

// Entwicklung PDO::ERRMODE_EXCEPTION und live PDO::ERRMODE_SILENT
$optionen = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
];

$pdo = new PDO(
    'mysql:host=localhost;dbname=audax_test', // neue DB!
    'root',
    '', // leeres Kennwort
    $optionen
);

$pdo->query('SET NAMES utf8');
