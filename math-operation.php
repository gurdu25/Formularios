<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $num1 = isset($_POST['num1']) ? (float)$_POST['num1'] : null;
    $num2 = isset($_POST['num2']) ? (float)$_POST['num2'] : null;
    $operation = $_POST['operation'];

    if (is_null($num1) || is_null($num2)) {
        $error = "Por favor, ingresa dos números.";
    } else {
        switch ($operation) {
            case 'suma':
                $result = $num1 + $num2;
                break;
            case 'resta':
                $result = $num1 - $num2;
                break;
            case 'multiplicacion':
                $result = $num1 * $num2;
                break;
            case 'division':
                if ($num2 == 0) {
                    $error = "No se puede dividir por cero.";
                } else {
                    $result = $num1 / $num2;
                }
                break;
            default:
                $error = "Operación no válida.";
                break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operación Matemática</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Operación Matemática</h1>
    <form method="POST">
        <label for="num1">Número 1:</label>
        <input type="number" name="num1" step="any" required>

        <label for="num2">Número 2:</label>
        <input type="number" name="num2" step="any" required>

        <label for="operation">Operación:</label>
        <select name="operation" required>
            <option value="suma">Suma</option>
            <option value="resta">Resta</option>
            <option value="multiplicacion">Multiplicación</option>
            <option value="division">División</option>
        </select>

        <button type="submit">Calcular</button>
    </form>

    <?php if (isset($error)) { ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php } ?>

    <?php if (isset($result)) { ?>
        <p>Resultado: <?php echo $result; ?></p>
    <?php } ?>

    <a href="index.php">Volver a la página principal</a>
</body>
</html>