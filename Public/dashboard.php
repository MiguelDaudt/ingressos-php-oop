<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Dashboard;

$verificador = new Dashboard();
$dadosUsuarios = $verificador->verificarSession();

require_once __DIR__ . '/../views/dashboard_view.php';