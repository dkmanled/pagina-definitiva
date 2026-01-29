<?php
header('Content-Type: application/json');

// --- CONFIGURACIÓN FORMSPREE ---
$formspree_url = "https://formspree.io/f/xgvywzbq";

// --- CAPTURA DE DATOS ---
$nombre   = $_POST['nombre']   ?? '';
$email    = $_POST['email']    ?? '';
$telefono = $_POST['telefono'] ?? '';
$servicio = $_POST['servicio'] ?? '';

// --- VALIDACIÓN ---
if (empty($email)) {
    echo json_encode(['success' => false, 'message' => 'El email es obligatorio.']);
    exit;
}

// --- ENVIAR A FORMSPREE ---
$data = array(
    'nombre' => $nombre,
    'email' => $email,
    'telefono' => $telefono,
    'servicio' => $servicio,
    '_subject' => 'Nuevo Lead desde Laserman.com.ar'
);

$options = array(
    'http' => array(
        'header'  => "Content-type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($data)
    )
);

$context = stream_context_create($options);
$result = @file_get_contents($formspree_url, false, $context);

if ($result !== false) {
    echo json_encode(['success' => true, 'redirect' => '/gracias']);
} else {
    echo json_encode(['success' => false, 'message' => 'Error al enviar.']);
}
