<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $description = $_POST['description'];
    $photo = $_FILES['photo'];
    $options = isset($_POST['options']) ? $_POST['options'] : [];
    $hobbies = isset($_POST['hobbies']) ? $_POST['hobbies'] : [];

    
    if (empty($name) || empty($email) || empty($address) || empty($description) || empty($photo['name'])) {
        $error = "Todos los campos son obligatorios.";
    } elseif (strlen($description) > 200) {
        $error = "La descripción no puede ser mayor a 200 caracteres.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "El correo electrónico no es válido.";
    } elseif ($photo['size'] > 500000) { 
        $error = "La imagen es demasiado grande.";
    } else {
        
        $upload_dir = 'uploads/';
        $photo_path = $upload_dir . basename($photo['name']);
        if (move_uploaded_file($photo['tmp_name'], $photo_path)) {
           
            $success = "¡Te has registrado exitosamente!";
        } else {
            $error = "Error al cargar la imagen.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Inscripción</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Formulario de Inscripción</h1>

    <?php if (isset($error)) { ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php } ?>

    <?php if (isset($success)) { ?>
        <p style="color: green;"><?php echo $success; ?></p>
    <?php } ?>

    <form method="POST" enctype="multipart/form-data">
        
        <label for="name">Nombre:</label>
        <input type="text" name="name" value="<?php echo isset($name) ? $name : ''; ?>" required>

       
        <label for="email">Correo Electrónico:</label>
        <input type="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>" required>

       
        <label for="address">Dirección:</label>
        <input type="text" name="address" value="<?php echo isset($address) ? $address : ''; ?>" required>

      
        <label for="description">Descripción:</label>
        <textarea name="description" maxlength="200" required><?php echo isset($description) ? $description : ''; ?></textarea>

        
        <label for="photo">Fotografía (imagen):</label>
        <input type="file" name="photo" accept="image/*" required>

      
        <label for="options">Elige una opción:</label>
        <select name="options" required>
            <option value="">--Selecciona una opción--</option>
            <option value="opcion1" <?php echo isset($options) && in_array('opcion1', $options) ? 'selected' : ''; ?>>Opción 1</option>
            <option value="opcion2" <?php echo isset($options) && in_array('opcion2', $options) ? 'selected' : ''; ?>>Opción 2</option>
            <option value="opcion3" <?php echo isset($options) && in_array('opcion3', $options) ? 'selected' : ''; ?>>Opción 3</option>
        </select>

        
        <label for="hobbies">Selecciona tus hobbies:</label>
        <input type="checkbox" name="hobbies[]" value="deportes" <?php echo isset($hobbies) && in_array('deportes', $hobbies) ? 'checked' : ''; ?>> Deportes
        <input type="checkbox" name="hobbies[]" value="musica" <?php echo isset($hobbies) && in_array('musica', $hobbies) ? 'checked' : ''; ?>> Música
        <input type="checkbox" name="hobbies[]" value="viajes" <?php echo isset($hobbies) && in_array('viajes', $hobbies) ? 'checked' : ''; ?>> Viajes
        <input type="checkbox" name="hobbies[]" value="cine" <?php echo isset($hobbies) && in_array('cine', $hobbies) ? 'checked' : ''; ?>> Cine

        <button type="submit">Enviar</button>
    </form>

    <a href="index.php">Volver a la página principal</a>
</body>
</html>