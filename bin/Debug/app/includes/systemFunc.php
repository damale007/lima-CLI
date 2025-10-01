<?php
include "config/variables.php";

function incluirTemplate( string  $nombre) {
    include TEMPLATES_URL . "/${nombre}.php"; 
}

function validar($id, string $url) {
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header("Location: ${url} " );
    }

    return $id;
}

function debuguear($variable, $parar = true) {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";

    if ($parar) exit;
}

function fecha($fecha, $larga = false, $hora = false) {
    $fechaString = "";

    $meses = array("", "enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");
    $fecOrigen = explode(" ", $fecha);
    if (count($fecOrigen)>1) 
        $origen = $fecOrigen[0];
    else
        $origen = $fecha;

    $fec = explode("-", $origen);
    if ($larga)
        $fechaString = $fec[2]." de ".$meses[intval($fec[1])]." de ".$fec[0];
    else 
        $fechaString = $fec[2]." ".substr($meses[intval($fec[1])], 0, 3)." ".$fec[0];

    if ($hora) {
        if (count($fecOrigen) > 1) {
            $hor = explode(":", $fecOrigen[1]);
            if (count($hor) > 2) {
                $fechaString .= " - ".$hor[0].":".$hor[1]." h.";
            }
        }
    }

    return $fechaString;
}

function goHome(){
    go("/");
}

function go($url) {
    header('location: '.$url);
}

function dni($dni) {
    $letra = substr($dni, -1);
    $numeros = substr($dni, 0, -1);
    if ( substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra && strlen($letra) == 1 && strlen ($numeros) == 8 ){
      return true;
    }else{
      return false;
    }
}

function mandaEmail($destino, $titulo, $mensaje) {
    $cabeceras = "From: ".EMAIL_WEB . "\r\n" .
			"Reply-To: ".EMAIL_WEB. "\r\n" .
			'X-Mailer: PHP/' . phpversion();

    if (gettype($destino) == "string")
	    mail($destino, $titulo, $mensaje, $cabeceras);
    else {
        foreach($destino as $email){
            mail($email, $titulo, $mensaje, $cabeceras);
        }
    }
}

function cifrar($texto_plano) {
    $METODO_CIFRADO = 'AES-256-CBC';

    // 1. Generar un Vector de Inicialización (IV) aleatorio y seguro.
    // La longitud del IV depende del método de cifrado.
    $iv_longitud = openssl_cipher_iv_length($METODO_CIFRADO);
    $iv = openssl_random_pseudo_bytes($iv_longitud);

    // 2. Encriptar el texto plano.
    // Usamos OPENSSL_RAW_DATA para obtener la salida en formato binario crudo.
    $texto_cifrado = openssl_encrypt(
        $texto_plano,
        $METODO_CIFRADO,
        LLAVESECRETA,
        OPENSSL_RAW_DATA,
        $iv
    );

    if ($texto_cifrado === false) {
        return false; // La encriptación falló
    }

    // 3. Concatenar el IV y el texto cifrado.
    $datos_combinados = $iv . $texto_cifrado;

    // 4. Codificar el resultado combinado en Base64.
    return base64_encode($datos_combinados);
}

function descifrar($mensaje_encriptado) {
    $CIPHER = 'AES-256-CBC';

    // 1. Decodificar desde Base64 para obtener los bytes combinados.
    $datos_combinados = base64_decode($mensaje_encriptado);
    if ($datos_combinados === false) {
        // Error en la decodificación
        return false;
    }

    // 2. Extraer el IV (los primeros 16 bytes).
    // openssl_cipher_iv_length() nos da la longitud correcta para el cifrador.
    $iv_longitud = openssl_cipher_iv_length($CIPHER);
    if (strlen($datos_combinados) < $iv_longitud) {
        // Los datos son demasiado cortos para contener un IV.
        return false;
    }
    $iv = substr($datos_combinados, 0, $iv_longitud);

    // 3. Extraer el texto cifrado (el resto de los bytes).
    $texto_cifrado = substr($datos_combinados, $iv_longitud);
    if ($texto_cifrado === false || empty($texto_cifrado)) {
        // No hay datos para desencriptar.
        return false;
    }

    // 4. Desencriptar.
    $texto_plano = openssl_decrypt(
        $texto_cifrado,
        $CIPHER,
        LLAVESECRETA,
        OPENSSL_RAW_DATA, // Usamos OPENSSL_RAW_DATA ya que la entrada es binaria.
        $iv
    );

    return $texto_plano;
}

function getAccessToken(){
    require_once "Lib/vendor/autoload.php";

    $client = new Google\Client();
    $client->setAuthConfig("../includes/service-acount.json");
    $client->addScope('https://www.googleapis.com/auth/firebase.messaging');
    $accessToken = $client->fetchAccessTokenWithAssertion()["access_token"];
    
    return $accessToken;
}

function envioPush($tokens, $titulo, $message) {
    $msg = array
    (
        'message'   => $message,
        'title'     => $titulo
    );

    $accessToken = getAccessToken();

    $headers = array (
        "Authorization: Bearer ".$accessToken."",
        "content-type:application/json;UTF-8"
    );

    $ch = curl_init ();
    curl_setopt ($ch, CURLOPT_URL, 'https://fcm.googleapis.com/v1/projects/112143845108/messages:send'); 
    curl_setopt ($ch, CURLOPT_POST, true);
    curl_setopt ($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, false);

    foreach($tokens as $reg) {
        $datos["message"] = array(
            'token' => $reg,
            'data' => $msg
        );

        curl_setopt ($ch, CURLOPT_POSTFIELDS, json_encode($datos));

        $result = curl_exec ($ch);
    }
    curl_close ($ch);
}

