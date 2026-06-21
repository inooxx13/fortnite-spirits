<?php
// Permet de lire et écrire la configuration
$filename = 'data.json';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // On reçoit les nouvelles valeurs et on les écrit dans data.json
    $input = file_get_contents('php://input');
    if (json_decode($input) !== null) {
        file_put_contents($filename, $input);
        echo json_encode(["status" => "saved"]);
    }
    exit;
}

// Si on charge la page, on renvoie ce qui est stocké
if (file_exists($filename)) {
    echo file_get_contents($filename);
} else {
    echo json_encode([]);
}