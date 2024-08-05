<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Imagem</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Editar Imagem</h2>

    <?php
    include 'config.php';

    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $sql = "SELECT titulo, autor, genero FROM imagens WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            $imagem = $resultado->fetch_assoc();
    ?>
    <form action="processa_edicao.php" method="POST">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" value="<?php echo htmlspecialchars($imagem['titulo']); ?>"><br><br>

        <label for="autor">Autor:</label>
        <input type="text" id="autor" name="autor" value="<?php echo htmlspecialchars($imagem['autor']); ?>"><br><br>

        <label for="genero">Gênero:</label>
        <input type="text" id="genero" name="genero" value="<?php echo htmlspecialchars($imagem['genero']); ?>"><br><br>

        <input type="submit" value="Salvar">
    </form>
    <?php
        } else {
            echo '<p>ID inválido ou não especificado.</p>';
        }

        $stmt->close();
    } else {
        echo '<p>ID não especificado.</p>';
    }

    $conn->close();
    ?>
</body>
</html>