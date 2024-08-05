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