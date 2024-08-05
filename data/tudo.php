<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GettinG BooKs</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header >
       
        <div class="cor1">

            <a href="">
                <h1>GettinG BooKs</h1>
                <img src="imgs/icong.png" alt="" width="40px">
                
                
            </a>
        </div>
        
        <form action="" id="forma-buscar">
            <input type="search" name=" buscar" id="buscar" placeholder="buscar...">
            <button type="submit" id="bt-buscar"><img src="imgs/buscar.png" alt="" width="30px"></button>
        </form>

        <a href="" class="icon-link">
            <img src="imgs/perfil1.png" alt="" width="40px">
            Cadaste-se
        </a>
        <a href="" class="icon-link">
            <img src="imgs/troca.png" alt="" width="40px">
            Duvidas</a>
            <a href="" class="icon-link">
            <img src="imgs/favo1.png" alt="" width="40px">
            Duvidas</a>
         
    </header>
   

    <div class="menu-h">

        <nav class="menu-nv">
        <div class="categoria drop">
            <a href="" class="">
                <img src="imgs/menu1.png" alt="" width="40px">
                <p><strong>Categorias</strong></p>
            </a>
            <div class="drop-content">
                <a href="">Terror</a>
                <a href="">Drama</a>
                <a href="">Romance</a>
                <a href="">Ficção</a>
                <a href="">HQ</a>
                <a href="">Historia</a>
            </div>
        </div>
            <a href="livros.html">
                <p><strong>Mais Procurados</strong></p>
            </a>
            <a href="livros.html">
                <p><strong>Recente</strong></p>
            </a>
            <a href="livros.html">
                <p><strong>Todos</strong></p>
            </a>
            
           
        </nav>
    </div>
    
    <div class="esp">
    
    </div>
    <div class="banner">
        
    </div>
<div class="titulo">
    <h1>Todos os livros</h1>
</div>
           
        

    

        <div class="menu">
        <section></section><div class="card-container">
    <?php include 'listagem.php'; ?>
    </div>
    </section>

    
</div>
</body>
<footer>2024.sec.GettinG BooKs</footer>
</html>


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
        <label for="id">ID:</label>
        <input type="text" id="id" name="id"><br><br>

        <label for="codigo">Código:</label>
        <input type="text" id="codigo" name="codigo"><br><br>

        <label for="data">Data:</label>
        <input type="text" id="data" name="data" value="<?php echo date('d/m/Y'); ?>"><br><br>

        <label for="imagem">Escolha a imagem:</label>
        <input type="file" id="imagem" name="imagem"><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
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
    // Carregar os dados do arquivo JSON
    $imagens = json_decode(file_get_contents('data/imagens.json'), true);

    // Verificar se foi passado um ID válido pela URL
    if (isset($_GET['id']) && isset($imagens[$_GET['id']])) {
        $imagem = $imagens[$_GET['id']];
    ?>
    <form action="processa_edicao.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

        <label for="codigo">Código:</label>
        <input type="text" id="codigo" name="codigo" value="<?php echo htmlspecialchars($imagem['codigo']); ?>"><br><br>

        <label for="data">Data:</label>
        <input type="text" id="data" name="data" value="<?php echo htmlspecialchars($imagem['data']); ?>"><br><br>

        <input type="submit" value="Salvar">
    </form>
    <?php } else {
        echo '<p>ID inválido ou não especificado.</p>';
    } ?>
</body>
</html>

<?php



// Carregar os dados do arquivo JSON
$imagens = json_decode(file_get_contents('data/imagens.json'), true);

// Verificar se há imagens no arquivo JSON
if (!empty($imagens)) {
    foreach ($imagens as $key => $imagem) {
        echo '<div class="card">';
        echo '<div class="card-content">';
        echo '<div class="card-img">';
        echo '<img src="' . $imagem['caminho'] . '" alt="' . $imagem['nome'] . '">';
        echo '</div>';
        echo '<div class="idd">';
        echo  htmlspecialchars($imagem['id']) . '<br>';
        echo 'Cod.' . htmlspecialchars($imagem['codigo']) . '<br>';
       
        echo '</div>';
        echo '<div class="data">';
        echo  htmlspecialchars($imagem['data']) . '<br>';
        echo '</div>';
        echo '<form action="editar.php" class="bt-trocar" method="GET">';
        echo '<input type="hidden" name="id" value="' . $key . '">';
        echo '<button type="submit" class="bt">Trocar</button>';
       
        echo '';
        echo '</form>';

       
        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<p>Nenhum produto disponível.</p>';
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Carregar os dados do arquivo JSON
    $imagens = json_decode(file_get_contents('data/imagens.json'), true);

    // Verificar se o ID foi enviado corretamente
    if (isset($_POST['id']) && isset($imagens[$_POST['id']])) {
        // Atualizar os dados do item
        $id = $_POST['id'];
        $imagens[$id]['codigo'] = $_POST['codigo'];
        $imagens[$id]['data'] = $_POST['data'];

        // Salvar os dados atualizados no arquivo JSON
        file_put_contents('data/imagens.json', json_encode($imagens, JSON_PRETTY_PRINT));

        // Redirecionar de volta para a página principal
        header('Location: index.php');
        exit;
    } else {
        echo 'Erro: ID inválido.';
    }
} else {
    echo 'Erro: Método de requisição inválido.';
}
?>
<?php


// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se foi enviado um arquivo
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'imagens/';
        $uploadFile = $uploadDir . basename($_FILES['imagem']['name']);

        // Move o arquivo para o diretório de uploads
        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $uploadFile)) {
            // Dados adicionais do formulário
            $id = $_POST['id'] ?? '';
            $codigo = $_POST['codigo'] ?? '';
            $data = $_POST['data'] ?? date('d/m/Y'); // Se não enviado, usa a data atual

            // Monta os dados da imagem para salvar no JSON
            $novaImagem = [
                'nome' => $_FILES['imagem']['name'],
                'tipo' => $_FILES['imagem']['type'],
                'caminho' => $uploadFile,
                
                'id' => $id,
                'codigo' => $codigo,
                'data' => $data
                
            ];

            // Carrega os dados existentes do arquivo JSON
            $imagens = json_decode(file_get_contents('data/imagens.json'), true);

            // Adiciona a nova imagem ao array
            $imagens[] = $novaImagem;

            // Salva os dados atualizados no arquivo JSON
            file_put_contents('data/imagens.json', json_encode($imagens, JSON_PRETTY_PRINT));

            // Redireciona de volta para a página principal
            header('Location: index.php');
            exit;
        } else {
            echo 'Erro ao fazer o upload do arquivo.';
        }
    } else {
        echo 'Erro: nenhum arquivo enviado.';
    }
}
?>
