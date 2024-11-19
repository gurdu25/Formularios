<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message = $_POST['message'];
    $encrypted_message = base64_encode($message);  // Ejemplo de encriptado simple

    if (!$message) {
        $error = "Por favor ingresa un mensaje.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encriptar Mensaje</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Encriptar Mensaje</h1>
    <form method="POST">
        <label for="message">Mensaje:</label>
        <textarea name="message" required></textarea>

        <button type="submit">Encriptar</button>
    </form>

    <?php if (isset($error)) { ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php } ?>

    <?php if (isset($encrypted_message)) { ?>
        <p>Mensaje Encriptado: <?php echo $encrypted_message; ?></p>
    <?php } ?>

    <a href="index.php">Volver a la página principal</a>
</body>
</html>

