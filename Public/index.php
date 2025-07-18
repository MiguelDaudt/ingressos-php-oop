<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Models\Usuario;
use App\Database;


$db = Database::conectar();

var_dump($db);

$oi = new Usuario();
$oi->oie();