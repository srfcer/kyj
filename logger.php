<?php
// Obtener IP del cliente
function getIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

// Obtener User-Agent
$userAgent = $_SERVER['HTTP_USER_AGENT'] ?? 'Desconocido';

// Detectar sistema operativo
function getOS($userAgent) {
    if (preg_match('/windows/i', $userAgent)) return 'Windows';
    if (preg_match('/android/i', $userAgent)) return 'Android';
    if (preg_match('/iphone/i', $userAgent)) return 'iPhone';
    if (preg_match('/ipad/i', $userAgent)) return 'iPad';
    if (preg_match('/macintosh|mac os x/i', $userAgent)) return 'MacOS';
    if (preg_match('/linux/i', $userAgent)) return 'Linux';
    return 'Desconocido';
}

// Detectar navegador
function getBrowser($userAgent) {
    if (preg_match('/chrome/i', $userAgent)) return 'Chrome';
    if (preg_match('/firefox/i', $userAgent)) return 'Firefox';
    if (preg_match('/safari/i', $userAgent)) return 'Safari';
    if (preg_match('/edge/i', $userAgent)) return 'Edge';
    if (preg_match('/opera/i', $userAgent)) return 'Opera';
    return 'Desconocido';
}

$ip = getIP();
$os = getOS($userAgent);
$browser = getBrowser($userAgent);
$date = date("Y-m-d H:i:s");

// Registrar en archivo
$log = "$date | IP: $ip | SO: $os | Browser: $browser | UA: $userAgent" . PHP_EOL;

file_put_contents("access_log.txt", $log, FILE_APPEND);

// Opcional: mostrar algo
echo "Acceso registrado correctamente.";
?>
``
