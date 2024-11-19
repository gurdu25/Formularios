<?php
function calculateStatistics($numbers) {
    sort($numbers);
    $mean = array_sum($numbers) / count($numbers);

    $counts = array_count_values($numbers);
    $mode = array_search(max($counts), $counts);

    $middle = floor(count($numbers) / 2);
    if (count($numbers) % 2) {
        $median = $numbers[$middle];
    } else {
        $median = ($numbers[$middle - 1] + $numbers[$middle]) / 2;
    }

    return ['mean' => $mean, 'mode' => $mode, 'median' => $median];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $numbers = array_map('intval', explode(',', $_POST['numbers']));

    if (count($numbers) < 5) {
        $error = "Por favor ingresa al menos 5 números.";
    } else {
        $stats = calculateStatistics($numbers);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadísticas</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Calcular Media, Moda y Mediana</h1>
    <form method="POST">
        <label for="numbers">Introduce los 5 números (separados por coma):</label>
        <input type="text" name="numbers" required>

        <button type="submit">Calcular</button>
    </form>

    <?php if (isset($error)) { ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php } ?>

    <?php if (isset($stats)) { ?>
        <p>Media: <?php echo $stats['mean']; ?></p>
        <p>Moda: <?php echo $stats['mode']; ?></p>
        <p>Mediana: <?php echo $stats['median']; ?></p>
    <?php } ?>

    <a href="index.php">Volver a la página principal</a>
</body>
</html>