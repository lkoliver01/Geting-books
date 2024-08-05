<?php
include 'config.php';

// Obter o gênero da URL, se disponível e sanitizar para evitar injeção de SQL
$genero = isset($_GET['genero']) ? trim($_GET['genero']) : '';

// Preparar a consulta SQL
$sql = 'SELECT * FROM imagens';
if ($genero) {
    $sql .= ' WHERE genero = ?';
}

// Preparar a declaração
$stmt = $conn->prepare($sql);

if ($genero) {
    // Vincular o parâmetro, 's' indica que o parâmetro é uma string
    $stmt->bind_param('s', $genero);
}

// Executar a declaração
$stmt->execute();

// Obter o resultado
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imagens - Cinema</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
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
Trocas</a>
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
    <div class="categoria drop">

        <div class="drop-content">
            <a href="livros.php?genero=Terror">Terror</a>
            <a href="livros.php?genero=Drama">Drama</a>
            <a href="livros.php?genero=Romance">Romance</a>
            <a href="livros.php?genero=Ficção">Ficção</a>
            <a href="livros.php?genero=HQ">HQ</a>
            <a href="livros.php?genero=Historia">Historia</a>
        </div>
    </div>
</div>
    <a href="livros.html">
        <p><strong>Mais Procurados</strong></p>
    </a>
    <a href="livros.html">
        <p><strong>Recente</strong></p>
    </a>
    <a href="index.php">
        <p><strong>Todos</strong></p>
    </a>    
</nav>
</div>

<div class="esp">

</div>
<div class="banner">

</div>





    <div class="titulo">
        <h1><?php echo $genero ? "  " . htmlspecialchars($genero) : ""; ?></h1>
    </div>
    <div class="menu">
        <div class="card-container">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="card">
                        <div class="card-content">
                            <div class="card-img">
                                <img src="<?php echo htmlspecialchars($row['caminho']); ?>" alt="<?php echo htmlspecialchars($row['titulo']); ?>">
                            </div>
                            <div class="idd">
                                
                                <p id="autor"> <?php echo htmlspecialchars($row['autor']); ?></p>
                                <p id="titulo"> <?php echo htmlspecialchars($row['titulo']); ?></p>
                                <p id="gener0"> <?php echo htmlspecialchars($row['genero']); ?></p>
                            </div>
                            <form action="editar.php" class="bt-trocar" method="GET">
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
                                <button type="submit" class="bt">Editar</button>
                            </form>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>Nenhuma imagem encontrada para o gênero selecionado.</p>
            <?php endif; ?>
        </div>
    </div>
    <?php
    // Fechar a declaração e a conexão
    $stmt->close();
    $conn->close();
    ?>
</body>
<footer>2024.sec.GettinG BooKs</footer>
</html>