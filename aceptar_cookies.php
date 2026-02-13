<?php
session_start();
require_once __DIR__ . "/cookie_manager.php";

$accion = $_POST['accion'] ?? 'aceptar';

if ($accion === 'denegar') {
    CookieManager::denegarCookies();
} else {
    CookieManager::aceptarCookies();
}

echo json_encode(['success' => true]);
?>