<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $encrypted_message = $_POST['encrypted_message'];
    $decrypted_message = base64_decode($encrypted_message);

    if (!$encrypted_message) {
        $error = "Por favor ingresa un mensaje encriptado.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desencriptar Mensaje</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Desencriptar Mensaje</h1>
    <form method="POST">
        <label for="encrypted_message">Mensaje Encriptado:</label>
        <textarea name="encrypted_message" required></textarea>

        <button type="submit">Desencriptar</button>
    </form>

    <?php if (isset($error)) { ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php } ?>

    <?php if (isset($decrypted_message)) { ?>
        <p>Mensaje Desencriptado: <?php echo $decrypted_message; ?></p>
    <?php } ?>

    <a href="index.php">Volver a la página principal</a>
</body>
</html>