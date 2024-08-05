<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Envio de Imagem</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Seu arquivo de estilo CSS -->
</head>
<body>
    <h2>Enviar Nova Imagem</h2>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" required><br><br>

        <label for="autor">Autor:</label>
        <input type="text" id="autor" name="autor" required><br><br>

        <label for="genero">Gênero:</label>
        <input type="text" id="genero" name="genero" required><br><br>

        <label for="imagem">Escolha a imagem:</label>
        <input type="file" id="imagem" name="imagem" accept="image/*" required><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>