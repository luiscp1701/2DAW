<?php
header("Content-Type: application/json");

/**
 * Obtiene los datos de un personaje de Dragon Ball según el número ingresado.
 * 
 * @param int $numero Número del personaje en la API.
 * @return array Datos del personaje en formato JSON.
 */
function obtenerPersonaje($numero) {
    $url = "https://www.dragonballapi.com/dragonball/$numero";
    $respuesta = file_get_contents($url);
    
    if ($respuesta === FALSE) {
        return ["error" => "No se pudo obtener el personaje."];
    }

    return json_decode($respuesta, true);
}

// Verificar si se recibe un número válido
if (isset($_GET["numero"]) && is_numeric($_GET["numero"])) {
    $numero = intval($_GET["numero"]);
    echo json_encode(obtenerPersonaje($numero));
} else {
    echo json_encode(["error" => "Número no válido."]);
}
?>
