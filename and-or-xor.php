<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $a = isset($_POST['a']) ? (bool)$_POST['a'] : null;
    $b = isset($_POST['b']) ? (bool)$_POST['b'] : null;
    
    if (is_null($a) || is_null($b)) {
        $error = "Por favor, ingrese dos valores (0 o 1).";
    } else {
        $and_result = $a && $b;
        $or_result = $a || $b;
        $xor_result = $a != $b;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puertas Lógicas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Operaciones con Puertas Lógicas (AND, OR, XOR)</h1>
    <form method="POST">
        <label for="a">Valor A (0 o 1):</label>
        <input type="number" name="a" min="0" max="1" required>
        
        <label for="b">Valor B (0 o 1):</label>
        <input type="number" name="b" min="0" max="1" required>

        <button type="submit">Calcular</button>
    </form>

    <?php if (isset($error)) { ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php } ?>

    <?php if (isset($and_result)) { ?>
        <p>Resultado de AND: <?php echo $and_result ? 'Verdadero' : 'Falso'; ?></p>
        <p>Resultado de OR: <?php echo $or_result ? 'Verdadero' : 'Falso'; ?></p>
        <p>Resultado de XOR: <?php echo $xor_result ? 'Verdadero' : 'Falso'; ?></p>
    <?php } ?>

    <a href="index.html">Volver a la página principal</a>
</body>
</html>