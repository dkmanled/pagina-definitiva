<?php
header('Content-Type: application/json');

// --- CONFIGURACIÓN ---
$destinatario = "TU-EMAIL-AQUI@GMAIL.COM"; // <--- CAMBIA ESTO
$asunto = "Nuevo Lead desde Laserman.com.ar";

// --- CAPTURA DE DATOS ---
$nombre   = $_POST['nombre']   ?? 'Sin nombre';
$email    = $_POST['email']    ?? 'Sin email';
$telefono = $_POST['telefono'] ?? 'Sin telefono';
$servicio = $_POST['servicio'] ?? 'No especificado';

// --- VALIDACIÓN BÁSICA ---
if (empty($email) || $email == 'Sin email') {
    echo json_encode(['success' => false, 'message' => 'El email es obligatorio.']);
    exit;
}

// --- CUERPO DEL MENSAJE ---
$cuerpo = "Has recibido una nueva consulta desde la web:\n\n";
$cuerpo .= "Nombre: $nombre\n";
$cuerpo .= "Email: $email\n";
$cuerpo .= "WhatsApp: $telefono\n";
$cuerpo .= "Servicio: $servicio\n";
$cuerpo .= "Fecha: " . date('d/m/Y H:i:s') . "\n";

// --- CABECERAS ---
$headers = "From: web@laserman.com.ar\r\n";
$headers .= "Reply-To: $email\r\n";

// --- ENVÍO ---
if (mail($destinatario, $asunto, $cuerpo, $headers)) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Error al enviar el correo.']);
}
