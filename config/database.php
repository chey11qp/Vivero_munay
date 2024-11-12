<?php
require_once __DIR__ . '/../vendor/autoload.php';
//$mongoClient = new MongoDB\Client("mongodb+srv://dsi4:XyQXm8b_secFkh@@cluster0.u4egz.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0");
$mongoClient = new MongoDB\Client("mongodb://localhost:27017/");
$database = $mongoClient->selectDatabase('RESTAURANT');
$ClienteCollection = $database->Cliente;
$ProductoCollection = $database->Producto;