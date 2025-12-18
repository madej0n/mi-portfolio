<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nombre  = trim($_POST["nombre"] ?? "");
    $correo  = trim($_POST["correo"] ?? "");
    $mensaje = trim($_POST["mensaje"] ?? "");


    if (empty($nombre) || empty($correo) || empty($mensaje)) {
        die("❌ Todos los campos son obligatorios.");
    }

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        die("❌ El correo no es válido.");
    }

 
    $destinatario = "javier.madmar@educa.jcyl.es"; 
    $asunto = "Nuevo mensaje desde el portfolio";

    $contenido = "
    Nombre: $nombre
    Correo: $correo

    Mensaje:
    $mensaje
    ";

    $cabeceras = "From: $correo\r\n";
    $cabeceras .= "Reply-To: $correo\r\n";

    if (mail($destinatario, $asunto, $contenido, $cabeceras)) {
        echo "✅ Mensaje enviado correctamente.";
    } else {
        echo "❌ Error al enviar el mensaje.";
    }

} else {
    echo "❌ Acceso no permitido.";
}
